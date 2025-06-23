<div class="modal-body">
    <form id="customerForm" action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cd_customer" class="form-label">Kode Customer</label>
            <input type="text" class="form-control" id="cd_customer" name="cd_customer" required>
            @error('cd_customer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nm_customer" class="form-label">Nama Customer</label>
            <input type="text" class="form-control" id="nm_customer" name="nm_customer" required>
            @error('nm_customer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" required>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
