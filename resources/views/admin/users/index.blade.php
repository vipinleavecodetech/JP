@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
       <?php if(str_contains(Request::url(), 'user-patients')){ ?>
         View Profile
       <?php }else{ ?>
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
        <?php } ?>
    </div>
    @if (session('successCancel'))
    <div class="alert alert-success">
        {{ session('successCancel') }}
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User display dt-responsive" id="userTable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                           Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>
                                
                            </td>
                            <td>
                               {{ $i++ }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->created_at ?? '' }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                <?php 
                                if(str_contains(Request::url(), 'user-patients')){
                                //if($user->role_id==2)
                                $subscribed=0;
                                $subsId='';
                                $isany=0;
                                foreach($subscriptionStatus[0] as $key1 => $subscriptionData){ 
                                    $status = $subscriptionData->subscription_status;
                                   
                                    if($subscriptionData->patient_id == $user->id){
                                        $isany=1;
                                        if($status =='active'){
                                            $subscribed = 1;
                                            $subsId = $subscriptionData->transaction_id;
                                        }else{
                                            $subscribed = 0;
                                        }
                                    }
                                }
                                   
                                ?>
                                
                                @if($subscribed)
                                    <a class="btn btn-xs btn-success" href="#">Subscription Activated</a>
                                @if(Auth::user()->role_id !='3')
                                    <a class="btn btn-xs btn-danger" href="{{ route('subscription.cancel', encrypt($subsId)) }}">Cancel Subscription</a>
                                    <a class="btn btn-xs btn-success" href="/admin/transactions?pid={{$user->id}}">Transaction</a>
                               
                                    <!--<a class="btn btn-xs btn-success" href="{{ route('subscription.reactivate', encrypt($user->id)) }}">Re-activate Subscription</a>-->
                                @endif
                                @else
                                @if(Auth::user()->role_id !='3')
                                <a class="btn btn-xs btn-info" href="{{ route('payment.patient', encrypt($user->id)) }}">Get Subscription</a>
                                @endif
                                @endif
                                
                                @if($isany)
                                @if(Auth::user()->role_id !='3')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.patients.patientInvoice', $user->id) }}">Invoice</a>
                                @endif
                                @endif
                                
                                <?php } ?>

                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan



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


    
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST', 
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css"> 
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.min.js"> </script> 
<script>
 

</script>

@endsection