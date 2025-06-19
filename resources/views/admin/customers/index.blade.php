@extends('Layout.main')
@section('title', 'Customers')
@section('content')
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h5 class="m-b-10">Customer</h5>
          </div>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0)">Data Master</a></li>
            <li class="breadcrumb-item" aria-current="page">Customer</li>
          </ul> 
        </div>
      </div>
    </div>
  </div>
  <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400">Data Customer</h6>
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="customersTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Customer</th>
                      <th>Nama Customer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('#customersTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('customers.data') }}",
      lengthChange: false,
      pageLength: 10,
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'cd_customer', name: 'cd_customer' },
        { data: 'nm_customer', name: 'nm_customer' },
        {
          data: 'action', 
          name: 'action',
          orderable: false,
          searchable: false,
          render: function(data, type, row) {
            return `
              <div class="d-flex gap-2">
                <button class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit">
                  <i class="ti ti-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus">
                  <i class="ti ti-trash"></i>
                </button>
              </div>
            `;
          }
        }
      ]
    });
  });
</script>
@endsection

