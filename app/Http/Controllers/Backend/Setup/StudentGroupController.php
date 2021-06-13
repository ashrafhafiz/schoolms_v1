<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function StudentGroupView()
    {
        $data['groups'] = StudentGroup::all();
        return view('backend.setup.student.group.index', $data);
    }

    public function StudentGroupCreate()
    {
        return view('backend.setup.student.group.create');
    }

    public function StudentGroupStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name'
        ]);

        StudentGroup::create(['name' => $request->name]);

        $notification = array('message' => 'Class created successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $student_group = StudentGroup::findOrFail($id);
        return view('backend.setup.student.group.edit', compact('student_group'));
    }

    public function StudentGroupUpdate(Request $request, $id)
    {
        $student_group = StudentGroup::findOrFail($id);

        if (!($request->name == $student_group->name)) {
            $request->validate([
                'name' => 'required|unique:student_groups,name'
            ]);

            $student_group->name = $request->name;
            $student_group->save();
        }

        $notification = array('message' => 'Class updated successfully!', 'alert-type' => 'success');
        return redirect()->route('setup.student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        StudentGroup::destroy($id);

        $notification = array('message' => 'Class delete successfully!', 'alert-type' => 'info');
        return redirect()->route('setup.student.group.view')->with($notification);
    }
}
