<?php

class Controller {

	private $post_data, $get_data;

	public function loadModel($name)
	{
		require(APP_DIR .'models/'. strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}
	
	public function loadView($name)
	{
		$view = new View($name);
		return $view;
	}
	
	public function loadPlugin($name)
	{
		require(APP_DIR .'plugins/'. strtolower($name) .'.php');
	}
	
	public function loadHelper($name)
	{
		require(APP_DIR .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	public function redirect($loc)
	{
		global $config;
		
		header('Location: '. $config['base_url'] . $loc);
	}

	// Handle a POST request with the option of using PRG - POST/REQUEST/GET
    public function post($redirect = true) {

    	global $config;

    	if ($_POST) 
    	{

    		$data = $this->build_form_array($_POST);
    		Session_helper::set('post_data', $_POST);
			$url = parse_url($_SERVER['REQUEST_URI']);	

			//if ($redirect)
				header('Location: '. $url['path']);
			//else
				//return $data;

    	}
    	else 
    	{

    		$session_data = Session_helper::get('post_data');

    		if (isset($session_data)) {

				$this->post_data = $session_data;

				if ($redirect != false) {
					Session_helper::destroy('post_data');
				}
				return $this->post_data;
    		}
 			else {
 				return false;
 			}
    	}
    }


	// Handle a GET request with the option of using PRG - POST/REQUEST/GET
    public function get_var($redirect = false) {

    	global $config;
		
    	if ($_GET) 
    	{

    		$data = $this->build_form_array($_GET);
			Session_helper::set('get_data', $_GET);
			$url = parse_url($_SERVER['REQUEST_URI']);

			if ($redirect)
				header('Location: '. $url['path']);
			else
				return $data;

    	}
    	else 
    	{

    		$session_data = Session_helper::get('get_data');

    		if (isset($session_data)) {
				$this->get_data = $session_data;
				Session_helper::destroy('get_data');
				return $this->get_data;

    		}
 			else {
 				return false;
 			}

    	}
    }
	

	// Build an array from the POST/GET vars to more easily use
	public function build_form_array($form_values) 
	{
		
		$data = array();
		foreach($form_values as $key => $value)
			$data[$key] = $value;
		return $data;
		
	}
    
}

?>