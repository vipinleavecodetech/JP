@extends('layouts.admin')
@section('content')
<style>
  .datatable-Transaction .select-checkbox{
      display:none;
  }
</style>
<div class="card">
    <div class="card-header">
        Manage Transactions
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Transaction">
            <thead>
                <tr>
                    <th></th>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Customer ID</th>
                    <th>Amount</th>
                    <th>Subscription Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transaction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transactions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.transactions.index') }}",
    columns: [
      { "data": "id"  ,render: function (data, type, row, meta) {
                   return meta.row + meta.settings._iDisplayStart + 1;
                    }
      },
        { "data": "id"  ,render: function (data, type, row, meta) {
                   return meta.row + meta.settings._iDisplayStart + 1;
                    }
        },
      { data: 'patient_name', name: 'patient_name' },
      { data: 'email', name: 'email' },
      { data: 'customer_id', name: 'customer_id' },
      
       {  
        'data': 'amount',  
        'render': function (amount) {  
            return '$' + amount;  
        }  
      },
      { data: 'subscription_durations', name: 'subscription_durations' },
      { data: 'created_at', 
        render: function (created_at, type, row) {
                var created_at = new Date(row.created_at);
                created_at.setDate(created_at.getDate());
                var startDate = created_at.toDateString();
                return startDate;
        }
      },
    {
    data: 'subscription_end_date',
    render: function (subscription_end_date, type, row) {
        var created_at = new Date(row.created_at);
        var subscription_durations = row.subscription_durations;
        var durationMatches = subscription_durations.match(/\d+/);
        var duration = durationMatches ? parseInt(durationMatches[0]) : null;
        var durationDaysMap = {
            1: 29,
            3: 89,
            6: 179,
            12: 364
        };
        if (duration !== null && durationDaysMap.hasOwnProperty(duration)) {
            created_at.setDate(created_at.getDate() + durationDaysMap[duration]);
        }
        var subscriptionEndDate = created_at.toDateString();
        return subscriptionEndDate;
    }
    },

      
      { data: 'subscription_status', name: 'subscription_status' }

    //   { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-Transaction').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});
</script>

@endsection