@extends('layouts.admin')
@section('content')
@can('employee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{--<a class="btn btn-success" href="{{ route("admin.patients.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.employee.title_singular') }}
            </a>--}}
            <a class="btn btn-success" href="{{route('admin.manage-prescription.add')}}">
               Add Prescriptions Template
            </a>
        </div>
    </div>
@endcan
<div class="card">
    {{--<div class="card-header">
        {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
    </div>--}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card-body">
        <div class="cust_overflow">
        <table class="table table-bordered table-striped table-hover datatable display dt-responsive" id="patientTable">
            <thead>
                <tr>
                    <th width="5%">Sr.No.</th>
                    <th>Template Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                    
                </tr>
            </thead>
                <tbody>
                    <?php $i=1; ?>
                    
                    @foreach($prescriptionDetails as $key=>$data)
                        <tr data-entry-id="{{ $data->id }}">
                            <td class="details-control">
                             {{ $i++ }}
                            </td> 
                            <td>
                                {{ $data->name ?? '' }} 
                            </td>
                            <td>
                                <?php if($data->status==1) { echo "Active"; } ?> 
                                 <?php if($data->status==0) { echo "Inactive"; } ?> 
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.manage-prescription.show', $data->id) }}?action=view">
                                            {{ trans('global.view') }}
                                        </a>
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.manage-prescription.edit', $data->id) }}?action=edit">
                                            {{ trans('global.edit') }}
                                        </a>
                                         <a class="btn btn-xs btn-danger" href="{{ route('admin.manage-prescription.delete',$data->id) }}">
                                            {{ trans('global.delete') }}
                                        </a>
                                        
                                        
                            </td>
                           
                        </tr>
                        
                    @endforeach
                </tbody>
        </table>

</div>
    </div>
</div>
@endsection
@section('scripts')
@parent
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css"> 
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.min.js"> </script>  
<script>
  $('#patientTable').DataTable( {
    responsive: true,
});


</script>
@endsection