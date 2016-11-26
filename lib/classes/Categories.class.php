<?

class Categories
{
	
	protected $query;
	protected $errText;
	protected $db;


	public function __construct ($db){
		$this->db = $db;
	}

	public function getAllCategories()
	{	
		$this->query="SELECT `id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `parentid`, `isPublic`, `logo` FROM `CATEGORIES`";
		return $this->resultFormaterFromDB($this->query);
	}
		public function getCategoriesByMenuId($menuid)
	{	
		$this->query="SELECT `id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `parentid`, `isPublic`, `logo` FROM `CATEGORIES` WHERE `menuid`=$menuid";
		return $this->resultFormaterFromDB($this->query);
	}

	

	public function getCategorуById($id)
	{	
		$this->query="SELECT  `id`, `name`, `title`, `desctiption`, `keywords`, `menuid`, `parentid`, `isPublic` , `logo`FROM `CATEGORIES` where `id`='$id'";
		return $this->resultFormaterFromDB($this->query);
	}

	public function resultFormaterFromDB($query){
		$dataArr["data"]=$this->db->getQueryResutlInArray($query);
		// echo $query;
		// var_dump($dataArr["data"]);
		if($dataArr["data"][0]){ // если получили коректный результат от базы
			$errStatus=false;
			$errText="";
		}else {
			$errStatus=true;
			$errText="Не удалось получить данные из базы";
		}
		$result =  [
    		"errStatus" => $errStatus,
    		"errText" => $errText
		];
		 $result=array_merge($result, $dataArr);
		 // var_dump($result);
		return $result;
	}


}
?>