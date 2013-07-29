<?php

class Main extends Controller {
	
	function index()
	{		
		

		$todo_model   = $this->loadModel('Todo_model');
		$data = $this->post();

		$group_id = 1;

		if ($data) 
		{	

			if ($data['group'])
			{
				$group = $data['group'];
				$ze_group = $todo_model->insertTodoGroup($group);
				$this->redirect("group/id/" . $ze_group);

			}

		}
		else {
			$this->redirect("group/id/" . $group_id);
		}


		
	}
    
}

?>
