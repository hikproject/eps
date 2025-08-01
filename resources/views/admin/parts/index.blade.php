@extends('Layout.main')
@section('title', 'Parts')
@section('content')
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h5 class="m-b-10">Part</h5>
          </div>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0)">Data Master</a></li>
            <li class="breadcrumb-item" aria-current="page">Part</li>
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
              <h6 class="mb-2 f-w-400">Data Part</h6>
              <br>
              <button class="btn btn-primary" onclick="openPartModal('{{ route('parts.create') }}')">Tambah Part</button>
              <br>
              <br>
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="partsTable">
                  <thead>
                    <tr>
                      <th>Customer</th>
                      <th>Model</th>
                      <th>Part Name</th>
                      <th>Part Number</th>
                      <th>Leoco P/N</th>
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
    <div class="modal fade" id="partModal" tabindex="-1" aria-labelledby="partModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="partModalLabel">Form Part</h5>
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
    $('#partsTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('parts.data') }}",
      lengthChange: true,
      pageLength: 10,
      scrollY: '400px',
      scrollCollapse: true,
      paging: true,
      columns: [
        { data: 'customer.cd_name', name: 'customer.name' },
        { data: 'model', name: 'model' },
        { data: 'part_name', name: 'part_name' },
        { data: 'pn_customer', name: 'pn_customer' },
        { data: 'pn_leoco', name: 'pn_leoco' },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false,
          render: function(data, type, row) {
            return `
              <div class="d-flex gap-2">
                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus" onclick="deletePart(${row.id})">
                  <i class="ti ti-trash"></i>
                </button>
              </div>
            `;
          }
        }
      ],
      columnControl: ['searchDropdown'],
      columnDefs: [{
        target: -1,
        columnControl: []
    }],
    });
  });
</script>
<script>
  function openPartModal(url) {
    $.get(url, function(data) {
      $('#modalContent').html(data);
      $('#partModal').modal('show');
    });
  }
</script>
<script>
function deletePart(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data part akan dihapus secara permanen!",
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
                url: '/parts/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('#partsTable').DataTable().ajax.reload();
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
