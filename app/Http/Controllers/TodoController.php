<?php

namespace App\Http\Controllers;

use Date;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(bool $withMessage=false)
    {
        $todos=Todo::where('completed', 0)->orderByDesc('expiration_date')->get();
        //TODO: ordering correctly

        $completed_count=Todo::where('completed', 1)->count();
        $expired_count=Todo::where('expiration_date', '<', now())->count();

        if ($withMessage)
        {
          return view('todos.index', ['todos' => $todos,
                    'completed_count' => $completed_count, 'expired_count' => $expired_count])
                    ->with('message', 'Reminder created successfully.');
        }

        return view('todos.index', ['todos' => $todos,
                  'completed_count' => $completed_count, 'expired_count' => $expired_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo=Todo::create($request->all());

        return TodoController::index($withMessage=true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.index', ['todos' => [$todo]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {

    }

    public function setCompleted(Request $r)
    {
        $updated=Todo::where('id',$r->id)->update(['completed' => 1]);
        return TodoController::index();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
