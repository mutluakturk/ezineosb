<?php
class Anamnez extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "anamnez_v";
        $this->load->model("anamnez_model", "news");
        $this->load->model("members_model", "members");

        if (!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index($hastaid){
        $viewData = new stdClass();
        $items = $this->news->get_all(array("hastaid" => $hastaid));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function list($hastaid){
        $viewData = new stdClass();
        $items = $this->news->get_all(array("hastaid" => $hastaid));
        $userData = $this->members->get(array("id" => $hastaid));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->userData = $userData;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form($hastaid){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->patient = $this->members->get(array("id" => $hastaid));
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function dosyaGonder($anamnezId){
        $anamnez = $this->news->get(array("id" => $anamnezId));
        $hasta = $this->members->get(array("id" => $anamnez->hastaid));
        if ($hasta->email){
            $gonderen_mail_adresi = 'ayla292@hotmail.com';
            $gonderen_kisi_adi  = 'Dr. Ayla DÖNERTAŞ';

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('email');

            $email_adresi = $hasta->email;
            $email_konu = get_readable_just_date($anamnez->tarih). " tarihli laboratuvar Sonuçları";
            $email_icerigi = "Linkten sonuç dökümanınıza ulaşabilirsiniz. $anamnez->img_url";

            $this->email->from($gonderen_mail_adresi, $gonderen_kisi_adi);
            $this->email->to($email_adresi);
            $this->email->subject($email_konu);
			$this->email->message($email_icerigi);
			$send = $this->email->send();

			if ($send){
                $alert = array(
                    "title" => "İşlem Tamamlandı",
                    "text" => "Mail Gönderildi!.",
                    "type" => "success"
                );
                $this->session->set_userdata("alert", $alert);
                redirect(base_url("anamnez/list/".$hasta->id));
            } else {
			    $send->error();
			    die();
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Mail Gönderilemedi! Bilinmeyen Hata.",
                    "type" => "error"
                );
                $this->session->set_userdata("alert", $alert);
                redirect(base_url("anamnez/list/".$hasta->id));
                die();
            }
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Mail Gönderilemedi! Hasta e-posta adresini kontrol edin.",
                "type" => "error"
            );
            $this->session->set_userdata("alert", $alert);
            redirect(base_url("anamnez/list/".$hasta->id));
        }
    }

    public function save(){

        $this->load->library("form_validation");

        //Kurallar tazılır

        $this->form_validation->set_rules("gelissikayet","Geliş Şikayeti","trim");
        $this->form_validation->set_rules("muayenebulgu","Muayene Bulguları","trim");
        $this->form_validation->set_rules("oneritedavi","Öneri Tedavi","trim");
        $this->form_validation->set_rules("notes","Notlar","trim");
        $this->form_validation->set_rules("price","Ücret","trim");
        $this->form_validation->set_rules("pricetype","Ücret Birimi","trim");
        $this->form_validation->set_rules("zaman","Geliş Saati","trim");
        $this->form_validation->set_rules("description","Temel Tıbbi Bilgiler","trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();
        $randevuDurum = ($this->input->post("randevu") == "on") ? 1 : 0;
        if ($validate){
            $data = array(
                "gelissikayeti"  => $this->input->post("gelissikayet"),
                "muayenebulgu"   => $this->input->post("muayenebulgu"),
                "oneritedaviler" => $this->input->post("oneritedavi"),
                "notlar"         => $this->input->post("notes"),
                "ucret"          => $this->input->post("price"),
                "ucretbirim"     => $this->input->post("pricetype"),
                "randevusuz"     => $randevuDurum,
                "gelissaati"     => $this->input->post("zaman"),
                "tarih"          => date("Y-m-d"),
                "hastaid"        => $this->input->post("hastano"),
                "isActive"       => 1,
                "createdAt"      => date("Y-m-d H:i:s")
            );

            $insert = $this->news->add($data);

            $update = $this->members->update(array("id" => $this->input->post("hastano")), array("medicaldata" => $this->input->post("description")));

            if ($insert & $update){
                $alert = array(
                    "title" => "Anamnez Kaydı Tamamlandı ve Temel Bilgiler GÜncellendi",
                    "text"  => "Kayıt Eklendi",
                    "type"  => "success"
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
            redirect(base_url("anamnez/list/".$this->input->post("hastano")));

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
        $viewData->patient = $this->members->get(array("id" => $item->hastaid));

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("gelissikayet","Geliş Şikayeti","trim");
        $this->form_validation->set_rules("muayenebulgu","Muayene Bulguları","trim");
        $this->form_validation->set_rules("oneritedavi","Öneri Tedavi","trim");
        $this->form_validation->set_rules("notes","Notlar","trim");
        $this->form_validation->set_rules("price","Ücret","trim");
        $this->form_validation->set_rules("pricetype","Ücret Birimi","trim");
        $this->form_validation->set_rules("zaman","Geliş Saati","trim");
        $this->form_validation->set_rules("description","Temel Tıbbi Bilgiler","trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();
        $randevuDurum = ($this->input->post("randevu") == "on") ? 1 : 0;
        $anamnezBilgi = $this->news->get(array("id" => $id));
        if ($validate){
            if ($_FILES["img_url"]["name"] !== "") {
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "pdf|PDF";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;
                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("img_url");

                if ($upload){
                    $uploaded_file = $this->upload->data("file_name");
                    $data = array(
                        "gelissikayeti"  => $this->input->post("gelissikayet"),
                        "muayenebulgu"   => $this->input->post("muayenebulgu"),
                        "oneritedaviler" => $this->input->post("oneritedavi"),
                        "notlar"         => $this->input->post("notes"),
                        "ucret"          => $this->input->post("price"),
                        "ucretbirim"     => $this->input->post("pricetype"),
                        "randevusuz"     => $randevuDurum,
                        "gelissaati"     => $this->input->post("zaman"),
                        "img_url"       => $uploaded_file,
                    );

                }
                else {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yükleme esnasında problem oluştu! Sadece PDF Yükleyiniz!",
                        "type" => "error"
                    );
                    $this->session->set_userdata("alert", $alert);
                    //$this->session-mark_as_flash($alert);
                    redirect(base_url("anamnez/update_form/$id"));
                    die();
                }

            } else {
                $data = array(
                    "gelissikayeti"  => $this->input->post("gelissikayet"),
                    "muayenebulgu"   => $this->input->post("muayenebulgu"),
                    "oneritedaviler" => $this->input->post("oneritedavi"),
                    "notlar"         => $this->input->post("notes"),
                    "ucret"          => $this->input->post("price"),
                    "ucretbirim"     => $this->input->post("pricetype"),
                    "randevusuz"     => $randevuDurum,
                    "gelissaati"     => $this->input->post("zaman")
                );
            }

            $update_ = $this->members->update(
                array("id" => $anamnezBilgi->hastaid),
                array("medicaldata" => $this->input->post("description"))
            );

            $update = $this->news->update(array("id" => $id), $data);

            // TODO: Alert sistemi eklenecek
            if ($update & $update_){
                $alert = array(
                    "title" => "İşlem Tamamlandı",
                    "text" => "Tüm Kayıtlar Güncellendi",
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
            $adata = $this->news->get(array("id" => $id));
            $udata = $this->members->get(array("id" => $adata->hastaid));
            redirect(base_url("anamnez/list/$udata->id"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->news->get(array("id" => $id));
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function price_update_form($id){
        $viewData = new stdClass();

        $item = $this->news->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "price_update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function price_update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("price","Ücret","trim");
        $this->form_validation->set_rules("pricetype","Ücret Birimi","trim");
        $this->form_validation->set_rules("zaman","Geliş Saati","trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();
        $randevuDurum = ($this->input->post("randevu") == "on") ? 1 : 0;
        $anamnezBilgi = $this->news->get(array("id" => $id));
        if ($validate){
            if ($_FILES["img_url"]["name"] !== "") {
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "pdf|PDF";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;
                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("img_url");

                if ($upload){
                    $uploaded_file = $this->upload->data("file_name");
                    $data = array(
                        "ucret"          => $this->input->post("price"),
                        "ucretbirim"     => $this->input->post("pricetype"),
                        "randevusuz"     => $randevuDurum,
                        "gelissaati"     => $this->input->post("zaman"),
                        "img_url"       => $uploaded_file,
                    );

                }
                else {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yükleme esnasında problem oluştu! Sadece PDF Yükleyiniz!",
                        "type" => "error"
                    );
                    $this->session->set_userdata("alert", $alert);
                    //$this->session-mark_as_flash($alert);
                    redirect(base_url("anamnez/update_form/$id"));
                    die();
                }

            } else {
                $data = array(
                    "ucret"          => $this->input->post("price"),
                    "ucretbirim"     => $this->input->post("pricetype"),
                    "randevusuz"     => $randevuDurum,
                    "gelissaati"     => $this->input->post("zaman")
                );
            }

            $update_ = $this->members->update(
                array("id" => $anamnezBilgi->hastaid),
                array("medicaldata" => $this->input->post("description"))
            );

            $update = $this->news->update(array("id" => $id), $data);

            // TODO: Alert sistemi eklenecek
            if ($update & $update_){
                $alert = array(
                    "title" => "İşlem Tamamlandı",
                    "text" => "Tüm Kayıtlar Güncellendi",
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
            $adata = $this->news->get(array("id" => $id));
            $udata = $this->members->get(array("id" => $adata->hastaid));
            redirect(base_url("anamnez/list/$udata->id"));

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
        redirect(base_url("anamnez"));
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