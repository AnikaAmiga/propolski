<?

class Menu
{
	
	protected $query;
	protected $errText;
	protected $db;


	public function __construct ($db){
		$this->db = $db;
	}

 	public function getMenu ($flag="web") {
		//$dataArr ["data"]=[];
		if ($flag=="admin") {
			$this->query="SELECT `id`, `name`, `ru_name`, `small_name`, `logo`, `url` FROM `MENU_ADMIN`";
		}else {
			$this->query="SELECT `id`, `name`, `ru_name`, `small_name`, `logo`, `url` FROM `MENU`";
		}
		
		$dataArr["data"]=$this->db->getQueryResutlInArray($this->query);
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
    		"errText" => $errText,
    		"data" => $allMenu
		];
		 $result=array_merge($result, $dataArr);
		return $result;
  }
}
?>