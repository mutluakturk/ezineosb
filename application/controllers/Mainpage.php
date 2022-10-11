<?php

class Mainpage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "mainpage_v";
        $this->load->model("Mainpage_model", "main");
        $this->load->model("Settings_model", "settings");

        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();


        $viewData->subViewFolder = "update";
        $viewData->item = $this->main->get();
        $viewData->settings = $this->settings->get_all();

        /*if ($item)
            $viewData->subViewFolder = "update";
        else
            $viewData->subViewFolder = "no_content";
       */
        $viewData->viewFolder = $this->viewFolder;

        //$viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        if ($_FILES["img_url"]["name"] !== "") {
            $oldRecord = $this->main->get(array("id" => $id));
            unlink("uploads/{$this->viewFolder}/$oldRecord->kapak");

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;
            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("img_url");
            if ($upload) {
                $uploaded_file = $this->upload->data("file_name");
                $updateData = array(
                    "video" => $this->input->post("videoadres"),
                    "elektrik" => $this->input->post("elektrikTuk"),
                    "su" => $this->input->post("suTuk"),
                    "yuzolcum" => $this->input->post("yuzolcumu"),
                    "kurulus" => $this->input->post("kurulusYil"),
                    "firmaSayisi" => $this->input->post("kayitliFirma"),
                    "kapak" => $uploaded_file
                );

            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Görsel yükleme esnasında problem oluştu!",
                    "type" => "error"
                );

                $this->session->set_userdata("alert", $alert);

                //$this->session-mark_as_flash($alert);

                redirect(base_url("mainpage"));
                die();
            }
        } else {
            $updateData = array(
                "video" => $this->input->post("videoadres"),
                "elektrik" => $this->input->post("elektrikTuk"),
                "su" => $this->input->post("suTuk"),
                "yuzolcum" => $this->input->post("yuzolcumu"),
                "kurulus" => $this->input->post("kurulusYil"),
                "firmaSayisi" => $this->input->post("kayitliFirma")
            );
        }

        $update = $this->main->update(array("id" => $id), $updateData);

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
        //işlem sonucu sessiona yazılıyor
        $this->session->set_userdata("alert", $alert);

        //$this->session-mark_as_flash($alert);

        redirect(base_url("mainpage"));


        $update = $this->main->update(array("id" => $id), $updateData);

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
        //işlem sonucu sessiona yazılıyor
        $this->session->set_userdata("alert", $alert);

        //$this->session-mark_as_flash($alert);

        redirect(base_url("mainpage"));
    }

    public function save()
    {

    }

}