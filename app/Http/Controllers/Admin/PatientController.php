<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
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

class PatientController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if(Auth::user()->email!='' && Auth::user()->role_id=='2'){
        $patient = Patient::where('email', Auth::user()->email)->get();
        }else{
        $patient = Patient::orderBy('id', 'desc')->get();
        }
        
        foreach ($patient as $pat) {
            $userId[] = $pat->patient_id;
        }
        $subscription = Transaction::whereIn('patient_id', $userId)->get();
        
        $subscriptionStatus[] = $subscription;
      

        return view('admin.patients.index', compact('patient', 'subscriptionStatus'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id');

        return view('admin.employees.create', compact('services'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        $employee->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $employee->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.employees.index');
    }

    public function edit(Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id');

        $employee->load('services');

        return view('admin.employees.edit', compact('services', 'employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        $employee->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$employee->photo || $request->input('photo') !== $employee->photo->file_name) {
                $employee->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($employee->photo) {
            $employee->photo->delete();
        }

        return redirect()->route('admin.employees.index');
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->load('services');

        return view('admin.employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        Employee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
