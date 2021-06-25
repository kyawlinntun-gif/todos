<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodosController extends Controller
{
    /**
     * Give all data from todos table
     *
     * @return void
     */
    public function index()
    {
        $todos = Todo::all();

        return view('todos', [
            'todos' => $todos
        ]);
    }

    /**
     * Store the data to todos table
     *
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        Todo::create(['todo' => $request->todo]);

        Session::flash('success', 'Your todo was created.');

        return redirect()->back();
    }

    /**
     * Give only one todo result
     *
     * @param Todo $todo
     * @return void
     */
    public function edit(Todo $todo)
    {
        return view('update', [
            'todo' => $todo
        ]);
    }

    /**
     * Update $todo from todos table
     *
     * @param Todo $todo
     * @param Request $request
     * @return void
     */
    public function update(Todo $todo, Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $todo->update([
            'todo' => $request->todo
        ]);

        Session::flash('success', 'Your todo was updated.');

        return redirect(url('/todos'));
    }

    public function completed(Todo $todo, Request $request)
    {
        $todo->update([
            'completed' => 1
        ]);

        Session::flash('success', 'Your todo was marked as completed.');

        return redirect(url('/todos'));
    }

    /**
     * Delete $todo from todos table
     *
     * @param Todo $todo
     * @return void
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        Session::flash('success', 'Your todo was deleted.');
        
        return redirect()->back();
    }
}
