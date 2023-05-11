<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Requests\TodoUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TodoDestroyRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Todo/Index', [
            'todoes' => Todo::all(),
        ]);
    }


    public function create(TodoCreateRequest $request)
    {
        $todo = new Todo();
        $todo->tasktype = $request->tasktype;
        $todo->company = $request->company;
        $todo->contact = $request->contact;
        $todo->subject = $request->subject;
        $todo->owner = Auth()->user()->id;
        $todo->assignto = $request->assignto;
        $todo->duedate = $request->duedate.' '.$request->duetime;
        $todo->reminder = ($request->reminderdate)?$request->reminderdate.' '.$request->remindertime:null;
        $todo->priority = $request->priority;
        $todo->detail = $request->detail;
        $todo->save();

        return Redirect::route('dashboard');
    }


    public function update(TodoUpdateRequest $request)
    {
        $todo = Todo::find($request->id);

        $todo->tasktype = $request->tasktype;
        $todo->company = $request->company;
        $todo->contact = $request->contact;
        $todo->subject = $request->subject;
        $todo->assignto = $request->assignto;
        $todo->duedate = $request->duedate;
        $todo->reminder = $request->reminder;
        $todo->priority = $request->priority;
        $todo->detail = $request->detail;

        $todo->save();

        return $request->id;
    }


    public function destroy(TodoDestroyRequest $request)
    {
       Todo::destroy($request->id);
       return Redirect::route('dashboard');
    }
}
