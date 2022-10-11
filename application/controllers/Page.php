<?php

class Page extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "page_v";
        $this->load->model("Pages_model", "pages");
        $this->load->model("Menu_model");

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
        $viewData->allMenuItems = $this->pages->get_all(array(), "rank ASC");
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->items = $this->Menu_model->get_all(array("parent !=" => -1, "isActive" => 1), "rank ASC");
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("description", "Sayda İçeriği", "required|trim");
        $this->form_validation->set_message(
            array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {
            $insData = array(
                "menuId" => $this->input->post("parent"),
                "content" => $this->input->post("description"),
                "tags" => $this->input->post("tags"),
                "seo" => $this->input->post("seo"),
                "ineffaceable" => ($this->input->post("silinemez") == "on") ? 1 : 0,
            );

            $insert = $this->pages->add($insData);

            // TODO: Alert sistemi eklenecek
            if ($insert) {
                $alert = array(
                    "title" => "İşlem Tamamlandı",
                    "text" => "Sayfa içeriği Eklendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Sayfa içeriği Eklenemedi!",
                    "type" => "error"
                );
            }

            $this->session->set_userdata("alert", $alert);
            redirect(base_url("Page"));
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

        $item = $this->pages->get(array("id" => $id));

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $viewData->menitems = $this->Menu_model->get_all(array("parent !=" => -1), "rank ASC");
        //$viewData->productGroups = $this->Product_category_model->get_all(array(), "rank ASC");

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("description", "Sayfa İçeriği", "required|trim");
        $this->form_validation->set_message(
            array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate) {
            $data = array(
                "menuId" => $this->input->post("parent"),
                "content" => $this->input->post("description"),
                "tags" => $this->input->post("tags"),
                "seo" => $this->input->post("seo"),
                "ineffaceable" => ($this->input->post("silinemez") == "on") ? 1 : 0,
            );
            $update = $this->pages->update(array("id" => $id), $data);


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
            redirect(base_url("Page"));
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
        $delete = $this->pages->delete(array("id" => $id));

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
        redirect(base_url("page"));
    }

    /*
        public function isActiveSetter($id)
        {
            if ($id) {
                $isActive = ($this->input->post("data") === "true") ? 1 : 0;
                $update = $this->pages->update(array("id" => $id), array("isActive" => $isActive));
                if ($update) {
                    $this->session->unset_userdata("allMenuItems");
                    $allMenuItems = $this->pages->get_all();
                    $this->session->set_userdata("allMenuItems", $allMenuItems);
                }
            }
        }
    */

    public function rankSetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->pages->update(
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