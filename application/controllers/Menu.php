<?php

class Menu extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "menu_v";
        $this->load->model("Menu_model");
        $this->load->model("Submenu_model");
        //$this->load->model("Product_category_model");

        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->allMenuItems = $this->Menu_model->get_all(array(), "rank ASC");
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->items = $this->Menu_model->get_all(array("parent" => -1, "isActive" => 1), "rank ASC");
        //$viewData->productGroups = $this->Product_category_model->get_all(array(), "rank ASC");
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {
            if ($this->input->post("parent") != -1) {
                $insData = array(
                    "title" => $this->input->post("title"),
                    "parent" => $this->input->post("parent"),
                    "controller" => $this->input->post("controller"),
                    "rank" => 0,
                    "isActive" => 1,
                );
            } else {
                $insData = array(
                    "title" => $this->input->post("title"),
                    "parent" => -1,
                    "rank" => 0,
                    "isActive" => 1,
                );
            }

            $insert = $this->Menu_model->add($insData);

            // TODO: Alert sistemi eklenecek
            if ($insert) {
                $parentId = $this->input->post("parent");
                if ($parentId != -1) {
                    $this->Menu_model->update(array("id" => $parentId), array("hasChild" => 1));
                }
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

            $this->session->set_userdata("alert", $alert);
            redirect(base_url("Menu"));
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

        $item = $this->Menu_model->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $viewData->items = $this->Menu_model->get_all(array("parent" => -1, "isActive" => 1), "rank ASC");
        //$viewData->productGroups = $this->Product_category_model->get_all(array(), "rank ASC");

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {
            $data = array(
                "title" => $this->input->post("title"),
                "parent" => $this->input->post("parent"),
                "controller" => $this->input->post("controller"),

            );
            $update = $this->Menu_model->update(array("id" => $id), $data);


            // TODO: Alert sistemi eklenecek
            if ($update) {
                $parentId = $this->input->post("parent");
                if ($parentId != -1) {
                    $this->Menu_model->update(array("id" => $parentId), array("hasChild" => 1));
                }

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
            redirect(base_url("Menu"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->Menu_model->get(array("id" => $id));
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id)
    {
        $delete = $this->Menu_model->delete(array("id" => $id));

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
        redirect(base_url("Menu"));
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $update = $this->Menu_model->update(array("id" => $id), array("isActive" => $isActive));
            if ($update) {
                $this->session->unset_userdata("allMenuItems");
                $allMenuItems = $this->Menu_model->get_all();
                $this->session->set_userdata("allMenuItems", $allMenuItems);
            }
        }
    }

    public function rankSetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->Menu_model->update(
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