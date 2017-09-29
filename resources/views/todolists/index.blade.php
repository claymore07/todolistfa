@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php $count = $todolists->count(); ?>
                <div class="alert alert-warning {{ $count? 'hidden': '' }}" id="no-record-alert">
                    لیستی برای نمایش وجود ندارد.
                </div>
                <div class="alert alert-success" id="update-alert" style="display: none">

                </div>
                <div class="panel panel-default  {{ !$count? 'hidden':'' }}">
                    <div class="list-group">
                        <ul id="todo-list">
                            @foreach($todolists as $todolist)
                                @include('todolists.item', compact('$todolist'))
                            @endforeach


                        </ul>
                        <div class="panel-footer">
                            <small><span id="todo-list-counter">{{$count}}</span>  وظیفه</small>
                        </div>
                    </div>
                </div>
            </div>
            @include('todolists.todolistmodal')
            @include('todolists.tasksmodal')
            @include('todolists.confirmmodal')
        </div>
    </div>

@endsection