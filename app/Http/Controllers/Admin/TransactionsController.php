<?php

namespace App\Http\Controllers\Admin;


use App\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $patient_role_id= Auth::user()->role_id;
            $patient_id= Auth::user()->id;
            
            if($patient_role_id=='2')
            {
               $query = Transaction::where('patient_id', $patient_id)->get();
            }
            else
            {
               if($request->pid){
                $query = Transaction::where('patient_id', $request->pid)->get();   
               }else{
                $query = Transaction::all(); 
               }
            }
            
          
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'transaction_show';
                $editGate      = '';
                $deleteGate    = '';
                $crudRoutePart = 'transactions';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

           $table->editColumn('created_at', function ($row) {
                return date('Y-m-d', strtotime($row->created_at));
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.transactions.index');
    }
    
  

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
