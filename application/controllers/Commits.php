<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commits extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Commits_model');
    }

	public function index()
	{
        $recent_amikkos = $this->Commits_model->get_recent_amikko();
        
		$view_data = array(
			'recent_amikkos' => $recent_amikkos
		);

		$this->load->view('commits', $view_data);
	}

    public function add_amikko()
    {
        //TODO
        $this->index();
    }
}
