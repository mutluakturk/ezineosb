<?php

class Web extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "web_v";
        $this->load->model("News_model", "news");
        $this->load->model("Application_model", "application");
        $this->load->model("Menu_model");
        $this->load->model("Comments_model", "comment");
        $this->load->model("Pages_model", "pages");
        $this->load->model("Brand_model", "brands");
        $this->load->model("Mainpage_model", "main");
        $this->load->model("slide_model", "slide");
        $this->load->model("Settings_model", "settings");

        $this->load->model("gallery_model", "gallery");
        $this->load->model("image_model", "image");
        $this->load->model("video_model", "video");

        //if (!get_active_user()){
        //    redirect(base_url("login"));
        //}

        //Menü elemanlarının getirilmesi
        //varsa öncekilerini silelim
        $this->session->unset_userdata("allMenuItems");
        $allMenuItems = $this->Menu_model->get_all(array("isActive" => 1), "rank ASC");
        $this->session->set_userdata("allMenuItems", $allMenuItems);
        get_settings();

        //$this->session->unset_userdata("settings");
        //$settings = $this->settings->get_all();
        //$this->session->set_userdata("settings", $settings);
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->brands = $this->brands->get_all(array("isActive" => 1), "rank ASC");
        $viewData->mainpage = $this->main->get();
        $viewData->haber = $this->news->sqlquery("SELECT * FROM `news` WHERE isActive = 1 and master_type = 'news' order by id DESC LIMIT 4");
        $viewData->duyuru = $this->news->sqlquery("SELECT * FROM `news` WHERE isActive = 1 and master_type = 'announcenment' order by id DESC LIMIT 4");
        $viewData->slides = $this->slide->get_all(array("isActive" => 1), "rank ASC");


        //$viewData->settings = $this->settings->get_all();

        $this->load->view("web_v/index", $viewData);
    }

    public function haberler()
    {
        $viewData = new stdClass();
        $viewData->haberler = $this->news->get_all(array("isActive" => 1, "master_type" => "news"), "id DESC");
        $viewData->icerik = "news";
        $this->load->view("web_v/haberler", $viewData);
    }

    public function haberDetay($id)
    {
        $viewData = new stdClass();
        $haber = $this->news->get(array("url" => $id));
        $viewData->haber = $haber;
        $viewData->tags = $viewData->haber->tags; //json_decode(json_encode(explode(',', $viewData->haber->tags)));
        $viewData->haberlerYan = $this->news->get_all(array("isActive" => 1, "master_type" => "news"), "id DESC");
        $viewData->icerik = "news";
        $viewData->comments = $this->comment->get_all(array("status" => 1, "newsId" => $id));


        $this->load->view("web_v/haberDetay", $viewData);
    }

    public function haberDetay2($id)
    {
        $viewData = new stdClass();
        $haber = $this->news->get(array("url" => $id));
        $viewData->haber = $haber;
//        $viewData->tags = json_decode(json_encode(explode(',', $viewData->haber->tags)));
//        $viewData->haberlerYan = $this->news->get_all(array("isActive" => 1, "master_type" => "news"), "id DESC");
        $viewData->icerik = "news";
        $viewData->comments = $this->comment->get_all(array("newsId" => $id));

        $this->load->view("web_v/haberDetay2", $viewData);
    }

    public function duyurular()
    {
        $viewData = new stdClass();
        $viewData->haberler = $this->news->get_all(array("isActive" => 1, "master_type" => "announcenment"), "id DESC");
        $viewData->icerik = "announcenments";
        $this->load->view("web_v/haberler", $viewData);
    }

    public function duyuruDetay($id)
    {
        $viewData = new stdClass();
        $viewData->haber = $this->news->get(array("url" => $id));
        $viewData->tags = json_decode(json_encode($viewData->haber->tags));
        $viewData->haberlerYan = $this->news->get_all(array("isActive" => 1, "master_type" => "announcenment"), "id DESC");
        $viewData->icerik = "announcenments";
        $this->load->view("web_v/haberDetay", $viewData);
    }

    public function yorumKaydet()
    {
        $data = array(
            "title" => $this->input->post("commentTitle"),
            "newsId" => $this->input->post("_id"),
            "description" => $this->input->post("comment"),
            "mail" => $this->input->post("email"),
            "status" => 0,
            "createdAt" => date("Y-m-d H:i:s"),
            "name" => $this->input->post("name"),
        );
        $insert = $this->comment->add($data);
        if ($insert) {
            $alert = array(
                "title" => "Yorum Kaydedildi",
                "text" => "Yorumunuz Yönetici onayından sonra yayınlanacaktır. İlginize Teşekkür Ederiz.",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız, Yorum Eklenemedi",
                "text" => "Yorumunuz bir sebepten eklenemedi. Lütfen daha sonra tekrar deneyin!",
                "type" => "error"
            );
        }
        $this->session->set_userdata("alert", $alert);

        redirect(base_url("Web/haberler"));
    }

    public function getPage($id)
    {
        $viewData = new stdClass();

        $item = $this->pages->get(array("menuId" => $id));
        $viewData->item = $item;
        $viewData->icerik = $item->sayfaTanim;

        if ($this->session->icindekiler) {
            $this->session->unset_userdata('icindekiler');
        }
        if ($this->session->sayfaTanim) {
            $this->session->unset_userdata('sayfaTanim');
        }

        $this->session->set_userdata("icindekiler", $item);
        $this->session->set_userdata("sayfaTanim", $item->sayfaTanim);
        $this->load->view("web_v/default", $viewData);
    }

    public function basvuruForm()
    {
        $this->load->view("isbasvuru_v/index");
    }

    public function basvuruAl()
    {
        $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "pdf|PDF";
        $config["upload_path"] = "uploads/application_v/";
        $config["file_name"] = $file_name;
        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("img_url");

        if ($upload) {

            $uploaded_file = $this->upload->data("file_name");
            $insert = $this->application->add(
                array(
                    "fname" => $this->input->post("fname"),
                    "lname" => $this->input->post("lname"),
                    "address" => $this->input->post("address"),
                    "state" => $this->input->post("state"),
                    "city" => $this->input->post("city"),
                    "dob" => $this->input->post("dob"),
                    "company" => $this->input->post("company"),
                    "title" => $this->input->post("title"),
                    "occupation" => $this->input->post("occupation"),
                    "email" => $this->input->post("email"),
                    "phone" => $this->input->post("phone"),
                    "cv" => $uploaded_file,
                    "createdAt" => date("Y-m-d H:i:s"))
            );

            // TODO: Alert sistemi eklenecek
            if ($insert) {
                $alert = array(
                    "title" => "İşlem Tamamlandı",
                    "text" => "Başvurunuz Alındı",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Başvurunuz Alınamadı!",
                    "type" => "error"
                );
            }


        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Dosya yükleme esnasında problem oluştu!",
                "type" => "error"
            );

            $this->session->set_userdata("alert", $alert);

            redirect(base_url("Web/basvuruForm"));
            die();
        }

        //işlem sonucu sessiona yazılıyor
        $this->session->set_userdata("alert", $alert);

        //$this->session-mark_as_flash($alert);

        redirect(base_url());
    }

    public function yonetim()
    {
        $this->load->view("web_v/yonetim");
    }

    public function galeri()
    {
        $viewData = new stdClass();
        $viewData->imageGalleries = $this->gallery->get_all(array("isActive" => 1));
        //$viewData->videoGalleries = $this->gallery->get_all(array("gallery_type" => "video", "isActive" => 1));
        //$viewData->fileGalleries = $this->gallery->get_all(array("gallery_type" => "file", "isActive" => 1));
        //$viewData->icerik = "galeri";
        //$viewData->haberler = $this->news->get_all(array("isActive" => 1, "master_type" => "announcenment"), "id DESC");
        $viewData->icerik = "Galeri";
        $this->load->view("web_v/galeri", $viewData);
    }

    public function galleryDetail($gid)
    {
        $viewData = new stdClass();
        $gallery = $this->gallery->get(array("url" => $gid, "isActive" => 1));
        $viewData->gallery = $gallery;

        $viewData->icerik = "Galeri";

        if ($gallery->gallery_type == "image") {
            $viewData->galleryItems = $this->image->get_all(array("gallery_id" => $gallery->id, "isActive" => 1));
        } else {
            $viewData->galleryItems = $this->video->get_all(array("gallery_id" => $gallery->id, "isActive" => 1));
        }
        $this->load->view("web_v/galeri_detay", $viewData);
    }

    public function etikettenGetir($grup, $etiket)
    {

    }
}