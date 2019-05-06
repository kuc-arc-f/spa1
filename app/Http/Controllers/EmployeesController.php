<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Http\Requests;
//
class EmployeesController extends Controller
{
    //
    //
    public function index()
    {
        $employees = Employee::orderBy('updated_at', 'desc')->get();
        $dat = array();
        foreach ($employees as $employee ){
            $item = $employee;
            $item["dept_name"] = $employee->dept->name;
            $dat[] = $item;
//            var_dump($employee->dept->name );
        }
        return view('employees/index')->with('employees', $dat );
    }
    //
    //
    public function create()
    {
//var_dump('#create');
        return view('employees/create')->with('employee', new Employee());
    }

    public function store(Request $request )
    {
//var_dump($request->all() );
//exit();
        $employee = new Employee();
        $employee->name   = request('name');
        $employee->dept_id = request('dept_id');
//        $employee->fill($request->all());
        $employee->save();
//exit();
        return ['name' => request('name')];
//        return redirect()->route('employees.index');
    }
}
