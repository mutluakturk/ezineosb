<?php
class Appointments extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "appointments_v";
        $this->load->model("Appointment_model", "course");
        if (!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function secilisaatler(){
        //print_r($_POST);
        $seciliListesi = $this->course->get_all(array("event_date" => $this->input->post("tarih")));

        print_r(json_encode($seciliListesi));
    }

    public function index(){
        $viewData = new stdClass();
        $bugununRandevulari = array();

        /** tablodan verilerin getirilmesi */
        $items = $this->course->get_all(array());

        foreach ($items as $item){
            array_push($bugununRandevulari, $item->event_time);
        }

        /*
         * Burada bugüne ait randevuları getirmeliyiz bugünün randevularının saatleri ön tarafta cıkartılmalı
         * */

        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->bugununRandevuSaatleri = $bugununRandevulari;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function calendar(){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "calendar";
        $viewData->takvimData = $this->course->get_all();

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){
        $this->load->library("form_validation");

        //Kurallar tazılır
        $this->form_validation->set_rules("event_date","Tarih","required");
        $this->form_validation->set_rules("event_time","Zaman","required");
        $this->form_validation->set_rules("ad","Hasta Adı","required|trim");
        $this->form_validation->set_rules("soyad","Hasta Soyadı","required|trim");
        $this->form_validation->set_rules("telefon","İletişim","trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){
            $insert = $this->course->add(
                array(
                    "event_date"    => $this->input->post("event_date"),
                    "event_time"    => $this->input->post("event_time"),
                    "name"          => $this->input->post("ad"),
                    "surname"       => $this->input->post("soyad"),
                    "phone"         => $this->input->post("telefon"),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"))
            );

            // TODO: Alert sistemi eklenecek

            if ($insert){
                $alert = array(
                    "title" => "Randevu Kaydı Tamamlandı",
                    "text" => "Kayıt Eklendi",
                    "type" => "success"
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
            redirect(base_url("appointments"));

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

        $item = $this->course->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        $this->load->library("form_validation");

        $this->form_validation->set_rules("event_date","Tarih","required");
        $this->form_validation->set_rules("event_time","Zaman","required");
        $this->form_validation->set_rules("ad","Hasta Adı","required|trim");
        $this->form_validation->set_rules("soyad","Hasta Soyadı","required|trim");
        $this->form_validation->set_rules("telefon","İletişim","trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            //upload işlemleri

            $data = array(
                "event_date"    => $this->input->post("event_date"),
                "event_time"    => $this->input->post("event_time"),
                "name"          => $this->input->post("ad"),
                "surname"       => $this->input->post("soyad"),
                "phone"         => $this->input->post("telefon"),
                "isActive"      => 1,
                "createdAt"     => date("Y-m-d H:i:s"));

            $update = $this->course->update(array("id" => $id), $data);

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

            redirect(base_url("appointments"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->course->get(array("id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function delete($id){
        $delete = $this->course->delete(array("id" => $id));

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
        redirect(base_url("appointments"));
    }

    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->course->update(array("id" => $id), array("isActive" => $isActive));
        }
    }

    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->course->update(
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