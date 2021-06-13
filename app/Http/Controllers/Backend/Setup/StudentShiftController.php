<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function StudentShiftView()
    {
        $data['shifts'] = StudentShift::all();
        return view('backend.setup.student.shift.index', $data);
    }

    public function StudentShiftCreate()
    {
        return view('backend.setup.student.shift.create');
    }

    public function StudentShiftStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);

        StudentShift::create(['name' => $request->name]);

        $notification = array('message' => 'Class created successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id)
    {
        $student_shift = StudentShift::findOrFail($id);
        return view('backend.setup.student.shift.edit', compact('student_shift'));
    }

    public function StudentShiftUpdate(Request $request, $id)
    {
        $student_shift = StudentShift::findOrFail($id);

        if (!($request->name == $student_shift->name)) {
            $request->validate([
                'name' => 'required|unique:student_shifts,name'
            ]);

            $student_shift->name = $request->name;
            $student_shift->save();
        }

        $notification = array('message' => 'Class updated successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id)
    {
        StudentShift::destroy($id);

        $notification = array('message' => 'Class delete successfully!', 'alert-type' => 'info');
        return redirect()->route('setup.student.shift.view')->with($notification);
    }
}
