<?php
	$this->load->library('session'); 
	if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
	 //echo"Cannot Login";
   }
   else
   {
     //Go to private area
	 //echo"login";
	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $email = $this->input->post('email');
	
	   //query the database
	   $result = $this->user->login($email, $password);
	
	   if($result)
	   {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(	   	
			 'uid' => $row->uid,
			 'email' => $row->email,
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
		 }
		 return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', 'Invalid email or password');
		 return false;
	   }
	 }
     redirect('/myprofile', 'refresh');
   }
?>