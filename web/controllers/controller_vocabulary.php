<?php

class Controller_Vocabulary extends Controller
{

	function action_index()
	{	
		$this->view->generate('vocabulary_view.php', 'template_view.php');
	}
}