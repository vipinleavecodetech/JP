@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        {{--<div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.card.title_singular') }}
            </a>
        </div>--}}
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Card Details
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User display dt-responsive" id="userTable">
                <thead>
                    <tr>
                        <th style="display:none"></th>
                        <th width="10">
                        Sr. No.
                        </th>
                        <th>
                          Patient name
                        </th>
                        <!--<th>
                          Card Type 
                        </th>-->
                        <th>
                          Card number  
                        </th>
                        <th>
                           Created Date
                        </th>
                        <!--<th>
                            &nbsp;
                        </th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php if(Auth::user()->role_id=='2'){ ?>
                     @foreach($cardDetails as $key => $data)
                     <?php if($data->patient_id == Auth::user()->id){ ?>
                        <tr data-entry-id="{{ $data->id }}">
                            <td style="display:none"></td>
                            <td>
                               {{ $i++ }}
                            </td>
                            <td>
                               <?php $user_name = DB::table('users')->where('id', $data->patient_id)->first(); 
                               echo $user_name->name;
                               ?>
                            </td>
                            <!--<td>
                               {{$data->card_brand}}
                            </td>-->
                            <td>
                               ************{{substr($data->card_number, -4)}}
                            </td>
                            <td>
                               {{$data->created_at}}
                            </td>
                            <!--<td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.cards.show', $data->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                            </td>-->

                        </tr>
                        <?php } ?>
                    @endforeach
                    <?php }else{ ?>
                    @foreach($cardDetails as $key => $data)
                        <tr data-entry-id="{{ $data->id }}">
                            <td style="display:none"></td>
                            <td>
                               {{ $i++ }}
                            </td>
                            <td>
                               <?php $user_name = DB::table('users')->where('id', $data->patient_id)->first(); 
                               echo $user_name->name;
                               ?>
                            </td>
                            <!--<td>
                               {{$data->card_brand}}
                            </td>-->
                            <td>
                               ************{{substr($data->card_number, -4)}}
                            </td>
                            <td>
                               {{$data->created_at}}
                            </td>
                            <!--<td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.cards.show', $data->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                            </td>-->

                        </tr>
                    @endforeach
                    <?php } ?>
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