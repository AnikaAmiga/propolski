<?php

class Controller_Categories extends Controller
{

	function __construct($db)
	{
		$this->model = new Model_Categories($db);
		$this->view = new View();
	
	
	}
	
	function action_index()
	{
		$data = $this->model->getAllCategories();
		$this->view->generate('categories_view.php', 'template_view.php', $data);
	}

		function action_edit()
	{	
		// $dataArr["data"]=$this->db->getQueryResutlInArray($query);
		// $result=array_merge($result, $dataArr);  getMenu4Categories
		$menu["menu"]=$this->model->getMenu4Categories();
		$categories["categories"] = $this->model->getAllCategories();
		$data=[];		
		if (isset($_GET['id'])) { //отображение формы для изменения существующего
			$data=$this->model->getData4editCategories();			
		} elseif ($_POST['name']) {//запись результата о редактировании
			$data=$this->model->editCategories();
			$data=array_merge($data, $menu); 
			
		}//else { // отображение формы для нового товара}	
		// var_dump($data);
		// echo "<br>";
		// var_dump($menu);
		$data=array_merge($data, $menu); 
		$data=array_merge($data, $categories);
		// echo "<br>";
		// var_dump($data);
		$this->view->generate('edit_categories_view.php', 'template_view.php', $data);
		die();
	}
}




