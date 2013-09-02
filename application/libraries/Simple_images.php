<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simple_images
{

	/*
		The URI path to the images directory.
	*/
	protected $_images_uri = '/images';

	/*
		The full file path to the images directory.
	*/
	protected $_images_dir;

	/*
		Name of the thumbnails sub-directory.
	*/
	protected $_thumbnail_dir_name = 'thumbnails';

	function __construct()
	{
		$this->ci =& get_instance();

		$this->ci->load->helper('file');

		$this->_images_dir = rtrim(FCPATH, '/') . $this->_images_uri;
	}

	/*
		Returns all images from the directory specified by 'path' as a flat array.
	*/
	public function get($path = '')
	{
		$files = get_dir_file_info($this->_images_dir . $path);

		$images = array();

		if (count($files) > 0)
			foreach ($files as $file)
			{
				if (!isset($file['name']))
					continue;

				if ($this->is_image($file['name']))
				{
					$image = array();

					$image['full'] = $this->_images_uri . $path . '/' . $file['name'];
					$image['thumbnail'] = '';

					$thumbnail = $this->_thumbnail_file_path($path, $file['name']);

					if (file_exists($thumbnail))
						$image['thumbnail'] = $this->_thumbnail_uri_path($path, $file['name']);

					$images[$file['name']] = $image;
				}
			}

		return $images;
	}

	/*
		Override the default images directory file path.
	*/
	public function images_dir($file_path)
	{
		$this->_images_dir = $file_path;
	}

	/*
		Override the default images URI path.
	*/
	public function images_uri($uri_path)
	{
		$this->_images_uri = $uri_path;
	}

	/*
		Override the default thumbnail sub-directory name.
	*/
	public function thumbnail_path($name)
	{
		$this->_thumbnail_dir_name = $name;
	}

	protected function _thumbnail_file_path($base_path = '', $filename)
	{
		return $this->_images_dir . $base_path . '/' . $this->_thumbnail_dir_name . '/' . $filename;
	}

	protected function _thumbnail_uri_path($base_path = '', $filename)
	{
		return $this->_images_uri . $base_path . '/' . $this->_thumbnail_dir_name . '/' . $filename;
	}

	protected function is_image($filename)
	{
		$extension = substr($filename, strpos($filename, '.') + 1);

		return 	$extension === 'jpg' ||
				$extension === 'jpeg' ||
				$extension === 'png' ||
				$extension === 'gif';
	}

}


/* End of file Simple_images.php */
/* Location: ./application/libraries/Simple_images.php */