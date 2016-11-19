<?

class Validation
{

	public function checkAllFields($arr){
		if (count($arr) === 0) {
			return false;
		}
		// echo "arr ".var_dump($arr);
		foreach ($arr as $rule => $value) {
			// echo "<br> value (".$value.")";
			if (!self::checkEmpty($value) || !self::checkType($value) || !self::checkLength($value)) {

				return false;
			}
			switch ($rule) {
				case 'login':
					if (!self::checkLogin($value)) {
						return false;
					}
					break;
				case 'passwd':
					if (!self::checkPasswd($value)) {
						return false;
					}
					break;
				case 'email':
					if (!self::checkEmail($value)) {
						return false;
					}
					break;	
				case 'first_name':
					if (!self::checkFirst_name($value)) {
						return false;
					}
					break;	
				case 'last_name':
					if (!self::checkLast_name($value)) {					
						return false;
					}
					break;	
			}
		}
		return true;
	}

	public function checkType($data, $type="string"){
		if (gettype($data) == $type) {
			return true;
		}
		//echo "checkType".$data;
		return false;
	}

	public function checkEmpty($data){
		if ($data==="") {
			//echo "empty".$data;
			return false;
		}
		return true;
	}	

	public function checkLength($data, $min = 3, $max = 127){
		if (iconv_strlen($data) < $min || iconv_strlen($data) > $max) {
			// echo "checkLength ".$data;			
			return false;
		}
		return true;
	}

	public function checkLogin($login){
		if (preg_match('|^[\w]{3,127}$|', $login)) {
			return true;
		}	
	//	echo "checkLogin ".$login;	
		return false;
	}


	public function checkPasswd($passwd){
		if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/',$passwd) 
			//&& preg_match('|[A-Z]+|',$passwd) && preg_match('|[a-z]+|',$passwd)
			) {
			return true;
		}
		//echo "checkPasswd ".$passwd;	
		return false;
	}
	public function checkEmail($email){
		if (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',$email)) {
			return true;
		}
		//echo "checkEmail ".$email;
		return false;
	}

	public function checkFirst_name($first_name){
		// var_dump($first_name);
			
		if (preg_match('/^[\w]{3,127}$/', $first_name)) {
			return true;
		}	
	//	echo "checkLogin ".$login;	
		return false;
	}
	public function checkLast_name($last_name){
		if (preg_match('/^[\w]{3,127}$/', $last_name)) {
			return true;
		}	
	//	echo "checkLogin ".$login;	
		return false;
	}
	public function checkTel(){

	}
	public function checkText(){

	}
	public function checkFile(){

	}
}
class UsefulFunction
{
// 	public function getDomain()
// 		{
//   			$result = ''; // Пока результат пуст
//    			 if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
//     			// В защищенном! Добавим протокол...
//     			$result .= 'https://';
//   			} else {
//    			 	// Обычное соединение, обычный протокол
//    			 	$result .= 'http://';
//   			}
//     		// Имя сервера, напр. site.com или www.site.com
//   			 $result .= $_SERVER['SERVER_NAME'];
//      		return $result;
// 		}

  function translit($str) {
    $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ');
    $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '_');
    $str=str_replace($rus, $lat, $str);
    // заменям все ненужное нам на "-"
   $str = preg_replace('~[^-a-zA-Z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
   $str = trim($str, "-");
    return $str;
  }


  function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
	list($w_i, $h_i, $type) = getimagesize($file_input);
	if (!$w_i || !$h_i) {
		echo 'Невозможно получить длину и ширину изображения';
		return;
        }
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
    	        $func = 'imagecreatefrom'.$ext;
    	        $img = $func($file_input);
        } else {
    	        echo 'Некорректный формат файла';
		return;
        }
	if ($percent) {
		$w_o *= $w_i / 100;
		$h_o *= $h_i / 100;
	}
	if (!$h_o) $h_o = $w_o/($w_i/$h_i);
	if (!$w_o) $w_o = $h_o/($h_i/$w_i);

	$img_o = imagecreatetruecolor($w_o, $h_o);
	imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
	if ($type == 2) {
		return imagejpeg($img_o,$file_output,100);
	} else {
		$func = 'image'.$ext;
		return $func($img_o,$file_output);
	}
}

}



	
?>