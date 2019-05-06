<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dept;
use App\Http\Requests;
use App\Libs\mylibs;
//
class DeptsController extends Controller
{
    //
    public function index()
    {
        $depts = Dept::orderBy('updated_at', 'desc')->get();
        return view('depts/index')->with('depts', $depts );
    }

    public function api_index()
    {
        $depts = Dept::orderBy('updated_at', 'desc')->get();
        return response()->json($depts);
        exit();
    }

    public function create()
    {
        return view('depts/create')->with('dept', new Dept());
    }
    //
    public function store(Request $request )
    {
        $dept = new Dept();
        $dept->fill($request->all());
        $dept->save();
        return redirect()->route('depts.index');
    }
    //
    public function test()
    {
        $arr = array('d1'=> 1,
		'd2'=> 2
        );
//        $lib = new mylibs();
//$lib->arr_dump($arr );
//exit();
        $depts = Dept::orderBy('updated_at', 'desc')->get();
//var_dump( $depts );
        foreach($depts as $dept )
        {
            foreach($dept->employees as $employee ){
                echo "&nbsp; emp-name=". $employee->name."<br />";
            }
/*
            echo("#dept= " . $dept->name . "<br />");
            $employees = $dept->employees;
            foreach($employees as $employee)
            {
                echo "&nbsp; emp-name=". $employee->name."<br />";
            }            
*/    
        }
exit();
    }


}
