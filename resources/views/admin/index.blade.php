@extends('Layout.main')
@section('title', 'Dashboard')
@section('content')
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Dashboard</h5>
              </div>
              <ul class="breadcrumb">
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Users</h6>
              <h4 class="mb-3">0</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Orders</h6>
              <h4 class="mb-3">0</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Revenue</h6>
              <h4 class="mb-3">$0</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">Total Products</h6>
              <h4 class="mb-3">0</h4>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5>Welcome to Admin Dashboard</h5>
              <p>This is your admin dashboard where you can manage the system.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
