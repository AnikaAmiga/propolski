<?php

class Controller {
	// тут в конструкторе можем проверять куку запомнить меня
	
	public $model;
	public $view;
	public $db;
	public $config;
	public $menu;

	function __construct()
	{
		global $config;

		$menu=$this->model->get_menu();	

		$this->view = new View($menu);
		$this->config=$config;

	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
}
