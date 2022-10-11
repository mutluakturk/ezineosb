<?php

class Settings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "settings_v";
        $this->load->model("Settings_model");

        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();


        /** tablodan verilerin getirilmesi */
        $item = $this->Settings_model->get();

        if ($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";
        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;

        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");

        //Kurallar yazılır

        if ($_FILES["logo"]["name"] == "") {
            $alert = array(
                "title" => "İşlem Durduruldu",
                "text" => "Lütfen Görsel Seçiniz!",
                "type" => "warning"
            );
            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);
            redirect(base_url("settings/new_form"));
            die();
        }


        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon 1", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta Adresi", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>{field}</b> agiriniz",
            )
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {

            //upload işlemleri

            $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;
            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("logo");
            if ($upload) {

                $uploaded_file = $this->upload->data("file_name");


                $insert = $this->Settings_model->add(
                    array(
                        "company_name" => $this->input->post("company_name"),
                        "phone_1" => $this->input->post("phone_1"),
                        "phone_2" => $this->input->post("phone_2"),
                        "fax_1" => $this->input->post("fax_1"),
                        "fax_2" => $this->input->post("fax_2"),
                        "address" => $this->input->post("address"),
                        "about_us" => $this->input->post("about_us"),
                        "mission" => $this->input->post("mission"),
                        "vision" => $this->input->post("vision"),
                        "email" => $this->input->post("email"),
                        "facebook" => $this->input->post("facebook"),
                        "twitter" => $this->input->post("twitter"),
                        "instagram" => $this->input->post("instagram"),
                        "linkedin" => $this->input->post("linkedin"),
                        "whatsapp" => $this->input->post("whatsapp"),
                        "description" => $this->input->post("description"),
                        "keywords" => $this->input->post("keywords"),
                        "author" => $this->input->post("author"),
                        "whatsapp_message" => $this->input->post("wmessage"),
                        "logo" => $uploaded_file,
                        "createdAt" => date("Y-m-d H:i:s"))
                );

                // TODO: Alert sistemi eklenecek
                if ($insert) {
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

                redirect(base_url("settings/new_form"));
                die();
            }

            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);

            //$this->session-mark_as_flash($alert);

            redirect(base_url("settings"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }
    }

    public function update_form($id)
    {
        $viewData = new stdClass();

        $item = $this->Settings_model->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");


        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon 1", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta Adresi", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>{field}</b> agiriniz",
            )
        );


        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {

            //upload işlemleri

            if ($_FILES["logo"]["name"] !== "") {
                $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;
                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("logo");
                if ($upload) {
                    $uploaded_file = $this->upload->data("file_name");
                    $data = array(
                        "company_name" => $this->input->post("company_name"),
                        "phone_1" => $this->input->post("phone_1"),
                        "phone_2" => $this->input->post("phone_2"),
                        "fax_1" => $this->input->post("fax_1"),
                        "fax_2" => $this->input->post("fax_2"),
                        "address" => $this->input->post("address"),
                        "about_us" => $this->input->post("about_us"),
                        "mission" => $this->input->post("mission"),
                        "vision" => $this->input->post("vision"),
                        "email" => $this->input->post("email"),
                        "facebook" => $this->input->post("facebook"),
                        "twitter" => $this->input->post("twitter"),
                        "instagram" => $this->input->post("instagram"),
                        "linkedin" => $this->input->post("linkedin"),
                        "whatsapp" => $this->input->post("whatsapp"),
                        "description" => $this->input->post("description"),
                        "keywords" => $this->input->post("keywords"),
                        "author" => $this->input->post("author"),
                        "logo" => $uploaded_file,
                        "whatsapp_message" => $this->input->post("wmessage"),
                        "updatedAt" => date("Y-m-d H:i:s")
                    );

                } else {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yükleme esnasında problem oluştu!",
                        "type" => "error"
                    );

                    $this->session->set_userdata("alert", $alert);

                    //$this->session-mark_as_flash($alert);

                    redirect(base_url("settings/update_form/$id"));
                    die();
                }
            } else {
                $data = array(
                    "company_name" => $this->input->post("company_name"),
                    "phone_1" => $this->input->post("phone_1"),
                    "phone_2" => $this->input->post("phone_2"),
                    "fax_1" => $this->input->post("fax_1"),
                    "fax_2" => $this->input->post("fax_2"),
                    "address" => $this->input->post("address"),
                    "about_us" => $this->input->post("about_us"),
                    "mission" => $this->input->post("mission"),
                    "vision" => $this->input->post("vision"),
                    "email" => $this->input->post("email"),
                    "facebook" => $this->input->post("facebook"),
                    "twitter" => $this->input->post("twitter"),
                    "instagram" => $this->input->post("instagram"),
                    "linkedin" => $this->input->post("linkedin"),
                    "whatsapp" => $this->input->post("whatsapp"),
                    "description" => $this->input->post("description"),
                    "keywords" => $this->input->post("keywords"),
                    "author" => $this->input->post("author"),
                    "whatsapp_message" => $this->input->post("wmessage"),
                    "updatedAt" => date("Y-m-d H:i:s")
                );
            }

            $update = $this->Settings_model->update(array("id" => $id), $data);

            // TODO: Alert sistemi eklenecek
            if ($update) {
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

            //session update
            $settings = $this->Settings_model->get();
            $this->session->set_userdata("settings", $settings);


            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);

            //$this->session-mark_as_flash($alert);

            redirect(base_url("settings"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->settings->get(array("id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function updateSocial($id)
    {
        //upload işlemleri
        $data = array(
            "email" => $this->input->post("email"),
            "facebook" => $this->input->post("facebook"),
            "twitter" => $this->input->post("twitter"),
            "instagram" => $this->input->post("instagram"),
            "linkedin" => $this->input->post("linkedin"),
            "whatsapp" => $this->input->post("whatsapp"),
            "whatsapp_message" => $this->input->post("wmessage")
        );
        $update = $this->Settings_model->update(array("id" => $id), $data);
        // TODO: Alert sistemi eklenecek
        if ($update) {
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
        //session update
        $settings = $this->Settings_model->get();
        $this->session->set_userdata("mainpage", $settings);
        //işlem sonucu sessiona yazılıyor
        $this->session->set_userdata("alert", $alert);
        redirect(base_url("mainpage"));
    }
}