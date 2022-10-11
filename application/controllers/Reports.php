<?php
class Reports extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "reports_v";
        $this->load->model("members_model", "news");
        $this->load->model("appointment_model", "appointment");
        $this->load->model("anamnez_model", "anamnez");

        if (!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){
        $viewData = new stdClass();

        /** tablodan verilerin getirilmesi */
        //$items = $this->news->get_all(array());
        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function result_form(){
        $viewData = new stdClass();
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $viewData->randevuSay = $this->appointment->get_all(array("event_date >=" => $start_date, "event_date <=" => $end_date, "event_time !=" => -1));
        $viewData->randevusuz = $this->appointment->get_all(array("event_date >=" => $start_date, "event_date <=" => $end_date, "event_time" => -1));
        $rliAnamnezToplam = $this->anamnez->get_all(array("tarih >=" => $start_date, "tarih <=" => $end_date, "randevusuz" => 1));

        $tl = $usd = $eu = $gbp = 0;

        foreach ($rliAnamnezToplam as $rli){
            switch ($rli->ucretbirim){
                case "tl":
                    $tl += $rli->ucret;
                    break;
                case "usd":
                    $usd += $rli->ucret;
                    break;
                case "eu":
                    $eu += $rli->ucret;
                    break;
                case "gbp":
                    $gbp += $rli->ucret;
                    break;
            }
        }

        $viewData->rliAnaTop = [$tl, $usd, $eu, $gbp];
        $rsizAnamnezToplam = $this->anamnez->get_all(array("tarih >=" => $start_date, "tarih <=" => $end_date, "randevusuz" => 0));
        $tl = $usd = $eu = $gbp = 0;

        foreach ($rsizAnamnezToplam as $rsiz){
            switch ($rsiz->ucretbirim){
                case "tl":
                    $tl += $rsiz->ucret;
                    break;
                case "usd":
                    $usd += $rsiz->ucret;
                    break;
                case "eu":
                    $eu += $rsiz->ucret;
                    break;
                case "gbp":
                    $gbp += $rsiz->ucret;
                    break;
            }
        }

        $viewData->rsizAnaTop = [$tl, $usd, $eu, $gbp];
        $viewData->baslangic = $start_date;
        $viewData->bitis = $end_date;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "numeric_results";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form_from_app($appointmentId){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->patient = $this->appointment->get(array("id" => $appointmentId));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){

        $this->load->library("form_validation");

        //Kurallar tazılır

        $this->form_validation->set_rules("tcnumber","TC No","required|trim");
        $this->form_validation->set_rules("name","Ad","required|trim");
        $this->form_validation->set_rules("surname","Soyad","required|trim");
        $this->form_validation->set_rules("phone","Telefon","required|trim");
        $this->form_validation->set_rules("email","E-Posta","trim");
        $this->form_validation->set_rules("address","Adres","trim");
        $this->form_validation->set_rules("reffer","Referans","trim");
        $this->form_validation->set_rules("job","Meslek","trim");
        $this->form_validation->set_rules("dob","Doğum Tarihi","required");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){
            $data = array(
                "tcnumber"          => $this->input->post("tcnumber"),
                "name"              => $this->input->post("name"),
                "surname"           => $this->input->post("surname"),
                "job"               => $this->input->post("job"),
                "dob"               => $this->input->post("dob"),
                "phone"             => $this->input->post("phone"),
                "email"             => $this->input->post("email"),
                "address"           => $this->input->post("address"),
                "reffer"            => $this->input->post("reffer"),
                "isActive"          => 1,
                "createdAt"         => date("Y-m-d H:i:s")
            );

            $insert = $this->news->add($data);

            if ($insert){
                $alert = array(
                    "title" => "Hasta Kaydı Tamamlandı",
                    "text"  => "Kayıt Eklendi",
                    "type"  => "success",
                    "icon"  => "icon-person"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Eklenemedi!",
                    "type" => "error"
                );
            }
            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);
            redirect(base_url("members"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){
        $viewData = new stdClass();

        $item = $this->news->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("tcnumber","TC No","required|trim");
        $this->form_validation->set_rules("name","Ad","required|trim");
        $this->form_validation->set_rules("surname","Soyad","required|trim");
        $this->form_validation->set_rules("phone","Telefon","required|trim");
        $this->form_validation->set_rules("email","E-Posta","trim");
        $this->form_validation->set_rules("address","Adres","trim");
        $this->form_validation->set_rules("reffer","Referans","trim");
        $this->form_validation->set_rules("job","Meslek","trim");
        $this->form_validation->set_rules("dob","Doğum Tarihi","required");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){
            $data = array(
                "tcnumber"          => $this->input->post("tcnumber"),
                "name"              => $this->input->post("name"),
                "surname"           => $this->input->post("surname"),
                "job"               => $this->input->post("job"),
                "dob"               => $this->input->post("dob"),
                "phone"             => $this->input->post("phone"),
                "email"             => $this->input->post("email"),
                "address"           => $this->input->post("address"),
                "reffer"            => $this->input->post("reffer")
            );


            $update = $this->news->update(array("id" => $id), $data);

            // TODO: Alert sistemi eklenecek
            if ($update){
                $alert = array(
                    "title" => "İşlem Tamamlandı",
                    "text" => "Kayıt Güncellendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncellenemedi!",
                    "type" => "error"
                );
            }
            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);

            //$this->session-mark_as_flash($alert);

            redirect(base_url("members"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->news->get(array("id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function delete($id){
        $delete = $this->news->delete(array("id" => $id));

        //TODO Alert sistemi eklenecek
        if($delete){
            $alert = array(
                "title" => "İşlem Tamamlandı",
                "text" => "Kayıt Silindi",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt Silinemedi!",
                "type" => "error"
            );
        }

        $this->session->set_userdata("alert", $alert);
        redirect(base_url("members"));
    }

    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->news->update(array("id" => $id), array("isActive" => $isActive));
        }
    }

    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->news->update(
                array(
                    "id"      => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }

}