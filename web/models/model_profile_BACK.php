<?

class Model_Profile extends Model
{

	public function __construct ($db){
		parent::__construct($db);
		// echo "111";
		// var_dump($_POST);
		// var_dump($_FILES);
	// if (trim (htmlspecialchars(strip_tags($_GET['addUserImg'])))) {
	// 	echo "111";
	// 	//добавление основной картинки
	// 	$ext = substr($_FILES['avatar']['name'], 1 + strrpos($_FILES['input23[]']['name'], "."));
	// 	$extFile='';
	// 	if (in_array($ext,array('jpeg','jpe','jpg'))) $extFile = '.jpeg';
	// 	if (in_array($ext,array('gif'))) $extFile = '.gif';
	// 	if (in_array($ext,array('png'))) $extFile = '.png';
	// 	$userInfo=unserialize($_SESSION["userInfo"]); 
	// 	$imgPath="web/static/img/avatars/".$userInfo["login"].$extFile;
	// 	if ($extFile) {
	// 		move_uploaded_file($_FILES["input23[]"]['tmp_name'], $imgPath );
	// 		} else {
	// 			setcookie("usrUpdateMsg","Не верный фотрмат файла",0 ,'/');
	// 		}
	// 		echo $imgPath;echo "<br>";
	// 		var_dump($extFile);echo "<br>";var_dump($_FILES["input23[]"]['tmp_name']);
	// 	}
		// elseif (trim (htmlspecialchars(strip_tags($_POST['addUserData'])))) {
			// $this->login = trim (htmlspecialchars(strip_tags($_POST['ulogin'])));
			// $this->passwd= trim (htmlspecialchars(strip_tags($_POST['password'])));
			// $this->email = trim (htmlspecialchars(strip_tags($_POST['email'])));
			// // echo "$this->login $this->passwd  $this->email";
			// // echo "<br>";	
			// $this->valid = Validation::checkAllFields(["login"=>$this->login, 'passwd'=>$this->passwd, "email"=>$this->email]);
			// if (!$this->valid) {
				
			// 	die();
			// }
			// $this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT); //  создаем хеш
			// $this->login = mysqli_real_escape_string($this->db->dbc, $this->login);
			// $this->passwd = mysqli_real_escape_string($this->db->dbc, $this->passwd);
			// $this->email = mysqli_real_escape_string($this->db->dbc, $this->email);
		
		// }
	}


	public function addUserData () {
		if (trim (htmlspecialchars(strip_tags($_POST['addUserData'])))) {
			$this->login = trim (htmlspecialchars(strip_tags($_POST['ulogin'])));
			$this->passwd= trim (htmlspecialchars(strip_tags($_POST['password'])));
			$this->email = trim (htmlspecialchars(strip_tags($_POST['email'])));
			// echo "$this->login $this->passwd  $this->email";
			// echo "<br>";	
			$this->valid = Validation::checkAllFields(["login"=>$this->login, 'passwd'=>$this->passwd, "email"=>$this->email]);
			if (!$this->valid) {
				
				die();
			}
			$this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT); //  создаем хеш
			$this->login = mysqli_real_escape_string($this->db->dbc, $this->login);
			$this->passwd = mysqli_real_escape_string($this->db->dbc, $this->passwd);
			$this->email = mysqli_real_escape_string($this->db->dbc, $this->email);
		}

	}
	public function addUserImg () {
		if (trim (htmlspecialchars(strip_tags($_GET['addUserImg'])))) {
			echo "111";
			//добавление основной картинки
				$ext = substr($_FILES['avatar']['name'], 1 + strrpos($_FILES['input23[]']['name'], "."));
			$extFile='';
			if (in_array($ext,array('jpeg','jpe','jpg'))) $extFile = '.jpeg';
			if (in_array($ext,array('gif'))) $extFile = '.gif';
			if (in_array($ext,array('png'))) $extFile = '.png';
			$userInfo=unserialize($_SESSION["userInfo"]); 
			$imgPath="web/static/img/avatars/".$userInfo["login"].$extFile;
			if ($extFile) {
				move_uploaded_file($_FILES["input23[]"]['tmp_name'], $imgPath );
			} else {
				setcookie("usrUpdateMsg","Не верный фотрмат файла",0 ,'/');
			}
			echo $imgPath;echo "<br>";
			var_dump($extFile);echo "<br>";var_dump($_FILES["input23[]"]['tmp_name']);
		}
	}

	
}
?>
