<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function veiwDesignation()

    {
        $data['designations'] = Designation::all();

        return view('backend.setup.designation.view_designation', $data);
    }

    public function addDesignation()
    {
        return view('backend.setup.designation.add_designation');
    }


    public function storeDesignation(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:designations,name'
        ]);

        $desig =  new Designation();
        $desig->name = $request->name;
        $desig->save();


        $notification = [
            'message' => 'designation summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.designation')->with($notification);
    }





    public function edithDesignation($id)
    {
        $edith =  Designation::find($id);
        return view('backend.setup.designation.edith_designation', compact('edith'));
    }

    public function updateDesignation(Request $request, $id)

    {
        $update = Designation::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:designations,name,' . $update->id
        ]);


        $update->name = $request->name;
        $update->save();

        $notification = [
            'message' => 'Designation Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.designation')->with($notification);
    }



    public function deleteDesignation($id)
    {
        $delete = Designation::find($id);
        $delete->delete();

        $notification = [
            'message' => 'Designation Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.designation')->with($notification);
    }
}