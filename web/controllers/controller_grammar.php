<?php

class Controller_Grammar extends Controller
{

	function action_index()
	{	
		$this->view->generate('grammar_view.php', 'template_view.php');
	}
}