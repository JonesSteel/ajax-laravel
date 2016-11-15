<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::all();
        return view('crud.index')->with('data',$data);
    }

    /**
     * Add student data
     */
    public function add(Request $request)
    {
        $data = new Student;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->save();
        return back()
            ->with('success','Record Added successfully!');
    }

    /**
     * View data
     */
    public function view(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $info = Student::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /**
     * Update data
     */
    public function update(Request $request)
    {
        $id = $request->edit_id;
        $data = Student::find($id);
        $data->first_name = $request->edit_first_name;
        $data->last_name = $request->edit_last_name;
        $data->email = $request->edit_email;
        $data->save();
        return back()
            ->with('success','Record updated successfully!');
    }

    /**
     * Delete record
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Student::find($id);
        $response = $data->delete();
        if ($response)
            echo "Record deleted successfully!";
        else
            echo "There was a problem. Please try again later!";
    }
}
