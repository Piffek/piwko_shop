$(document).ready(function(){	
$.ajaxSetup({
		headers:
		{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		
	});
		$("#submitDo").click(function(){
			var textWhen = $("#textWhen").val();
			var textWhat = $("#textWhat").val();
			var id_user = $("#id_user").val();
			var dataString = 'when='+ textWhen + '&what='+ textWhat + '&id_user='+ id_user;

				$.ajax({
				type: "POST",
				url: url,
				data: dataString,
				success: function(result){
				$('.todo-list').load(location.href + ' .todo-list');
			}
			});
				
		});
});