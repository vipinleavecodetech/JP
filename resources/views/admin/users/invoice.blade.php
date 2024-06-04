@extends('layouts.admin')
@section('content')
<div id="pdf-content">
<style>
    table {
  width: 100%;
  border-collapse: collapse;
}

table tr td {
  padding: 0;
}

table tr td:last-child {
  text-align: right;
}

.bold {
  font-weight: bold;
}

.right {
  text-align: right;
}

.large {
  font-size: 1.75em;
}

.total {
  font-weight: bold;
  color: #fb7578;
}

.logo-container {
  margin: 20px 0 70px 0;
}

.invoice-info-container {
  font-size: 0.875em;
}
.invoice-info-container td {
  padding: 4px 0;
}

.client-name {
  font-size: 1.5em;
  vertical-align: top;
}

.line-items-container {
  margin: 70px 0;
  font-size: 0.875em;
}

.line-items-container th {
  text-align: left;
  color: #999;
  border-bottom: 2px solid #ddd;
  padding: 10px 0 15px 0;
  font-size: 0.75em;
  text-transform: uppercase;
}

.line-items-container th:last-child {
  text-align: right;
}

.line-items-container td {
  padding: 15px 0;
}

.line-items-container tbody tr:first-child td {
  padding-top: 25px;
}

.line-items-container.has-bottom-border tbody tr:last-child td {
  padding-bottom: 25px;
  border-bottom: 2px solid #ddd;
}

.line-items-container.has-bottom-border {
  margin-bottom: 0;
}

.line-items-container th.heading-quantity {
  width: 50px;
}
.line-items-container th.heading-price {
  text-align: right;
  width: 100px;
}
.line-items-container th.heading-subtotal {
  width: 100px;
}


.page-container {
  display: none;
}
</style>
<div class="logo-container">
  <img
    style="height: 18px; background: #c8c8c8;"
    src="{{asset('public/quiz-assets/images/logo.svg')}}"
  >
</div>

<table class="invoice-info-container">
  <tr>
    <td rowspan="3" class="client-name">
       Subscription No: <strong>{{ $subscription->id }}</strong>
    </td>
    <td>
      {{ $user->name }}
    </td>
  </tr>
  <tr>
    <td>
      {{ $user->email }}
    </td>
  </tr>
  <tr>
    <td>
      {{ $user->phone }}
    </td>
  </tr>
  <tr>
    <td colspan="2">
      Invoice Date: <strong>{{ date('M d, Y', strtotime($subscription->created_at)) }}</strong>
    </td>
    
  </tr>

</table>


<table class="line-items-container">
  <thead>
    <tr>
      <th class="heading-quantity">Sr No.</th>
      <th class="heading-description">Amount</th>
      <th class="heading-subtotal">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td class="left">${{ $subscription->amount }}</td>
      <td class="bold">${{ $subscription->amount }}</td>
    </tr>
  </tbody>
</table>


<table class="line-items-container has-bottom-border">
  <thead>
    <tr>
      <th>Total Due</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="large total">${{ $subscription->amount }}</td>
    </tr>
  </tbody>
</table>
</div>
<button class="btn btn-primary" type="button" id="pdf">Print</button>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
$('#pdf').click(function(){
    var divToPrint=document.getElementById('pdf-content');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);
})

</script>
@endsection