<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public $viewFolder = "";

    //public $user;

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "dashboard_v";
        //$this->user = get_active_user();
        $this->load->model("Appointment_model", "course");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $bugun = date('Y-m-d');
        $viewData->items = $this->course->get_all(array("event_date" => $bugun));
        $viewData->subViewFolder = "list";
        $viewData->bugun = $bugun;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

}
