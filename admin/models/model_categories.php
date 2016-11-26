<?php

class Model_Categories extends Model
{
	protected $categoriesCl;
	public function __construct ($db){
		parent::__construct($db);
		$this->categoriesCl= new Categories($db);
	}
	
	public function getAllCategories()
	{			
		return $this->categoriesCl->getAllCategories();
	}
                                                       
		public function getData4editCategories()
	{	
		if (isset($_GET['id']))  {
				$id= trim (htmlspecialchars(strip_tags($_GET['id'])));
				return  $this->categoriesCl->getCategorуById($id);
		} else {
			return null;
		}	
	}


		public function editCategories()
	{	

		$this->name = trim(htmlspecialchars(strip_tags($_POST['name'])));
		$this->nameLink = trim(htmlspecialchars(strip_tags($_POST['nameLink'])));
		$this->price = (integer) trim(htmlspecialchars(strip_tags($_POST['price'])));
		$this->oldPrice = (integer) trim(htmlspecialchars(strip_tags($_POST['oldPrice'])));
		$this->endingGood =   (isset ($_POST['endingGood'])) ? 1 :0 ;		
		$this->description = trim(htmlspecialchars(strip_tags($_POST['description'])));
		$this->mediaLinkVideo = trim(htmlspecialchars(strip_tags($_POST['mediaLinkVideo'])));
		$this->mediaLinkDemo = trim(htmlspecialchars(strip_tags($_POST['mediaLinkDemo'])));
		$this->topSales =   (isset ($_POST['topSales'])) ? 1 :0 ;
		$this->promo =   (isset ($_POST['promo'])) ? 1 :0 ;



	}

	public function getMenu4Categories()
	{			
		$menuCl= new Menu($this->db);
		// $menu["menu"]= $menuCl->getMenu();
		return $menuCl->getMenu();
	}
}

