<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
    }

        function list_property()
    {
        $this->load->view('user/List_property');
    }
  