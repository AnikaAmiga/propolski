<?php

class Controller_Books extends Controller
{

	function action_index()
	{	
		$this->view->generate('books_view.php', 'template_view.php');
	}
}