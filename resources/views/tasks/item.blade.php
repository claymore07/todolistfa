<tr class="task-item" id="task-{{$task->id}}">
    <td style="width: 50px; vertical-align: middle">
        <input type="checkbox"
               data-url="{{route('todolists.tasks.update', [$task->todolist->id, $task->id])}}"
               {{ !$task->completed_at? : 'checked=true' }}
               class="check-item"></td>
    <td  class="task-item-title {{ !$task->completed_at? : 'done' }}">
        {{ $task->title }}
        <div class="row-buttons">
            <a href="{{route('todolists.tasks.destroy',[$task->todolist->id, $task->id])}}" class="btn btn-xs btn-danger remove-task-btn"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </td>

</tr>