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
            <label for="name" class="form-label">Nama Customer</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address_office" class="form-label">Alamat Kantor</label>
            <input type="text" class="form-control" id="address_office" name="address_office" required>
            @error('address_office')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address_storage" class="form-label">Alamat Gudang</label>
            <input type="text" class="form-control" id="address_storage" name="address_storage" required>
            @error('address_storage')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
