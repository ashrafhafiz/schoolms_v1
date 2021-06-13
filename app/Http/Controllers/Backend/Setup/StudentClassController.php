<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function StudentClassView()
    {
        $data['classes'] = StudentClass::all();
        return view('backend.setup.student.class.index', $data);
    }

    public function StudentClassCreate()
    {
        return view('backend.setup.student.class.create');
    }

    public function StudentClassStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_classes'
        ]);

        StudentClass::create(['name' => $request->name]);

        $notification = array('message' => 'Class created successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.class.view')->with($notification);
    }

    public function StudentClassEdit($id)
    {
        $student_class = StudentClass::findOrFail($id);
        return view('backend.setup.student.class.edit', compact('student_class'));
    }

    public function StudentClassUpdate(Request $request, $id)
    {
        $student_class = StudentClass::findOrFail($id);

        if (!($request->name == $student_class->name)) {
            $request->validate([
                'name' => 'required|unique:student_classes'
            ]);

            $student_class->name = $request->name;
            $student_class->save();
        }

        $notification = array('message' => 'Class updated successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.class.view')->with($notification);
    }

    public function StudentClassDelete($id)
    {
        StudentClass::destroy($id);

        $notification = array('message' => 'Class delete successfully!', 'alert-type' => 'info');
        return redirect()->route('setup.student.class.view')->with($notification);
    }
}
