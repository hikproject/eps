<div class="modal-body">
    <form id="partForm" action="{{ route('parts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cd_customer" class="form-label">Kode Customer</label>
            <select class="form-control select2" id="cd_customer" name="cd_customer" required>
                <option value="">Pilih Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->cd_customer }}">{{ $customer->cd_customer }} - {{ $customer->nm_customer }}</option>
                @endforeach
            </select>
            @error('cd_customer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="part_number" class="form-label">Part Number</label>
            <input type="text" class="form-control" id="part_number" name="part_number" required>
            @error('part_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

@push('script')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Pilih Customer',
            allowClear: true
        });
    });
</script>
@endpush
