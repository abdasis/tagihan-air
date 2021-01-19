<div>
    <form wire:submit.prevent='update'>
        <div class="form-group">
            <label for="nomor_meter">Nomor Nomor</label>
            <input type="tel" wire:model="nomor_meter" id="nomor_meter"
                class="form-control @error('nomor_meter') is-invalid @enderror " placeholder="Masukan Nomor Meter">
            @error('nomor_meter')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" wire:model="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                placeholder="Masukan Nama Lengkap">
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="tel" wire:model="telepon" id="telepon"
                class="form-control @error('telepon') is-invalid @enderror" placeholder="6281944999994">
            @error('telepon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat" id="alamat"
                rows="3"></textarea>
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-primary"><i class="fa fa-save mr-1"></i>Simpan Perubahan</button>
        </div>
    </form>
</div>
