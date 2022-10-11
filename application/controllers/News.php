<?php

class News extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "news_v";
        $this->load->model("news_model", "news");

        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();


        /** tablodan verilerin getirilmesi */
        $items = $this->news->get_all(array("master_type" => "news", "isActive" => 1), "id DESC");

        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

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

        //Kurallar tazılır
        $news_type = $this->input->post("news_type");

        if ($news_type == "image") {
            if ($_FILES["img_url"]["name"] == "") {
                $alert = array(
                    "title" => "İşlem Durduruldu",
                    "text" => "Lütfen Görsel Seçiniz!",
                    "type" => "warning"
                );
                //işlem sonucu sessiona yazılıyor
                $this->session->set_userdata("alert", $alert);
                redirect(base_url("news/new_form"));
            }
        } else if ($news_type == "video") {
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
        }


        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {

            //upload işlemleri
            $desc = substr($this->input->post("description"), 3, strlen($this->input->post("description")) - 7);
            $tags = substr($this->input->post("tags"), 3, strlen($this->input->post("tags")) - 7);
            if ($news_type == "image") {
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("img_url");


                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");
                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $desc,
                        "url" => convertToSEO($this->input->post("title")),
                        "news_type" => $news_type,
                        "img_url" => $uploaded_file,
                        "master_type" => "news",
                        "video_url" => "#",
                        "tags" => $tags,
                        "rank" => 0,
                        "isActive" => 1,
                        "createdBy" => $this->session->userdata("user")->id,
                        "createdAt" => date("Y-m-d H:i:s")
                    );

                } else {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yükleme esnasında problem oluştu!",
                        "type" => "error"
                    );

                    $this->session->set_userdata("alert", $alert);

                    //$this->session-mark_as_flash($alert);

                    redirect(base_url("news/new_form"));
                    die();
                }
            } else if ($news_type == "video") {
                $data = array(
                    "title" => $this->input->post("title"),
                    "description" => $desc,
                    "url" => convertToSEO($this->input->post("title")),
                    "news_type" => $news_type,
                    "master_type" => "news",
                    "img_url" => "#",
                    "video_url" => $this->input->post("video_url"),
                    "tags" => $tags,
                    "rank" => 0,
                    "isActive" => 1,
                    "createdBy" => $this->session->userdata("user")->id,
                    "createdAt" => date("Y-m-d H:i:s")
                );
            }

            $insert = $this->news->add($data);

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
            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);

            //$this->session-mark_as_flash($alert);

            redirect(base_url("news"));


        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function update_form($id)
    {
        $viewData = new stdClass();

        $item = $this->news->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        //print_r($this->input->post("tags"));
        //die();
        $this->load->library("form_validation");

        $news_type = $this->input->post("news_type");

        if ($news_type == "video") {
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
        }

        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {

            //upload işlemleri
            $desc = substr($this->input->post("description"), 3, strlen($this->input->post("description")) - 7);
            //$tags = substr($this->input->post("tags"), 3, strlen($this->input->post("tags")) - 7);
            if ($news_type == "image") {

                if ($_FILES["img_url"]["name"] !== "") {
                    $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                    $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
                    $config["upload_path"] = "uploads/$this->viewFolder/";
                    $config["file_name"] = $file_name;
                    $this->load->library("upload", $config);
                    $upload = $this->upload->do_upload("img_url");
                    if ($upload) {
                        $uploaded_file = $this->upload->data("file_name");
                        $data = array(
                            "title" => $this->input->post("title"),
                            "description" => $desc,
                            "url" => convertToSEO($this->input->post("title")),
                            "news_type" => $news_type,
                            "img_url" => $uploaded_file,
                            "video_url" => "#",
                            "tags" => $this->input->post("tags")
                        );

                    } else {
                        $alert = array(
                            "title" => "İşlem Başarısız",
                            "text" => "Görsel yükleme esnasında problem oluştu!",
                            "type" => "error"
                        );

                        $this->session->set_userdata("alert", $alert);

                        //$this->session-mark_as_flash($alert);

                        redirect(base_url("news/update_form/$id"));
                        die();
                    }
                } else {
                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                        "tags" => $this->input->post("tags")
                    );
                }

            } else if ($news_type == "video") {
                $data = array(
                    "title" => $this->input->post("title"),
                    "description" => $desc,
                    "url" => convertToSEO($this->input->post("title")),
                    "news_type" => $news_type,
                    "img_url" => "#",
                    "video_url" => $this->input->post("video_url"),
                    "tags" => $tags
                );
            }

            $update = $this->news->update(array("id" => $id), $data);

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

            redirect(base_url("news"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;

            $viewData->item = $this->news->get(array("id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function delete($id)
    {
        $delete = $this->news->delete(array("id" => $id));

        //TODO Alert sistemi eklenecek
        if ($delete) {
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
        redirect(base_url("news"));
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->news->update(array("id" => $id), array("isActive" => $isActive));
        }
    }

    public function rankSetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->news->update(
                array(
                    "id" => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }

}