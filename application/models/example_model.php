<?php

class Example_model extends Model {
	
	public function getVenues($id)
	{
		$id = $this->escapeString($id);
		$result = $this->query('SELECT * FROM venues WHERE id <"'. $id .'"');
		return $result;
	}

}

?>
