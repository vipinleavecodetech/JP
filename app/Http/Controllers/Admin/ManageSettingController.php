<?php

namespace App\Http\Controllers\Admin;

use App\Managesetting;
use App\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ManageSettingController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        $managesetting_data=Managesetting::where('id', 1)->first();
     
        return view('admin.managesetting.index',compact('managesetting_data'));
    }
    
    public function setting_update(Request $request)
    {
         $Managesetting = Managesetting::findOrFail(1);
         
        $uploadIdPath = "";
        if($request->hasFile('update_logo')){
            $logo = time() . '.' . $request->update_logo->getClientOriginalExtension();
            $request->update_logo->move(base_path('uploads/settings'), $logo);
            $uploadIdPath = 'uploads/settings/' . $logo;
        }else{
            $uploadIdPath = $Managesetting->logo;
        }
        
         $input['logo'] = $uploadIdPath;
         $input['email'] = $request->input('update_email');
         $input['phone'] = $request->input('update_phone');
         $input['address'] = $request->input('update_address');
         $input['subs_plan_amt'] = $request->input('update_subs_amt');
         $input['site_url'] = $request->input('update_site_url');
         $input['pharmacy_email'] = $request->input('pharmacy_email');
         $input['fb_url'] = $request->input('update_fb_url');
         $input['twitter_url'] = $request->input('update_twitter_url');
         $input['instagram_url'] = $request->input('update_instagram_url');
         $input['linkedin_url'] = $request->input('update_linkedin_url');
         $Managesetting->update($input);
         return redirect()->route('admin.manage-setting.settingEdit');
        
    }

    
}