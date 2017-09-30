<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListCreatRequest;
use App\TodoList;
use Auth;
use Illuminate\Http\Request;

class TodoListController extends Controller
{

    public function __construct()
    {
        // check if session expired for ajax request
        $this->middleware('ajax-session-expired');
        // check if user is autenticated for non-ajax request
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $todolists = $user->todolists()->orderBy('updated_at','desc')->get();
        return view('todolists.index', compact('todolists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $todolist = new TodoList();
        return view('todolists.form', compact('todolist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \app\Http\Requests\TodoListCreatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoListCreatRequest $request)
    {
        //
        $input = $request->all();
        $todolist = Auth::user()->todolists()->create($input);
        return view('todolists.item', compact('todolist'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $todolists = Auth::user()->todolists()->findOrFail($id);

        $tasks = $todolists->tasks()->orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('todolists','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $todolist = Auth::user()->todolists()->findOrFail($id);
        return view('todolists.form', compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoListCreatRequest $request, $id)
    {
        //
        $todolist = Auth::user()->todolists()->findOrFail($id);
        $todolist->update($request->all());
        return view('todolists.item', compact('todolist'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todolist = Auth::user()->todolists()->findOrFail($id);
        $todolist->delete();
        return $todolist;
    }
}
