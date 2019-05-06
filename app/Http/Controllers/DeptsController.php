<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dept;
use App\Http\Requests;
use App\Libs\mylibs;
//
class DeptsController extends Controller
{
    public function index()
    {
//        $depts = Dept::orderBy('updated_at', 'desc')->get();
        $depts = Dept::orderBy('id', 'desc')->get();
        $dat = array();
        foreach ($depts as $dept ){
            $item = $dept;
            $item["employees"] = $dept->employees;
            $dat[] = $item;
        }
        return response()->json($dat);
    }
    //
    public function create()
    {
        return view('depts/create')->with('dept', new Dept());
    }
    //
    public function store(Request $request )
    {
        $dept = new Dept();
        $dept->name   = request('name');
        $dept->save();
        return ['name' => request('name')];
    }
    //
    public function show($id ){
        $dept = Dept::find($id);
        $dept["employees"] = $dept->employees;
        return $dept;
    }
    //
    public function edit($id ){
        $dept = Dept::find($id);
        $dept["employees"] = $dept->employees;
        return $dept;
    }
    //
    public function update($id ){
        $dept = Dept::find($id);
        $dept->name   = request('name');
        $dept->save();
        return ['name' => request('name')];
    }    
    //
    public function destroy($id ){
        $dept = Dept::find($id);
        $dept->delete();
        return ['ret'=>"1"  ];
    }

    public function test()
    {
        $arr = array('d1'=> 1,
		'd2'=> 2
        );
        $depts = Dept::orderBy('updated_at', 'desc')->get();
//var_dump( $depts );
        foreach($depts as $dept )
        {
            foreach($dept->employees as $employee ){
                echo "&nbsp; emp-name=". $employee->name."<br />";
            }
        }
        exit();
    }


}
