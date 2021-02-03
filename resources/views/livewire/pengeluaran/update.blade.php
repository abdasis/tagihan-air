<div>
    {{-- Be like water. --}}
    <form wire:submit.prevent='update'>
        @if (session()->has('message'))
        <div class="alert alert-default-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Success!</h5>
            {{ session('message') }}
        </div>
        @endif
        <div class="row">
            {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="meter_awal">Meter Awal</label>
                        <input type="number" wire:model="meter_awal" id="awal_meter" class="form-control" placeholder="0">
                    </div>
                </div> --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label for="meter_awal">Meter Akhir</label>
                    <input type="number" wire:model="akhir_meter" id="akhir_meter" class="form-control" placeholder="0">
                </div>
            </div>
        </div>

        {{-- <div class="row">
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
            </div> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="meter_awal">Dikson</label>
                    <input type="number" wire:model="diskon" id="pemakaian_kubik" class="form-control is-valid"
                        placeholder="0">
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary float-right"> <i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </form>
</div>
