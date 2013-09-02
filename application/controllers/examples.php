<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->library('Simple_images');
	}

	public function simple_gallery()
	{
		$data = array();

		$data['images'] = $this->simple_images->get('/gallery');

		// Sort the images by their file names.
		ksort($data['images']);
		
		$this->load->view('examples/simple_gallery', $data);
		exit;
	}
	
}