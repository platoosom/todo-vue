<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TodoCreateRequest;
use App\Http\Requests\TodoUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TodoDestroyRequest;
use App\Mail\TaskMail;

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
        $todo->duedate = $request->duedate;
        $todo->duetime = $request->duetime;
        $todo->reminder = ($request->reminderdate)? $request->reminderdate:null;
        $todo->remindertime = ($request->remindertime)? $request->remindertime:null;
        $todo->priority = $request->priority;
        $todo->detail = $request->detail;
        $todo->save();

        /**
         $user = User::where('id', $request->assignto)->first();
         Mail::to($user->email)->send(new TaskMail($todo));
         */

        return Redirect::route('dashboard');
    }


    public function update(TodoUpdateRequest $request)
    {
        $todo = Todo::find($request->id);

        if(Auth()->user()->usertype != 'admin' && $todo->owner != Auth()->user()->id && $todo->assignto != Auth()->user()->id){
            return Redirect::route('dashboard');
        }

        $oldAssignTo = $todo->assignto;

        $todo->tasktype = $request->tasktype;
        $todo->company = $request->company;
        $todo->contact = $request->contact;
        $todo->subject = $request->subject;
        $todo->assignto = $request->assignto;
        $todo->duedate = $request->duedate;
        $todo->duetime = $request->duetime;
        $todo->reminder = $request->reminder;
        $todo->remindertime = $request->remindertime;
        $todo->priority = $request->priority;
        $todo->detail = $request->detail;

        $todo->save();

        /**
        if($oldAssignTo != $request->assignto){
            $user = User::find($request->assignto);
            Mail::to($user->email)->send(new TaskMail($todo));
        }
        if($todo->tasktype == 'done'){
            $users = User::where('usertype', '=', 'admin')->get();
            foreach($users as $user ){
                Mail::to($user->email)->send(new TaskMail($todo));
            }
        }
        */

        return Redirect::route('dashboard');
    }


    public function destroy(TodoDestroyRequest $request)
    {
       Todo::destroy($request->id);
       return Redirect::route('dashboard');
    }
}
