<?php


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $data['title']='home';
        $date = date('Y-m-d');
        $data['countdown'] = $this->_custom_query("select * from phase where end_date >= '$date' and start_date <= '$date'");
        // $this->load->view('user/Header_1',$data);
        $this->load->view('home_page/main/Index',$data);
        // $this->load->view('user/Footer_1');
    }
    function test()
    {
        $this->load->view('user/Test');
    }
    function _custom_query($query)
    {
        $this->load->model('User_model');
        return $this->User_model->_custom_query($query);
    }
}