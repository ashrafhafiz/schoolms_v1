<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function StudentYearView()
    {
        $data['years'] = StudentYear::all();
        return view('backend.setup.student.year.index', $data);
    }

    public function StudentYearCreate()
    {
        return view('backend.setup.student.year.create');
    }

    public function StudentYearStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_years,name'
        ]);

        StudentYear::create(['name' => $request->name]);

        $notification = array('message' => 'Class created successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.year.view')->with($notification);
    }

    public function StudentYearEdit($id)
    {
        $student_year = StudentYear::findOrFail($id);
        return view('backend.setup.student.year.edit', compact('student_year'));
    }

    public function StudentYearUpdate(Request $request, $id)
    {
        $student_year = StudentYear::findOrFail($id);

        if (!($request->name == $student_year->name)) {
            $request->validate([
                'name' => 'required|unique:student_years,name'
            ]);

            $student_year->name = $request->name;
            $student_year->save();
        }

        $notification = array('message' => 'Class updated successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.year.view')->with($notification);
    }

    public function StudentYearDelete($id)
    {
        StudentYear::destroy($id);

        $notification = array('message' => 'Class delete successfully!', 'alert-type' => 'info');
        return redirect()->route('setup.student.year.view')->with($notification);
    }
}
