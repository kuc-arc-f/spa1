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
        return view('employees/index')->with('employees', $employees );
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
        $employee->fill($request->all());
        $employee->save();
//exit();
        return redirect()->route('employees.index');
    }
}
