<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(){

        $tasks = Task::with('employee')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create(){

        $employees = Employee::all();
        $tasks = Task::with('employee')->get();

        return view('tasks.create', compact('employees', 'tasks'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
            'assigned_to' => 'required',
            'description' => 'required|string',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Task::create([
            'title' =>$request->title,
            'due_date' => $request->due_date,
            'assigned_to' => $request->assigned_to,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return $this->index()->with('success', 'Task created successfully');
    }

    public function destroy($id){

        $task = Task::find($id);
        $task->delete();

        return $this->index()->with('success', 'Task deleted successfully');
    }

    public function edit($id){

        $employees = Employee::all();
        $task = Task::findOrFail($id)->with('employee')->first();

        return view('tasks.edit', compact('employees', 'task'));
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
            'assigned_to' => 'required',
            'description' => 'required|string',
            'status' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'due_date' => $request->due_date,
            'assigned_to' => $request->assigned_to,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return $this->index()->with('success', 'Task updated successfully');
    }

    public function taskStatus($id){

        $task = Task::findOrFail($id);

        if($task->status == 'Pending'){
            $task->status = 'Done';
            $task->save();
        }else{
            $task->status = 'Pending';
            $task->save();
        }

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully');
    }


}
