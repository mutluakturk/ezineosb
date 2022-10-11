<?php
class Users extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";
        $this->load->model("User_model");

        if (!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){
        $viewData = new stdClass();


        /** tablodan verilerin getirilmesi */
        $items = $this->User_model->get_all(array());

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

        $this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");
        $this->form_validation->set_rules("full_name","Ad Soyad","required|trim");
        $this->form_validation->set_rules("email","Email","required|trim|is_unique[users.email]|valid_email");
        $this->form_validation->set_rules("password","Parola","required|trim|min_length[6]|max_length[8]");
        $this->form_validation->set_rules("re_password","Şifre Tekrar","required|trim|min_length[6]|max_length[8]|matches[password]");
        $this->form_validation->set_message(
            Array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"   => "Lütfen geçerli bir E-Posta adresi giriniz",
                "is_unique"     => "<b>{field}</b> alanı daha önceden kullanılmıştır",
                "matches"       => "Şifreler uyuşmuyor",
                "min_length"    => "Şifreniz en az 6 karakterden oluşmalı",
                "max_length"    => "Şifreniz en fazla 8 karakterden oluşmalı",
            )
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){
            $insert = $this->User_model->add(
                array(
                    "user_name"    => $this->input->post("user_name"),
                    "full_name"     => $this->input->post("full_name"),
                    "email"         => $this->input->post("email"),
                    "password"      => md5($this->input->post("password")),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "user_type"     => $this->input->post("user_type")
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
            redirect(base_url("users"));
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

        $item = $this->User_model->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_pasasword_form($id){
        $viewData = new stdClass();

        $item = $this->User_model->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update_password";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        $this->load->library("form_validation");

        $old_user = $this->User_model->get(array("id" => $id));

        if ($old_user->user_name != $this->input->post("user_name")){
            $this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");
        }
        if ($old_user->email != $this->input->post("email")){
            $this->form_validation->set_rules("email","Email","required|trim|is_unique[users.email]|valid_email");
        }
        if ($old_user->email != $this->input->post("full_name")){
            $this->form_validation->set_rules("full_name","Ad Soyad","required|trim");
        }

        $this->form_validation->set_message(
            Array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email"   => "Lütfen geçerli bir E-Posta adresi giriniz",
                "is_unique"     => "<b>{field}</b> alanı daha önceden kullanılmıştır"
            )
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->User_model->update(
                array("id" => $id),
                array(
                    "user_name"    => $this->input->post("user_name"),
                    "full_name"     => $this->input->post("full_name"),
                    "email"         => $this->input->post("email"),
                    "user_type"     => $this->input->post("user_type")
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

            redirect(base_url("users"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->User_model->get(array("id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function update_password($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("password","Parola","required|trim|min_length[6]|max_length[8]");
        $this->form_validation->set_rules("re_password","Şifre Tekrar","required|trim|min_length[6]|max_length[8]|matches[password]");
        $this->form_validation->set_message(
            Array(
                "required"      => "<b>{field}</b> alanı doldurulmalıdır",
                "matches"       => "Şifreler uyuşmuyor",
                "min_length"    => "Şifreniz en az 6 karakterden oluşmalı",
                "max_length"    => "Şifreniz en fazla 8 karakterden oluşmalı",
            )
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->User_model->update(
                array("id" => $id),
                array(
                    "password"    => md5($this->input->post("password"))
                )
            );

            // TODO: Alert sistemi eklenecek
            if ($update){
                $alert = array(
                    "title" => "İşlem Tamamlandı",
                    "text" => "Şifreniz Değiştirildi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Şifre değiştirmede hata oluştu!",
                    "type" => "error"
                );
            }
            //işlem sonucu sessiona yazılıyor
            $this->session->set_userdata("alert", $alert);

            //$this->session-mark_as_flash($alert);

            redirect(base_url("users"));

        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update_password";
            $viewData->form_error = true;

            $viewData->item = $this->User_model->get(array("id" => $id));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }


    }

    public function delete($id){
        $delete = $this->User_model->delete(array("id" => $id));

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
        redirect(base_url("users"));
    }

    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->User_model->update(array("id" => $id), array("isActive" => $isActive));
        }
    }
}