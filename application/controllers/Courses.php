<?php
class Courses extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "courses_v";
        $this->load->model("Course_model", "course");
        if (!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){
        $viewData = new stdClass();


        /** tablodan verilerin getirilmesi */
        $items = $this->course->get_all(array(), "rank ASC");

        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){
        $this->load->library("form_validation");

        //Kurallar tazılır

        if ($_FILES["img_url"]["name"] == ""){
            $alert = array(
                "title" => "İşlem Durduruldu",
                "text" => "Lütfen Görsel Seçiniz!",
                "type" => "warning"
            );
            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);
            redirect(base_url("courses/new_form"));
        }



        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_rules("event_date","Eğitim Tarihi","required|trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            //upload işlemleri

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;
            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("img_url");
            if ($upload){

                $uploaded_file = $this->upload->data("file_name");


                $insert = $this->course->add(
                    array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "img_url"       => $uploaded_file,
                        "event_date"    => $this->input->post("event_date"),
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"))
                );

                // TODO: Alert sistemi eklenecek
                if ($insert){
                    $alert = array(
                        "title" => "İşlem Tamamlandı",
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

            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Görsel yükleme esnasında problem oluştu!",
                    "type" => "error"
                );

                $this->session->set_userdata("alert", $alert);

                redirect(base_url("courses/new_form"));
                die();
            }

            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);

            //$this->session-mark_as_flash($alert);

            redirect(base_url("Menu"));

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

        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_rules("event_date","Eğitim Tarihi","required|trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            //upload işlemleri
            if ($_FILES["img_url"]["name"] !== ""){
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;
                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("img_url");
                if ($upload){
                    $uploaded_file = $this->upload->data("file_name");
                    $data = array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "event_date"    => $this->input->post("event_date"),
                        "url"           => convertToSEO($this->input->post("title")),
                        "img_url"       => $uploaded_file,
                    );

                } else {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yükleme esnasında problem oluştu!",
                        "type" => "error"
                    );

                    $this->session->set_userdata("alert", $alert);

                    //$this->session-mark_as_flash($alert);

                    redirect(base_url("courses/update_form/$id"));
                    die();
                }
            } else{
                $data = array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "event_date"    => $this->input->post("event_date"),
                    "url"           => convertToSEO($this->input->post("title")),
                );
            }

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

            redirect(base_url("courses"));

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
        redirect(base_url("courses"));
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