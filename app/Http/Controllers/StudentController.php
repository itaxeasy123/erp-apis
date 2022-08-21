<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $students = Student::all();
            return response()->json($students);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
            ]);
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // create a new student
            $student = new Student;
            $student->first_name =  $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->class = $request->class;
            $student->section = $request->section;
            $student->roll_no = $request->roll_no;
            $student->image = $request->image;
            $student->save();
            return response()->json(['message' => 'Student created successfully!'])->setStatusCode(201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // view single student 
            $student = Student::find($id);
            return response()->json($student);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
            ]);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // update single student 
            $student = Student::find($id);
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->class = $request->class;
            $student->section = $request->section;
            $student->roll_no = $request->roll_no;
            $student->image = $request->image;
            $student->save();
            return response()->json(['message' => 'Student updated successfully!'])->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // delete student
            $student = Student::find($id);
            $student->delete();
            return response()->json(['message' => 'Student deleted successfully!'])->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
            ]);
        }
    }
}
