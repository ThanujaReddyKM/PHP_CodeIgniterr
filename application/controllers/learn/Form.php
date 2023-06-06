<?php
class Form extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');

                 //$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
                 $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required',
                array('required' => 'You must provide a %s.'));
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');

                             
                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('learn/myform');
                }
                else
                {
                        $this->load->view('learn/formsuccess');
                }
        }
// 
        //  public function username_check($str)
        // {
        //         if ($str == 'test')
        //         {
        //                 $this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
        //                 return FALSE;
        //         }
        //         else
        //         {
        //                 return TRUE;
        //         }
        // }
}


// ----->Setting Rules Using an Array


//                 $config = array(
//         array(
//                 'field' => 'username',
//                 'label' => 'Username',
//                 'rules' => 'required'
//         ),
//         array(
//                 'field' => 'password',
//                 'label' => 'Password',
//                 'rules' => 'required',
//                 'errors' => array(
//                         'required' => 'You must provide a %s.',
//                 ),
//         ),
//         array(
//                 'field' => 'passconf',
//                 'label' => 'Password Confirmation',
//                 'rules' => 'required'
//         ),
//         array(
//                 'field' => 'email',
//                 'label' => 'Email',
//                 'rules' => 'required'
//         )
//         );
//    $this->form_validation->set_rules($config);



//Another Type method


                // $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
                // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                // $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
                // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
     