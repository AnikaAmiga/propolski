<?php

class Controller_Video extends Controller
{

	function action_index()
	{	
		$this->view->generate('video_view.php', 'template_view.php');
	}
}