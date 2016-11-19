<?php

class Controller_User extends Controller
{

	function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Model_User($db);		
	}

	function action_index()
	{	
		// $this->view->generate('sign_auth_view.php', 'template_view.php');
	}
		function action_auth()
	{	
		// if ($_POST["signup"]) { в новом так
		// 	$this->model->regUser();
		// 	$_SESSION["auth"] = true;
		// 	header("location: /");
		// }
		// $this->view->generate('sign_auth_view.php', 'template_view.php');
		if ($this->passwd= trim (htmlspecialchars(strip_tags($_POST['auth'])))){
			//$this->view->generate('sign_auth_view.php', 'template_view.php');
			$res=$this->model->authUser();	
			if ($res) {
			//	echo "OK";
				$this->autorizedUser();
				header("location: /profile.". $this->config["prefix"]); // все игнорим
				die();
				// $this->view->generate('profile_view.php', 'template_view.php');
			} else {
			//	echo "123";
				$_SESSION["auth"]=false;					
			}

		} 
		//header("location: /login.". $this->config["prefix"]);
		$this->view->generate('sign_auth_view.php', 'template_view.php');// последнее
		
	}
		function action_reg()
	{	
		if ($this->passwd= trim (htmlspecialchars(strip_tags($_POST['reg'])))){
			$res=$this->model->regUser();
			if ($res) {
				$this->autorizedUser();
			} else {
				$_SESSION["auth"]=false;
				header("location: /registration.".$this->config["prefix"]);
				$this->view->generate('sign_registrate_view.php', 'template_view.php');
			}
		} else {
			$this->view->generate('sign_registrate_view.php', 'template_view.php');
		}

	}

	function action_profile()
	{	
		// if ($this->passwd= trim (htmlspecialchars(strip_tags($_POST['edit'])))){
		// 	$res=$this->model->editUser();	
		// } elseif ($this->passwd= trim (htmlspecialchars(strip_tags($_POST['drop'])))){
		// 	$res=$this->model->dropUser();	
		// } else {
		// 	$res=$this->model->getUserInfo();
		// }
		//var_dump($res) ;
		$res=$this->model->getUserInfo();
		$this->view->generate('profile_view.php', 'template_view.php', $res);// последнее
		
	}

		function action_edit()
	{	//	var_dump($_POST)	;
		if (isset($_POST['edit'])) {			
			$res=$this->model->editUser();
			$ses=$this->model->getSerializedUserInfo($this->model->getLogin());	
			// var_dump(unserialize($ses)) ;
			// echo "<br>FFF";
			// var_dump($this->model->getUserInfo());
			header("location: /profile.". $this->config["prefix"]);
			die();
		} elseif (isset($_POST['drop'])) {
			$res=$this->model->dropUser();	
			$_SESSION["userInfo"] = $this->model->getSerializedUserInfo($this->model->getLogin());
			$_SESSION["auth"]=false;
			header("location: /"); // все игнорим
			die();
		}else {
			header("location: /profile.". $this->config["prefix"]); // все игнорим
			die();
		}
		//var_dump($res) ;

		$this->view->generate('profile_view.php', 'template_view.php', $res);// последнее
		
	}


	function action_rememberPass()
	{	
		//echo "/rememberPass.".$this->config["prefix"];
		//header("location: /rememberPass.".$this->config["prefix"]);
		$this->view->generate('sign_rememberPass_view.php', 'template_view.php');
		
	}
	//TODO: вынести это в функции
	function autorizedUser () {
			$_SESSION["auth"]=true;
			$sess_id=date("ymdhms").uniqid()."_".time();
			$_SESSION["login"] = $this->model->getLogin();
			$_SESSION["sesson"] = $sess_id;
			setcookie("sesson", $sess_id, $this->model->getCookieTime(), "/");
			setcookie("login", $this->model->getLogin(), $this->model->getCookieTime(), "/");
			$_SESSION["userInfo"] = $this->model->getSerializedUserInfo($this->model->getLogin());
			// Удаляем куку регистрации
			setcookie ("authMsg", "", time() - 3600, "/");	
			setcookie ("registrateMsg", "", time() - 3600, "/");
			header("location: /profile.html");

	}
}