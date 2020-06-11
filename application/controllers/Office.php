<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {


	function index()

	{

		if($this->session->userdata('login') == TRUE){
			//redirect('master/showuser');
				redirect('dashboard');
			
		}
		else{
			redirect('login');
		}

	}

	

}



/* End of file welcome.php */

/* Location: ./system/application/controllers/welcome.php */

