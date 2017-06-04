<?php

/**
 * Created by PhpStorm.
 * User: huge
 * Date: 2016/10/17
 * Time: 21:31
 */
class Search_activity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Activity_model');
        $this->load->model('Search_activity_model');
        $this->load->model('First_label_model');
        $this->load->model('User_model');
        $this->load->model('Second_label_model');
    }

    public function index()
    {
        $data['first_label_info'] = $this->Search_activity_model->search_activity();
        $this->load->view('activity_related/search_activity', $data);

    }

    public function label($first_label_id = -1)
    {
        if ($first_label_id < 0)
            return;
        $data = $this->Search_activity_model->search_activity($first_label_id);
        $this->load->view('activity_related/search_deep', $data);
    }
}