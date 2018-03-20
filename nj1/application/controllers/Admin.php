<?php


class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function admin_address()
    {
        admin_auth();
        $submit = $this->input->post('submit');
        $this->load->library('form_validation');
        if($submit == 'submit')
        {
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('password_confirmation','Confirm Password','trim|required|matches[password]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('private_key','private_key','required');
            $this->form_validation->set_rules('key_password','key password','required');

            if($this->form_validation->run() == TRUE)
            {
                    $name = $this->input->post('name',true);
                    $email = $this->input->post('email',true);
                    $password = $this->_password($this->input->post('password',true));
                    $private_key = $this->input->post('private_key',ture);
                    $key_password = $this->input->post('key_password',true);
                    $return = $this->_custom_query("select MAX(id) as id from user");
                    $u_id = $return->result()[0]->id;
                    $unique_id =  mt_rand(1000,9999).str_pad($u_id,6,"0",STR_PAD_LEFT);
                    $reff_code = $this->rand_no(8);

                    //insert into database

                    $this->_custom_query("INSERT INTO user(name, email, password,unique_id,refferal_code) VALUES ('$name','$email','$password','$unique_id','$reff_code')");
                    $insert_id = $this->db->insert_id();
                    $this->_custom_query("INSERT INTO withdrawal_permission(user_id) VALUES('$insert_id')");
                   

                    // //Generate eth wallet address
                    //     $user_id = $insert_id;
                    //    // $token = '0ed7eba50c5c43f3821046a01b510ee0';
                    //   $url = "http://localhost:3003/api/createEtherAccount";
                    //   $ch = curl_init($url);
                    //   curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
                    //   curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
                    //   //curl_setopt($ch,CURLOPT_POST,1);
                    //   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    //   $output = curl_exec($ch);
                    //   curl_close($ch);
                    //   $x = substr(substr($output, 1),0,-1);
                    //   //$result_data = json_decode($output, true);
                    
                    $url = "http://localhost:3003/api/importFile"; 
                    $ch = curl_init($url);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
                    curl_setopt($ch,CURLOPT_POST,1);
                    curl_setopt($ch,CURLOPT_POSTFIELDS,"prik=$private_key&pass=$key_password");
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    $output = curl_exec($ch);
                    curl_close($ch); 
                    $output = json_decode($output);
                    
                    $admin_address =  '0x'.$output->address;
                    
                      $query = $this->_custom_query("INSERT INTO address(user_id,address,coin_type) VALUES('$user_id','$admin_address','e')");
                    $this->_custom_query("insert into admin_address (user_id,address) values ('$user_id','$admin_address')");
                     $msg = "Key address created successfully!";
                     $value = '<div class="alert alert-success">' . $msg . '</div>';
                     $this->session->set_flashdata('item', $value);
                     redirect(base_url('admin/admin_address'));    
            } 

        }
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Change Address';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Change_address');
         $this->load->view('admin/Footer');   
    }
    function phase_delete()
    {
        $uri = $this->uri->segment(3);
        if(!is_numeric($uri))
        {
           redirect(base_url('admin/phase'));
        }
        $this->_custom_query("delete  from phase where id = $uri");
        redirect(base_url('admin/phase'));
    }
    function rand_no($rand)
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $res = "";
        for ($i = 0; $i < $rand; $i++) {
           $res .= $chars[mt_rand(0, strlen($chars)-1)];
        }
         return $res;
    }
    function dashboard()
    {
        admin_auth();
        $data['title'] = 'Dashboard';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Dashboard');
        $this->load->view('admin/Footer');
    }
    function phase()
    {
        admin_auth();
        $data['flash'] = $this->session->flashdata('item');
        $data['return'] = $this->_custom_query("select * from phase order by id desc");
        $data['title'] = 'Phase Manage';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Phase_manage');
        $this->load->view('admin/Footer');
    }
    function phase_create()
    {
        admin_auth();
        print_r($_post);

        $submit = $this->input->post('submit');
        $update_id = $this->uri->segment(3);
        $this->load->library('form_validation');
        $this->load->model('Admin_model'); 
        if($submit == 'submit')
        {  
           if(!is_numeric($update_id))
           {
              //insert
               $data = $this->_get_data_from_post();
               $this->Admin_model->_insert_phase($data); 
               $msg = "Phase created successfully!";
               $value = '<div class="alert alert-success">' . $msg . '</div>';
               $this->session->set_flashdata('item', $value);
               redirect(base_url('admin/phase'));
           }
           else
           {
             //update
               $data = $this->_get_data_from_post();
               $this->Admin_model->_update_phase($update_id,$data); 
           }
        }  
        if($submit != 'submit' && isset($update_id))
        {
            $data = $this->_get_data_from_db($update_id);
        }
        else
        {
             $data = $this->_get_data_from_post();
        }
        $data['update_id']=$update_id;
        $data['title'] = 'Phase Create';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Phase_create');
        $this->load->view('admin/Footer');   
    }

    function _get_data_from_post()
    {
        $data['title'] = $this->input->post('title',true);
        $start_date = $this->input->post('start_date',true);
        $s_d = explode('/', $start_date);
        $data['start_date'] = $s_d[2].'-'.$s_d[0].'-'.$s_d[1];

        $end_date = $this->input->post('end_date',true);
        $e_d = explode('/', $end_date);
        $data['end_date'] = $e_d[2].'-'.$e_d[0].'-'.$e_d[1];

        $data['bonus_amount'] = $this->input->post('bonus_amount',true);
        $data['target'] = $this->input->post('target',true);
        $data['reffral_amount'] = $this->input->post('reffral_amount',true);
        return $data;
    }
    function _get_data_from_db($update_id)
    {
        $return = $this->_custom_query("select * from phase where id = $update_id");
        
        foreach ($return->result() as $row) 
        {
            # code...
            $data['title'] = $row->title;
            $data['start_date']= $row->start_date;
            $data['end_date'] = $row->end_date;
            $data['bonus_amount'] = $row->bonus_amount;
            $data['reffral_amount'] = $row->reffral_amount;
            $data['target']=$row->target;
        }
        return $data;
    }
    function user_block()
    {
    	admin_auth();
    	$action = $this->uri->segment(3);
    	$user_id = $this->uri->segment(4);
    	if(!is_numeric($user_id))
    	{
    		redirect(base_url('admin/view_user'));
    	}
    	if($action == 'block')
    	{
           
           $this->_custom_query("update user set u_status = 0 where id = $user_id");
           redirect(base_url('admin/view_user'));
    	}
    	else
    	{
    	   $this->_custom_query("update user set u_status = 1 where id = $user_id");
           redirect(base_url('admin/view_user'));
    	}
   
    }


    function withdrawal_permission(){
        $query = $this->_custom_query("SELECT user.id, user.name, user.email, withdrawal_permission.permission FROM user INNER JOIN withdrawal_permission ON user.id = withdrawal_permission.user_id");
        $data['result'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Withdrawal_permission');
        $this->load->view('admin/Footer');
    }

    function authorize_user(){
        $id = $_POST['id'];
        $query = $this->_custom_query("UPDATE withdrawal_permission SET permission = '1' WHERE user_id = '$id'");
        echo "authorized";
    }

    function unauthorize_user(){
        $id = $_POST['id'];
        $query = $this->_custom_query("UPDATE withdrawal_permission SET permission = '0' WHERE user_id = '$id'");
        echo "unauthorized";   
    }
    function authorize_all_user(){
        $query = $this->_custom_query("UPDATE withdrawal_permission SET permission = '1'");
        echo "Authorized";   
    }
    function unauthorize_all_user(){
        $query = $this->_custom_query("UPDATE withdrawal_permission SET permission = '0'");
        echo "Anauthorized";   
    }

    function fees()
    {
        admin_auth();
        $submit = $this->input->post('submit',TRUE);
        // $internal = $this->input->post('internal',true);
        $external = $this->input->post('external',true);
        $fee_id = $this->input->post('id');

        if($submit == 'submit')
        {
           $internal = (float)$internal;
           $external = (float)$external;
           $admin_id = $_SESSION['etp_admin_id'];

           $this->_custom_query("update fees set external = $external,updated_by=$admin_id where id = '2'");
           $msg = "Fees Updated successfully!";
           $value = '<div class="alert alert-success">' . $msg . '</div>';
           $this->session->set_flashdata('item', $value);
           redirect(base_url('admin/fees'));
        }

        $query = $this->_custom_query("select * from fees");
        $data['result'] = $query->result();
        $data['date_of_updation'] = $query->result()[0]->date_of_updation;

        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Fees';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Fees');
        $this->load->view('admin/Footer');

    }
    function login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $submit = $this->input->post('submit', TRUE);
        $this->load->library('form_validation');
        if ($submit == 'login') {

            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            if ($this->form_validation->run() == True) {
                //check if username and password is correct
                $usr_result = $this->_get_user($username, $password);
                $user_data = $usr_result->result();

                if ($user_data[0]->id > 0) //active user record is present
                {
                    //set the session variables
                    $sessiondata = array(
                        //get user id here
                        'admin_etp'=>true,
                        'etp_admin_id' => $user_data[0]->id,
                        'etp_admin_email' => $username
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect(base_url("admin/view_user"));
                } else
                {
                    $msg = "Invalid username and password!";
                    $value = '<div class="alert alert-danger">' . $msg . '</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect(base_url('admin/login'));
                }
            }
        }
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Login';

        $this->load->view('admin/Login',$data);
    }

    function external()
    {
        admin_auth();
        $data['return'] = $this->_custom_query("select external_transaction.id as exe_id,external_transaction.coin_type,user.unique_id,external_transaction.address,external_transaction.amount,external_transaction.fees,external_transaction.date_of_creation from external_transaction 
inner join user 
on external_transaction.user_id = user.id  where  status=0");
        $data['title'] = 'External Transaction';
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/External');
        $this->load->view('admin/Footer');
    }
    function exe_action()
    {
        admin_auth();
        $status = $this->input->post('status');
        $transaction_id = $this->input->post('transaction_id');

        $update_id = $this->uri->segment(3);
        if(is_numeric($update_id))
        {
            $this->_custom_query("update external_transaction set status = $status,transaction_id='$transaction_id' where external_transaction.id = $update_id");
            redirect(base_url('admin/external'));
        }
    }
    function ext_edit()
    {
        admin_auth();
        $update_id = $this->uri->segment(3);
        $data['title'] = 'External edit';
        $data['update_id']=$update_id;
        if(is_numeric($update_id))
        {
           $this->load->view('admin/Header',$data);
           $this->load->view('admin/Exe_edit');
           $this->load->view('admin/Footer');

        }else
        {
            redirect(base_url('admin/external'));
        }
    }

    function view_user(){
        admin_auth();
        $data['title'] = 'View User';
        $query = $this->_custom_query("SELECT * FROM user");
        $data['result'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_user');
        $this->load->view('admin/Footer');
    }

    function external_txn_history(){
        admin_auth();
        $data['title'] = 'External Transaction History';
       $query = $this->_custom_query("select external_transaction.id as exe_id,external_transaction.coin_type, user.unique_id,external_transaction.address,external_transaction.amount,external_transaction.fees,external_transaction.date_of_creation from external_transaction 
inner join user 
on external_transaction.user_id = user.id");
       $data['result'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/Ext_trn_history');
        $this->load->view('admin/Footer');
    }

    function view_btc_address(){
        admin_auth();
        $query = $this->_custom_query("SELECT address.address, address.coin_type, address.public, address.private, user.name FROM address INNER JOIN user ON address.user_id = user.id WHERE address.coin_type='b'");
        $data['address'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_addresses');
        $this->load->view('admin/Footer');
    }

    function view_ltc_address(){
        admin_auth();
        $query = $this->_custom_query("SELECT address.address, address.coin_type, address.public, address.private, user.name FROM address INNER JOIN user ON address.user_id = user.id WHERE address.coin_type='l'");
        $data['address'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_addresses');
        $this->load->view('admin/Footer');
    }

    function view_eth_address(){
        admin_auth();
        $query = $this->_custom_query("SELECT address.address, address.coin_type, address.public, address.private, user.name FROM address INNER JOIN user ON address.user_id = user.id WHERE address.coin_type='e'");
        $data['title'] = 'Eth Address';
        $data['address'] = $query->result();
        $this->load->view('admin/Header',$data);
        $this->load->view('admin/View_addresses');
        $this->load->view('admin/Footer');
    }

    function minimum_token(){
        admin_auth();
        $query = $this->_custom_query("SELECT * FROM minimum_token WHERE id = '1'");
        $data['min_token'] = $query->result()[0]->minimum_token;

            if($this->input->post('submit')){
                $min_token = $this->input->post('min_token');
                $query = $this->_custom_query("UPDATE minimum_token SET minimum_token = '$min_token' WHERE id = '1'");

                $msg = "Token Updated successfully!";
               $value = '<div class="alert alert-success">' . $msg . '</div>';
                $this->session->set_flashdata('item', $value);
               redirect(base_url('admin/minimum_token'));
            }
         $this->load->view('admin/Header',$data);
        $this->load->view('admin/Minimum_token');
        $this->load->view('admin/Footer');
    }

    function logout()
    {
         unset($_SESSION['admin_etp']);
          unset($_SESSION['etp_admin_id']);
        redirect(base_url('admin/login'));
    }
    function _get_user($usr, $pwd)
    {
        $pwd = $this->_password($pwd);
        $query = "select * from admin where username = '" . $usr . "' and password = '" . $pwd . "'";
        $query = $this->_custom_query($query);
        return $query;
    }
    function _password($password = null)
    {
        $password = hash('sha256',$password.SALT);
        return  $password;
    }
    function _get_where($update_id)
    {
        $this->load->model('Admin_model');
        $return = $this->Admin_model->get_where($update_id);
        return $return;
    }

    function _get($order_by)
    {
        $this->load->model('Admin_model');
        $return = $this->Admin_model->get($order_by);
        return $return;
    }

    function _insert($data)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('Admin_model');
        $this->Admin_model->_update($id, $data);
    }

    function _custom_query($query)
    {
        $this->load->model('Admin_model');
        return $this->Admin_model->_custom_query($query);
    }
}