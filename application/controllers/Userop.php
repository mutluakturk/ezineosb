<?php

class Userop extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";

        $this->load->model("User_model");

    }

    public function login()
    {
        if (get_active_user()) {
            redirect(base_url());
        }

        $viewData = new stdClass();

        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
        $this->load->view("web_v/giris", $viewData);
    }

    public function do_login()
    {
        if (get_active_user()) {
            redirect(base_url());
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("user_email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Parola", "required|trim|min_length[6]|max_length[8]");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir E-Posta adresi giriniz",
                "min_length" => "<b>{field}</b> en az 6 karakterden oluşmalı",
                "max_length" => "<b>{field}</b> en fazla 8 karakterden oluşmalı",
            )
        );

        // validation calıstırılır
        if ($this->form_validation->run() == FALSE) {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $user = $this->User_model->get(
                array(
                    "email" => $this->input->post("user_email"),
                    "password" => md5($this->input->post("user_password")),
                    "isActive" => 1
                )
            );

            if ($user) {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "$user->full_name Hoş Geldiniz",
                    "type" => "success"
                );

                $this->session->set_userdata("alert", $alert);
                $this->session->set_userdata("user", $user);

                redirect(base_url('Dashboard'));

            } else {
                $alert = array(
                    "title" => "İşlem BAŞARISIZ",
                    "text" => "Giriş bilgilerinizi kontrol ediniz",
                    "type" => "error"
                );

                $this->session->set_userdata("alert", $alert);
                redirect(base_url("login"));
            }


        }
    }

    public function logout()
    {

        $this->session->unset_userdata("user");
        redirect(base_url());

    }

    public function forget_password()
    {
        if (get_active_user()) {
            redirect(base_url());
        }

        $viewData = new stdClass();

        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function reset_password()
    {

        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>E-Posta</b> adresi giriniz",
            )
        );

        if ($this->form_validation->run() === FALSE) {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {

            $user = $this->User_model->get(array(
                "isActive" => 1,
                "email" => $this->input->post("email")
            ));

            if ($user) {

                $this->load->model("emailsettings_model");

                $mailSets = $this->emailsettings_model->get(array("isActive" => 1));

                $config = array(
                    "protocol" => $mailSets->protocol,
                    "smtp_host" => $mailSets->host,
                    "smtp_port" => $mailSets->port,
                    "smtp_user" => $mailSets->user,
                    "smtp_pass" => $mailSets->password,
                    "starttls" => true,
                    "charset" => "utf-8",
                    "mailtype" => "html",
                    "wordwrap" => true,
                    "newline" => "\r\n",
                    "validate" => true
                );

                $this->load->library("email", $config);

                $this->email->from($mailSets->from, $mailSets->user_name);
                $this->email->to($user->email);
                $this->email->subject("CMS Test Emaili");
                $this->email->message("Deneme epostasıdır");

                $send = $this->email->send();

                if ($send == true) {
                    echo "Gonderildi";
                } else {
                    echo $this->email->print_debugger();
                }

            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kullanıcı Bulunamadı!!",
                    "type" => "error"
                );

                $this->session->set_userdata("alert", $alert);
                redirect(base_url("sifremi-unuttum"));
            }

        }


    }

}