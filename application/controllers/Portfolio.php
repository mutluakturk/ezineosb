<?php
class Portfolio extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "portfolio_v";
        $this->load->model("portfolio_model");
        $this->load->model("portfolio_image_model");
        $this->load->model("portfolio_category_model");

        if (!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index(){
        $viewData = new stdClass();

        /** tablodan verilerin getirilmesi */
        $items = $this->portfolio_model->get_all(array(), "rank ASC");

        /** viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){
        $viewData = new stdClass();
        $viewData->categories = $this->portfolio_category_model->get_all(array("isActive" => 1));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){
        $this->load->library("form_validation");

        //Kurallar tazılır
        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_rules("category_id","Kategori","required|trim");
        $this->form_validation->set_rules("client","Müşteri","required|trim");
        $this->form_validation->set_rules("finishedAt","Bitiş Tarihi","required|trim");
        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            $insert = $this->portfolio_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "price"         => $this->input->post("price"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "client"        => $this->input->post("client"),
                    "finishedAt"    => $this->input->post("finishedAt"),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
                    "rank"          => 0,
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

            //$this->session-mark_as_flash($alert);

            redirect(base_url("portfolio"));

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

        $item = $this->portfolio_model->get(array("id" => $id));
        $viewData->categories = $this->portfolio_category_model->get_all(array("isActive" => 1));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        $this->load->library("form_validation");

        //Kurallar tazılır
        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_rules("category_id","Kategori","required|trim");
        $this->form_validation->set_rules("client","Müşteri","required|trim");
        $this->form_validation->set_rules("finishedAt","Bitiş Tarihi","required|trim");

        $this->form_validation->set_message(
            Array("required" => "<b>{field}</b> alanı doldurulmalıdır")
        );

        // validation calıstırılır
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->portfolio_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "price"         => $this->input->post("price"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "client"        => $this->input->post("client"),
                    "finishedAt"    => $this->input->post("finishedAt"),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url")
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
            $this->session->set_userdata("alert", $alert);
            redirect(base_url("portfolio"));

        } else {
            $viewData = new stdClass();

            $item = $this->portfolio_model->get(array("id" => $id));
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $viewData->categories = $this->portfolio_category_model->get_all(array("isActive" => 1));

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id){
        $delete = $this->portfolio_model->delete(array("id" => $id));

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
        redirect(base_url("portfolio"));
    }

    public function imageDelete($id, $parent_id){
        $fileName = $this->portfolio_image_model->get(array("id" => $id));

        $delete = $this->portfolio_image_model->delete(array("id" => $id));

        //TODO Alert sistemi eklenecek
        if($delete){

            unlink("uploads/{$this->viewFolder}/$fileName->img_url");
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
        redirect(base_url("portfolio/image_form/$parent_id"));
    }

    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->portfolio_model->update(array("id" => $id), array("isActive" => $isActive));
        }
    }

    public function imageIsActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->portfolio_image_model->update(array("id" => $id), array("isActive" => $isActive));
        }
    }

    public function isCoverSetter($id, $parent_id){
        if($id && $parent_id){

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_image_model->update(
                array("id" => $id, "portfolio_id" => $parent_id),
                array("isCover" => $isCover));

            $this->portfolio_image_model->update(
                array("id !=" => $id, "portfolio_id" => $parent_id),
                array("isCover" => 0)
            );

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->portfolio_image_model->get_all(array("portfolio_id" => $parent_id), "rank ASC");

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);
            echo $render_html;
        }
    }

    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->portfolio_model->update(
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

    public function imageRankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->portfolio_image_model->update(
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

    public  function image_form($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->portfolio_model->get(array("id" => $id));
        $viewData->item_images = $this->portfolio_image_model->get_all(array("portfolio_id" => $id), "rank ASC");

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function image_upload($id){
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png|JPG|JPEG|PNG";
        $config["upload_path"] = "uploads/$this->viewFolder/";
        $config["file_name"] = $file_name;
        //$file_name = convertToSEO($_FILES["file"]["name"]);




        $this->load->library("upload", $config);
        $upload = $this->upload->do_upload("file");
        if ($upload){

            $uploaded_file = $this->upload->data("file_name");

            $this->portfolio_image_model->add(array(
                "img_url"       => $uploaded_file,
                "rank"          => 0,
                "isActive"      => 1,
                "isCover"       => 0,
                "createdAt"     => date("Y-m-d H:i:s"),
                "portfolio_id"    => $id
            ));


        } else {
            echo "İşlem Başarısız";
        }
    }

    public function refresh_image_list($id){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->portfolio_image_model->get_all(array("portfolio_id" => $id));

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);
        echo $render_html;
    }

}