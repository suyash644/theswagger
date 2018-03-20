<?php


function user_auth()
{
    $user_id = $_SESSION['etp'];
    if($user_id)
    {
        //return true;

        $ci =& get_instance();
        //load databse library
        $ci->load->database();
        $user_id = $_SESSION['etp_user_id'];
        $return = $ci->db->query("select * from user where id = $user_id");
         
        if($return->result()[0]->google_enable == 1)
        {
           //$user_id = $_SESSION['etp'];
           $google_auth = $_SESSION['etp_google_auth'];
           if($google_auth)
            {
                return true;
            }
            else
            {
                unset($_SESSION['etp']);
                unset($_SESSION['etp_user_id']);
                unset($_SESSION['etp_google_auth']);
                    //session_destroy();
                    //redirect(base_url('user/login'));
                redirect(base_url('user/login'));
            }
        }else
        {
            return true;
        } 
    }
    else
    {
        redirect(base_url('user/login'));
    }  
}

function admin_auth()
{
    $admin_id = $_SESSION['admin_etp'];
    if($admin_id)
    {
        return true;
    }
    else
    {
        redirect(base_url('admin/login'));
    }
}


function sendEmail($mail_address,$subject,$message)
{
    $ci =& get_instance();

    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'shvmsngh99@gmail.com', // change it to yours
        'smtp_pass' => '9450250000', // change it to yours
        'mailtype' => 'text',   //change to html if u need
        'charset' => 'utf-8',
        'newline' => "\r\n",
        'wordwrap' => TRUE,
        'mailtype'=>'html'
    );

    $ci->load->library('email', $config);
    $ci->email->set_newline("\r\n");
    $ci->email->from('shvmsngh99@gmail.com'); // change it to yours
    $ci->email->to($mail_address);// change it to yours
    $ci->email->subject($subject); //ur subject
    $ci->email->message($message);


    if($ci->email->send())
    {
        echo 'Email sent.';
    }
    else
    {
        show_error($ci->email->print_debugger());
    }



}
