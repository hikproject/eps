<div class="modal-body">
    <form id="partForm" action="{{ route('parts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cd_customer" class="form-label">Kode Customer</label><br>
            <select class="form-control js-example-basic-single" id="cd_customer" name="cd_customer" >
                <option value="">Pilih Customer</option>
                @foreach($customers as $customer)
                <option value="{{ $customer->cd_customer }}">
                    {{ $customer->name }} - {{ $customer->address_office }}
                </option>
                @endforeach
            </select>
            @error('cd_customer')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="part_number" class="form-label">Part Number</label>
            <input type="text" class="form-control" id="part_number" name="part_number" value="{{ old('part_number') }}"
                required>
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

<!-- Select2 Initialization Script -->
<script>
    $(document).ready(function () {
        $('#cd_customer').select2({
            placeholder: "Pilih Customer",
            dropdownParent: $('#partModal'),
            allowClear: true,
            width: '100%'
        });
    });

</script>
