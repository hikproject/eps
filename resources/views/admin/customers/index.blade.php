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
  {{-- Flash Messages --}}
  @include('Layout.flash')
      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400">Data Customer</h6>
              <br>
              <button class="btn btn-primary" onclick="openCustomerModal('{{ route('customers.create') }}')">Tambah Customer</button>
              <br>
              <br>
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="customersTable">
                  <thead>
                    <tr>
                      <th>Kode Customer</th>
                      <th>Nama Customer</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Utama -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="customerModalLabel">Form Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modalContent">
            <!-- Content akan dimuat disini -->
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
      lengthChange: true,
      pageLength: 10,
      scrollY: '400px',
      scrollCollapse: true,
      paging: true,
      columns: [
        { data: 'cd_customer', name: 'cd_customer' },
        { data: 'nm_customer', name: 'nm_customer' },
        { data: 'address', name: 'address'},
        {
          data: 'action', 
          name: 'action',
          orderable: false,
          searchable: false,
          render: function(data, type, row) {
            return `
              <div class="d-flex gap-2">
                <button class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit" onclick="openCustomerModal('customers/' +${row.id} + '/edit')">
                  <i class="ti ti-edit"></i>  
                </button>
                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus" onclick="deleteCustomer(${row.id})">
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
<script>
  function openCustomerModal(url) {
    $.get(url, function(data) {
      $('#modalContent').html(data);
      $('#customerModal').modal('show');
    });
  }
</script>
<script>
function deleteCustomer(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data customer akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-danger me-2',
            cancelButton: 'btn btn-secondary'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/customers/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#customersTable').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan: ' + xhr.responseJSON.message,
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
}
</script>
@endsection

