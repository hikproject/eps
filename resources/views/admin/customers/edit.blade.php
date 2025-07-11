<div class="modal-body">
    <form id="customerForm" action="{{ route('customers.update', $customers->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="cd_customer" class="form-label">Kode Customer</label>
            <input type="text" class="form-control" id="cd_customer" name="cd_customer" value="{{ $customers->cd_customer }}" required>
            @error('cd_customer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Customer</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $customers->name }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address_office" class="form-label">Alamat Kantor</label>
            <input type="text" class="form-control" id="address_office" name="address_office" value="{{ $customers->address_office }}" required>
            @error('address_office')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address_storage" class="form-label">Alamat Gudang</label>
            <input type="text" class="form-control" id="address_storage" name="address_storage" value="{{ $customers->address_storage }}" required>
            @error('address_storage')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Simpan</button>
        </div>
    </form>
</div>

<script>
function confirmUpdate() {
    $('#customerModal').modal('hide');
    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin ingin menyimpan perubahan data customer?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('customerForm').submit();
        } else {
            // Buka kembali modal jika user memilih batal
            $('#customerModal').modal('show');
        }
    });
}
</script>
