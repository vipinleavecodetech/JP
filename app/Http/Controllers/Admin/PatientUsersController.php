<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\RoleUser;
use App\User;
use App\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;
use Mail;

class PatientUsersController extends Controller
{
    public function index()
    {
        
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $subscriptionStatus = $users = $userId =  array();
        
        if(Auth::user()->id!='' && Auth::user()->role_id=='2'){
        $users = User::where('role_id', '2')->where('id', Auth::user()->id)->get();
        }else{
            $users = User::where('role_id', '2')->get();
        }
        foreach ($users as $user) {
            $userId[] = $user->id;
        }
        $subscription = Transaction::whereIn('patient_id', $userId)->get();
        
        $subscriptionStatus[] = $subscription;

        return view('admin.users.index', compact('users','subscriptionStatus'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.user-patients.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.user-patients.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.user-patients.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }
    
    public function invoice($id){
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $subscription=array();
        $user = User::find($id);
        if($user){
            $subscriptions = Transaction::where('patient_id', $id)->get();
            $subscription = $subscriptions[0];
        }
        
        return view('admin.users.invoice', compact('user', 'subscription'));
    }
    
    public function sendInvoice($id){
        $subscription=array();
        $user = User::find($id);
        if($user){
            $subscriptions = Transaction::where('patient_id', $id)->get();
            $subscription = $subscriptions[0];
        }
        
        $data = array('user'=>$user, 'subscription'=>$subscription);

        $path = storage_path('tmp/uploads/invoices/');
        $fileName = time().$id.".pdf";

        $pdf = PDF::loadView('admin.users.invoice-pdf', $data);
        $pdf->save($path  . $fileName);
        $to_name = 'Abhishek';
        $to_email = 'anubhavpanwar66@gmail.com';
        $mail=Mail::send('admin/users/mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Invoice');
        $message->from('abhishek.kumar200041@gmail.com','');
        });

       
    }
    
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
