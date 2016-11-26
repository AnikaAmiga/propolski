<?php

class Controller_Travels extends Controller
{

	function action_index()
	{	
		$this->view->generate('travels_view.php', 'template_view.php');
	}
}