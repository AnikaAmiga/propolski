<?php

class Controller_Goods extends Controller
{

	function __construct($db)
	{
		parent::__construct($db);
		$this->model = new Model_Goods($db);		
	}

	function action_index()
	{	
		$goods=$this->model->getAllGoods();
		$this->view->generate('goods_view.php', 'template_view.php',$goods);
	}

		function action_showgood()
	{	
		if (isset($_GET['id'])) {
			$good=$this->model->showgood();
			$this->view->generate('good_view.php', 'template_view.php', $good);
			die();		
		}else {
			$goods=$this->model->getAllGoods();
			$this->view->generate('goods_view.php', 'template_view.php',$goods);
			die();
		}
						

	}


}