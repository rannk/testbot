<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function manage()
	{
        $this->load->view("user_manage");
	}

    public function login() {
        $this->load->view("user_login");
    }

    public function config() {
        $this->load->view("user_config");
    }
}