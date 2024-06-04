@extends('layouts.admin')
@section('content')
<?php if(Auth::user()->role_id=='2'){ ?>
<div class="content" id="client_dash">
    <div class="row">
        <div class="col-lg-12">
           <div class="card-columns">
              <div class="card bg-primary">
                <a href="{{ route("admin.user-patients.index") }}">
                <div class="card-body text-center">
                  <h4 class="card-text">Your Profile</h4>
                </div>
                </a>
              </div>
              <div class="card bg-success">
                <a href="{{ route("admin.patients.index") }}">
                <div class="card-body text-center">
                  <h4 class="card-text">Your Submissions</h4>
                </div>
                </a>
              </div>
              <div class="card bg-secondary">
                  <a href="{{ route('admin.transactions.index') }}">
                <div class="card-body text-center">
                  <h4 class="card-text">Your Transaction</h4>
                </div>
                </a>
              </div>
              <div class="card bg-danger">
                <a href="{{ route("admin.cards.index") }}">
                <div class="card-body text-center">
                  <h4 class="card-text">Card Details</h4>
                </div>
                </a>
              </div>
        </div>
    </div>
  </div>
</div>
<?php }else{ ?>
<div class="content" id="admin_dash">
    <div class="row">
        <div class="col-lg-12">
           <div class="card-columns">
              <div class="card bg-primary">
                <div class="card-body text-center">
                  <h4 class="card-text">No of Users</h4>
                  <h4 class="card-text">{{ count($users) }}</h4>
                </div>
              </div>
              <div class="card bg-success">
                <div class="card-body text-center">
                  <h4 class="card-text">No of Patients</h4>
                  <h4 class="card-text">{{ count($patient) }}</h4>
                </div>
              </div>
              <div class="card bg-danger">
                <div class="card-body text-center">
                  <h4 class="card-text">No of Prescriptions</h4>
                  <h4 class="card-text">6</h4>
                </div>
              </div>
        </div>
    </div>
  </div>
</div>
<?php } ?>
@endsection
@section('scripts')
@parent

@endsection