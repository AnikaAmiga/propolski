<?php
class Controller_Profile extends Controller
{
	function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Model_Profile($db);
	}

	function action_index()
	{	
		$this->view->generate('profile_view.php', 'template_view.php');
	}

	function action_addUserImg()
	{	
		$res=$this->model->addUserImg();
		if ($res) {
				setcookie ("usrUpdateMsg", "", time() - 3600, "/");	
			}	
		//header("location: /profile");

	}
		function action_addUserData()
	{			
		$res=$this->model->addUserData();
		if ($res) {
			setcookie ("usrUpdateMsg", "", time() - 3600, "/");	
		}	//. $this->config["prefix"]
		header("location: /profile");
	}
}