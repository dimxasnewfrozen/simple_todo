<?php

class Group extends Controller {

	function id($id)
	{

		$todo_model   = $this->loadModel('Todo_model');
		$data = $this->post();

		if ($data) 
		{	

			if (isset($data['group']))
			{
				$group = $data['group'];
				$ze_group = $todo_model->insertTodoGroup($group);
				$this->redirect("group/id/" . $ze_group);

			}
			else {
				$text = $data['todo'];
				$todo_model->insertTodo($text, $id);
			}
		}

		$todos = $todo_model->getTodos($id);
		$groups = $todo_model->getTodoGroups();

		$template = $this->loadView('main_view');
		$template->set('todos', $todos);
		$template->set('groups', $groups);
		$template->set('group_id', $id);
		$template->render();

	}
}

?>
