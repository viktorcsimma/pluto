<?php

namespace App\Http\Controllers;

use Date;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(bool $withMessage=false)
    {
        //$todos=Todo::where('completed', 0)->orderByDesc('expiration_date')->get();
        $todos=auth()->user()->todos_assigned()->where('completed', 0)->orderByDesc('expiration_date')->get();
        //TODO: ordering correctly

        $completed_count=auth()->user()->todos_assigned()->where('completed', 1)->count();
        $expired_count=auth()->user()->todos_assigned()->where('expiration_date', '<', now())->count();

        if ($withMessage)
        {
          return view('todos.index', ['todos' => $todos,
                    'completed_count' => $completed_count, 'expired_count' => $expired_count])
                    ->with('message', __('todo.created'));
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
        //areturn response()->json($request);
        Validator::make($request->all(), [
          'name' => 'required|max:255',
          'description' => 'nullable'
        ])->validate();
        //ide nem jut el, ha vmi nem jo

        $todo=Todo::create([
          'name' => $request->name,
          'user_id' => auth()->user()->id,
          'description' => $request->description,
        ]);
        $todo->users_assigned()->attach(auth()->user()->id);

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
        if (auth()->user()->cannot('update', $post)) {
            abort(403);
        }
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
    public function assign(Request $r)
    {

        Validator::make($r->all(), [
          'user_name'=>'exists:users,name',
          'todo_id'=>'exists:todos,id',
        ])->validate();
        $todo=Todo::where('id',$r->todo_id)->first();
        if (auth()->user()->cannot('update', $todo)) {
            abort(403);
        }
        $assigned_user=User::where('name',$r->user_name)->first();
        $todo->users_assigned()->attach($assigned_user->id);
        return back()->with('message', 'Successfully assigned');
    }

    public function update(Request $request, Todo $todo)
    {

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
