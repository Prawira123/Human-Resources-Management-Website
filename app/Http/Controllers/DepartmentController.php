<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create(){
        return view('departments.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Department::create([
            'name' =>$request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('departments.index')->with('success', 'Task created successfully');
    }

    public function destroy($id){

        $department = Department::find($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Task deleted successfully');
    }

    public function edit($id){

        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $department = Department::findOrFail($id);
        $department->update([
            'name' =>$request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('departments.index')->with('success', 'Task updated successfully');
    }

    public function departmentStatus($id){

        $department = Department::findOrFail($id);

        if($department->status == 'Active'){
            $department->status = 'Innactive';
            $department->save();
        }else{
            $department->status = 'Active';
            $department->save();
        }

        return redirect()->route('departments.index')->with('success', 'Task status updated successfully');
    }

    
}
