<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected static $priorityLabels = [
        0 => 'Very Low',
        1 => 'Low',
        2 => 'Medium',
        3 => 'High',
        4 => 'Very High',
        5 => 'Urgent'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('isCompleted', 'asc')
            ->orderBy('priority', 'desc')
            ->orderBy('due', 'asc')
            ->paginate(15);
        return view('todos.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['string', 'required'],
            'detail' => 'nullable|string',
            'due' => 'nullable|date',
            'scheduled' => 'nullable|date',
            'priority' => ['integer', 'required']
        ]);
        $data['user_id'] = $request->user()->id;
        $data['isCompleted'] = false;

        $todo = Todo::create($data);
        return to_route('todos.show', ['todo' => $todo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if ($todo->user_id != request()->user()->id) {
            return to_route('todos.index');
        }
        return view('todos.show', ['todo' => $todo, 'priorityLabels' => self::$priorityLabels]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        if ($todo->user_id != request()->user()->id) {
            return to_route('todos.index');
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        if ($todo->user_id != request()->user()->id) {
            return to_route('todos.index');
        }
        $data = $request->validate([
            'title' => ['string', 'required'],
            'detail' => 'nullable|string',
            'due' => 'nullable|date',
            'scheduled' => 'nullable|date',
            'priority' => ['integer', 'required']
        ]);

        $todo->update($data);
        return to_route('todos.show', ['todo' => $todo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if ($todo->user_id != request()->user()->id) {
            return to_route('todos.index');
        }
        $todo->delete();
        return to_route('todos.index');
    }

    public function complete(Todo $todo)
    {
        if ($todo->user_id != request()->user()->id) {
            return to_route('todos.index');
        }
        $todo->update(['isCompleted' => true]);
        return redirect()->back();
    }

    public function uncomplete(Todo $todo)
    {
        if ($todo->user_id != request()->user()->id) {
            return to_route('todos.index');
        }
        $todo->update(['isCompleted' => false]);
        return redirect()->back();
    }
}
