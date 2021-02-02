<div>
    {{-- Stop trying to control. --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Pengguna</a></li>
                        <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                        <li class="breadcrumb-item active">Semua</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h5>Pengaturan Harga</h5>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='store'>
                                <div class="form-group">
                                    <label for="">Biaya Admin</label>
                                    <input type="number" wire:model='biaya_admin' class="form-control"
                                        placeholder="1000">
                                </div>
                                <div class="form-group">
                                    <label for="">Biaya Perawatan</label>
                                    <input type="number" wire:model='biaya_perawatan' class="form-control"
                                        placeholder="1000">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga M<sup>3</sup></label>
                                    <input type="number" wire:model='harga_perkubik' class="form-control"
                                        placeholder="1000">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger"><i class="fa fa-save mr-1"></i>Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h5>Biaya Terbaru</h5>
                        </div>
                        <div class="card-body">
                            <p><b>Biaya Admin:</b> Rp. {{ number_format($harga->biaya_admin ?? 0, 2 ,',', '.') }}</p>
                            <p><b>Biaya Perawatan:</b> Rp. {{ number_format($harga->biaya_perawatan ?? 0, 2,',','.') }}
                            </p>
                            <p><b>Harga Perkubik:</b> Rp. {{ number_format($harga->harga_perkubik ?? 0, 2, ',', '.') }}
                            </p>
                            <div class="text-success">Terakhir diperbarui pada
                                <b>{{ Carbon\Carbon::parse($harga->created_at ?? 0)->format('d-M-Y') }}</b> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
