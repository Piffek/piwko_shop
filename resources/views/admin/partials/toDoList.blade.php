            
<div class="box-body">
	<ul class="todo-list">
		@foreach($todolist as $task)
	    	<li>
				<span class="handle">
					<i class="fa fa-ellipsis-v"></i>
                       <i class="fa fa-ellipsis-v"></i>
                </span>
                <input type="checkbox" value="">
                <span class="text">{{$task->what}}</span> 
                <small class="label label-danger"><i class="fa fa-clock-o"></i>Pozostało: </small>
                <div class="tools">
                  <i class="fa fa-edit"></i>
                  <i class="fa fa-trash-o"></i>
                </div>
             </li>  
		@endforeach
</ul>
            <div class="box-footer clearfix no-border">
              <button id="addTask" type="button" class="btn btn-default pull-right" onclick="showToDoField()"><i class="fa fa-plus"></i>Dodaj zadanie</button>
            </div>
              
	              <div class="col-sm-12 col-md-12">
			          <form id="hiddenDo">
			            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			          	<label>Wykonane do </label><br><input id="textWhen" type="text" name="when"></input><br>
			      		<label>Zadanie </label><br><textarea id="textWhat"  name="what"></textarea><br>
			      		<input type="hidden" value="{{Auth::user()->id }}" id="id_user" name="id_user"></input>
			          <input type="button" id="submitDo" name="submitDo" onclick="addListToDb()" value="wyslij">
			          </form>
		       	</div>
        
{{ $todolist->links() }}
</div>


