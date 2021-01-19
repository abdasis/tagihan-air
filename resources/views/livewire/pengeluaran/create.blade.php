<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form wire:submit.prevent='store'>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Meter Awal</label>
                    <input type="number" wire:model="meter_awal" id="awal_meter" class="form-control" placeholder="0">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Meter Akhir</label>
                    <input type="number" wire:model="meter_awal" id="akhir_meter" class="form-control" placeholder="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Pemakaian Liter</label>
                    <input type="number" wire:model="meter_awal" id="pemakaian_liter" class="form-control"
                        placeholder="0">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Pemakaian M<sup>3</sup></label>
                    <input type="number" wire:model="meter_awal" id="pemakaian_kubik" class="form-control"
                        placeholder="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Biaya Admin</label>
                    <input type="number" wire:model="biaya_admin" id="pemakaian_liter" class="form-control"
                        placeholder="0">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Biaya Perawatan</label>
                    <input type="number" wire:model="biaya_perawatan" id="pemakaian_kubik" class="form-control"
                        placeholder="0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Harga M<sup>3</sup> </label>
                    <input type="number" wire:model="harga_kubik" id="pemakaian_liter" class="form-control"
                        placeholder="0">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meter_awal">Dikson</label>
                    <input type="number" wire:model="dikson" id="pemakaian_kubik" class="form-control" placeholder="0">
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary float-right"> <i class="fa fa-save"></i> Simpan Data</button>
        </div>


    </form>
</div>
