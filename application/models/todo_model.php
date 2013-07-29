<?php

class Todo_model extends Model {
	
	public function getTodos($group_id = false)
	{

		$group_id = $this->escapeString($group_id);

		$query = "SELECT * FROM items  ";
			if ($group_id)
				$query .= " WHERE group_id = $group_id";

		$query .= " order by status asc, date_added asc";
		$result = $this->query($query);
		return $result;
	}

	public function getTodoGroups()
	{
		$query = "select g.id, g.group_name, count(i.group_id) as the_count
			from
			groups g
			left join items i
			on g.id = i.group_id
			group by i.group_id
			order by id
			";
		$result = $this->query($query);
		return $result;
	}


	public function insertTodo($text, $group_id)
	{

		$todo_text = $this->escapeString($text);
		$group_id = $this->escapeString($group_id);

		if ($todo_text != '')
		{
			$query = "INSERT INTO items (text, group_id) values ('$todo_text', $group_id)";
			$result = $this->execute($query);
			return $result;
		}
		else {
			return false;
		}
	}

	public function insertTodoGroup($text)
	{

		$todo_group = $this->escapeString($text);

		if ($todo_group != '')
		{
			$query 	= "INSERT INTO groups (group_name) values ('$todo_group')";
			$result = $this->execute($query);
			$id 	= mysql_insert_id();
			return $id;
		}
		else {
			return false;
		}
	}

	public function updateTodo($id, $status)
	{

		$id = $this->escapeString($id);
		$status = $this->escapeString($status);

		if ($id != '')
		{
			$query = "UPDATE items set status = $status where id = $id";
			$result = $this->execute($query);
			return $result;
		}
		else {
			return false;
		}
	}

	

}

?>
