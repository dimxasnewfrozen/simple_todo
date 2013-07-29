<?php 
include('header.php');
?>


<div class="container-fluid">

  <div class="row-fluid">

    <div class="span3" style="margin-top:20px; border:1px solid #ADADAD; background-color:white; padding:10px;">
       <form class="form-inline" method="post" action="/todo/" >
       		<input type='text' name="group">
			<input type='submit' class="btn btn-success" value="Add Group"   />
		</form>

		<ul class="groups">
		<?php
		foreach ($groups as $group) 
		{
			$class = "";
			if ($group->id == $group_id)
			{
				$class = "class='selected'";
			}
			
			echo "<li " . $class . "><a href='/todo/group/id/" .  $group->id . "'>" . $group->group_name . "
				<span class='badge badge-info' style='margin-left:5px; float:right;'>" . $group->the_count . "</span></a></li>";
			
			
		}

		?>

		</ul>
	</div>

    <div class="span9" style="margin-top:20px; border:1px solid #ADADAD; background-color:white; padding:10px;">

    <form class="form-inline" method="post" action="/todo/group/id/<?php echo $group_id; ?>" >
    	<input type="hidden" name="group_id" value="<?php echo $group_id; ?>" />
		<textarea style="width:98%; margin-bottom:10px;" name="todo" placeholder="Enter todo text..." ></textarea> <br/>
		<input type='submit' class="btn btn-success" value="Add"   />
	</form>

	<div class="todos" >

		<?php
			
			if (!$todos) {
				echo "No todos!";
			}
			else 
			{
				?>
				<ul class="items">
					<?php
					foreach ($todos as $todo) 
					{

						$inactive = "";
						$checked = "";
						if ($todo->status == 1)
						{
							$inactive = "class='inactive'";
							$checked = "checked=''";
						}

						$date = new DateTime($todo->date_added);

						echo "<li " . $inactive . "><label>
							<input type='checkbox' class='todo' style='margin:0px;' id='" . $todo->id . "'" . $checked . "/>
							 " . $todo->text . "
							 <span class='date pull-right' >" . date_format($date , 'M d, Y') . "</span>
							 </label>
							</li>";
					}
					?>
				</ul>
				<?php
			}

		?>
	</div>
    </div>
  </div>
</div>

