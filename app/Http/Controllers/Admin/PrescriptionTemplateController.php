<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PrescriptionTemplate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PrescriptionTemplateController extends Controller
{
    public function index(Request $request)
    {
        $prescriptionDetails = PrescriptionTemplate::all();

        return view('admin.prescription-template.index', compact('prescriptionDetails'));
    }
    
    public function addPrescription()
    {
        return view('admin.prescription-template.create');
    }
    
    public function submitPrescription(Request $request)
    {
    
        $prescripton_name=$request->prescripton_name;
        $prescription_area=$request->prescription_area;
        $prescription_status=$request->status;
        
         PrescriptionTemplate::create([    
            'name' => $prescripton_name,
            'temp_description' =>$prescription_area,
            'status' =>$prescription_status,
        ]);
        
        return redirect('admin/manage-prescriptions');
    }
    
    
    public function showPrescription($id)
    {
       $showPrescription = PrescriptionTemplate::find($id);
        return view('admin.prescription-template.show',compact('showPrescription'));
    }
    
    
    public function editPrescription($id)
    {
       $editPrescription = PrescriptionTemplate::find($id);
        return view('admin.prescription-template.edit',compact('editPrescription'));
    }
    
    public function updatePrescription(Request $request, $id)
    {
        $input = $request->all();
        $input['name'] = $input['prescripton_name'];
        $input['temp_description'] = $input['prescription_area'];
        $input['status'] = $input['status']??1;
        $prescripton_data = PrescriptionTemplate::findOrFail($id);
        $prescripton_data->update($input);
        return redirect()->back();
    }
    
    
    public function PrescriptionDestroy($id)
    {
        
        $prescripton_data = PrescriptionTemplate::find($id);
        $prescripton_data->delete();
         return redirect()->back();
    }
    
    
     
}