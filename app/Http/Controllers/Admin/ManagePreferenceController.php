<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ManagePreference;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class ManagePreferenceController extends Controller
{
    public function index(Request $request)
    {
        $preferenceDetails = ManagePreference::all();

        return view('admin.manage-preference.index', compact('preferenceDetails'));
    }
    
    public function createPreference()
    {
        return view('admin.manage-preference.create');
    }
    
    public function submitPreference(Request $request)
    {
        
        $imagePath = $request->file('image')->store('public/images');
        $imageUrl = Storage::url($imagePath);

        // Create a new ManagePreference record
        ManagePreference::create([    
            'medication_name' => $request->medication_name,
            'price' => $request->price,
            'description' => $request->description,
            'as_low_as_price' => $request->as_low_as_price,
            'popularity' => $request->popularity,
            'image' => '/storage/app/'.$imagePath,
            'status' => $request->status,
        ]);
        
        return redirect('admin/manage-preferences');
    }
    
    
    public function showPreference($id)
    {
       $showPreference = ManagePreference::find($id);
        return view('admin.manage-preference.show',compact('showPreference'));
    }
    
    
    public function editPreference($id)
    {
       $editPreference = ManagePreference::find($id);
        return view('admin.manage-preference.edit',compact('editPreference'));
    }
    
    public function updatePreference(Request $request, $id)
    {
        if($request->file('image')){
            $imagePath = $request->file('image')->store('public/images');
            $imageUrl = Storage::url($imagePath);
            $imgUrl = '/storage/app/'.$imagePath;
        }

        $managePreference = ManagePreference::findOrFail($id);
        $managePreference->medication_name = $request->medication_name;
        $managePreference->price = $request->price;
        $managePreference->description = $request->description;
        $managePreference->as_low_as_price = $request->as_low_as_price;
        $managePreference->popularity = $request->popularity;
        if($request->file('image')){
          $managePreference->image = $imgUrl;
        }
        $managePreference->status = $request->status;
        $managePreference->save();

        return redirect('admin/manage-preferences');
    }
    
    
    public function PreferenceDestroy($id)
    {
        
        $prescripton_data = ManagePreference::find($id);
        $prescripton_data->delete();
         return redirect()->back();
    }
    
    
     
}