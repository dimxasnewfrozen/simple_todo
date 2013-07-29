var base_url 		= "http://localhost/todo/";

$( document ).ready(function() {

	$(".todo").click(function() {

		var selection = $(this);
		var todo_id = $(this).attr("id");

		var status = $(this).is(':checked');
		if (status)
		{
			status = 1;
			selection.parent().parent().addClass("inactive");
		}
		else
		{
			status = 0;
			selection.parent().parent().removeClass("inactive");
		}
			

		$.ajax({
			  url: base_url + "application/ajax.php?todo_id=" + todo_id + "&status=" + status,
			  async: true
			}).done(function(data) {
			});

		

	});


});