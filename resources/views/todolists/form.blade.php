<div class="alert alert-success" id="add-new-alert" style="display: none">

</div>

{!! Form::model($todolist,[
                'method'=> $todolist->exists ? 'PUT':'POST',
                'action'=> $todolist->exists ? ['TodoListController@update',$todolist->id ]:'TodoListController@store'
                ])!!}
<div class="form-group">
    <label for="title" class="control-label">عنوان لیست وظیفه : </label>
    {!! Form::text('title', null,['class'=>'form-control', 'id'=>'title']) !!}
    {!! Form::hidden('id') !!}
</div>
<div class="form-group">
    <label for="description" class="control-label">توضیحات : </label>
    {!! Form::textarea('description',null,['class'=>'form-control', 'id'=>'description','rows'=>2]) !!}

</div>
{!! Form::token() !!}
{!! Form::close() !!}