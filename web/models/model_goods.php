<?

class Model_Goods extends Model
{
	
	protected $query;


	public function __construct ($db){
		parent::__construct($db);
	}

 	public function getAllGoods () {
		$this->query="SELECT  `idGood`, `name`, `nameLink`, `price`, `oldPrice`, `endingGood`, `description`, `mediaLinkVideo`, `mediaLinkDemo`, `topSales`, `promo`,`imgGood`,`raiting` FROM `GOODS`";
		$allgoods=$this->db->getQueryResutlInArray($this->query);
		//var_dump($allgoods);
		 $new_all_goods = [];
		foreach ($allgoods as $key => $onegood) {
			if(isset($onegood["idGood"])) {
				$this->query="SELECT  `color` FROM `GOODS_COLOR` where  `idGood`='".$onegood["idGood"]."'";
				 	$goodColors ["goodColors"]=[];
					$goodColors["goodColors"]=$this->db->getQueryResutlInArray($this->query);
					 $new_one_goods=array_merge($onegood, $goodColors);
					//array_push($onegood, $goodColors["goodColors"]);
					//var_dump(array_merge($onegood, $goodColors));
					$new_all_goods[] = $new_one_goods;//добавляет в конец
					 // $new_all_goods=array_merge($new_all_goods, $new_onegood);

					// var_dump($new_all_goods);
					// echo "___________________________________";
					
			} else {
 				$new_all_goods[] = $onegood;
			}
		}
		//var_dump($new_all_goods);

		return $new_all_goods;
  }


		public function showgood()
	{	
		if (isset($_GET['id']))  {
				$this->idGood= trim (htmlspecialchars(strip_tags($_GET['id'])));
				$this->query="SELECT  `idGood`, `name`, `nameLink`, `price`, `oldPrice`, `endingGood`, `description`, `mediaLinkVideo`, `mediaLinkDemo`, `topSales`, `promo`,`imgGood`,`raiting` FROM `GOODS` where `idGood`='$this->idGood'";
				$dbRes=$this->db->getQueryResutlInArray($this->query);
				// var_dump($dbRes[0]);
				if ($dbRes[0]) {
					return $dbRes[0];
				} else {
					return null;
				}
		} else {
			return null;
		}	
	}


}
?>