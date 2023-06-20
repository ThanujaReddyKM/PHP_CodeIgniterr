<?php
class Page extends CI_Controller{
	function about(){
		$this->load->view('front/about');
	}

	function services(){
		$this->load->view('front/services');
	}

	function contact(){
		$this->load->library('form_validation');

	$this->form_validation->set_rules('name','Name','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

	if($this->form_validation->run() == TRUE){
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'roshinisorun@gmail.com',
			'smtp_pass' => 'thanu8105814391',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1'
		);

// 		$config = array(
//     'protocol' => 'smtp',
//     'smtp_host' => 'ssl://smtp.gmail.com',
//     'smtp_port' => 465,
//     'smtp_user' => 'roshinisorun@gmail.com',
//     'smtp_pass' => 'thanu8105814391',
//     'mailtype' => 'html',
//     'charset' => 'iso-8859-1'
// );

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");

		$this->email->to('thanujareddykm@gmail.com');
		$this->email->from('roshinisorun@gmail.com');
		$this->email->subject('you have received an enquiry');

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$msg = $this->input->post('message');

		$message = "Name: ".$name;
		$message .= "<br>";
		$message .= "Email: ".$email;
		$message .= "<br>";
		$message .= "Message: ".$msg;
		$message .= "<br>";
		$message .= "<br>";

		$message .= "Email Example by Thanuja Reddy";

		$this->email->message($message);
		$this->email->send();

		$this->session->set_flashdata('msg','Thanks for your enquiry, we will get back to you soon');
		redirect(base_url('page/contact'));

	}
	else
	{
		$this->load->view('front/contact-us');

	}

	}

	

}
?>