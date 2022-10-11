<?php
class Emailsettings extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "email_settings_v";
        $this->load->model("Emailsettings_model");

        if (!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){
        $viewData = new stdClass();


        /** tablodan verilerin getirilmesi */
        $items = $this->Emailsettings_model->get_all(array());

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

        $this->form_validation->set_rules("protocol","Protokol Numarası","required|trim");
        $this->form_validation->set_rules("host","E-Posta Sunucusu","required|trim");
        $this->form_validation->set_rules("port","Port NUmarası","required|trim");
        $this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim");
        $this->form_validation->set_rules("user","Email (User)","required|trim|valid_email");
        $this->form_validation->set_rules("from","Kimden Gidecek (From)","required|trim|valid_email");
        $this->form_validation->set_rules("to","Kime Gidecek (To)","required|trim|valid_email");
        $this->form_validation->set_rules("password","Parola","required|trim");
        $this->form_validation->set_message(
            Array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"   => "Lütfen geçerli bir E-Posta adresi giriniz",
            )
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){
            $insert = $this->Emailsettings_model->add(
                array(
                    "protocol"      => $this->input->post("protocol"),
                    "host"          => $this->input->post("host"),
                    "port"          => $this->input->post("port"),
                    "user_name"     => $this->input->post("user_name"),
                    "user"          => $this->input->post("user"),
                    "from"          => $this->input->post("from"),
                    "to"            => $this->input->post("to"),
                    "password"      => $this->input->post("password"),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
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

            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);
            redirect(base_url("emailsettings"));
            die();
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

        $item = $this->Emailsettings_model->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        $this->load->library("form_validation");

        $old_user = $this->Emailsettings_model->get(array("id" => $id));

        $this->form_validation->set_rules("protocol","Protokol Numarası","required|trim");
        $this->form_validation->set_rules("host","E-Posta Sunucusu","required|trim");
        $this->form_validation->set_rules("port","Port NUmarası","required|trim");
        $this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim");
        $this->form_validation->set_rules("user","Email (User)","required|trim|valid_email");
        $this->form_validation->set_rules("from","Kimden Gidecek (From)","required|trim|valid_email");
        $this->form_validation->set_rules("to","Kime Gidecek (To)","required|trim|valid_email");
        $this->form_validation->set_rules("password","Parola","required|trim");
        $this->form_validation->set_message(
            Array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"   => "Lütfen geçerli bir E-Posta adresi giriniz",
            )
        );



        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->Emailsettings_model->update(
                array("id" => $id),
                array(
                    "protocol"      => $this->input->post("protocol"),
                    "host"          => $this->input->post("host"),
                    "port"          => $this->input->post("port"),
                    "user_name"     => $this->input->post("user_name"),
                    "user"          => $this->input->post("user"),
                    "from"          => $this->input->post("from"),
                    "to"            => $this->input->post("to"),
                    "password"      => $this->input->post("password"),
                )
            );

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

            redirect(base_url("emailsettings"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->Emailsettings_model->get(array("id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function delete($id){
        $delete = $this->Emailsettings_model->delete(array("id" => $id));

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
        redirect(base_url("emailsettings"));
    }

    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->Emailsettings_model->update(array("id" => $id), array("isActive" => $isActive));
        }
    }



}