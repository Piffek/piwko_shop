            
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
            </div>
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i>Dodat zadanie</button>
            </div>
          </div>
{{ $todolist->links() }}



