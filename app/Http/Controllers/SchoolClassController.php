<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Models\SchoolClassTeacher;
use App\Models\Teacher;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolClasses = SchoolClass::all();
        return view('schoolClass.index', ['schoolClasses' => $schoolClasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolClass.create');
    }

    public function add(SchoolClass $schoolClass, Request $request){
        $schoolClass->teachers()->attach($request->teacher);
        return redirect()->route('schoolClass.show',['schoolClass'=>$schoolClass]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schoolClass = new SchoolClass();
        $schoolClass->grade = $request->grade;
        $schoolClass->letter = $request->letter;
        $schoolClass->save();
        return redirect()->route('schoolClass.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        // $teachers = Teacher::all();
      

        $id = $schoolClass->id;

    //    dd( Teacher::where('id','=','1')->toSql() );

      $teachers = Teacher::with('classes')->whereDoesntHave('classes', function($query) use ($id) {
        $query->where('school_class_id', $id);
        })->get()/*->toSql()*/;





       return view('schoolClass.show',['schoolClass' =>$schoolClass,'teachers'=>$teachers ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolClass $schoolClass)
    {
        $schoolClass->teachers->attatch(3);
        return view('schoolClass.edit', ['schoolClass' => $schoolClass]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        $schoolClass->grade = $request->grade;
        $schoolClass->letter = $request->letter;
        $schoolClass->save();
        return redirect()->route('schoolClass.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass)
    {
        $schoolClass->delete();
        return redirect()->route('schoolClass.index');
    }
}
