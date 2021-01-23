<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peggunaan Air</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Penggunaan</a></li>
                        <li class="breadcrumb-item active">Semua</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                Semua Data Penggunaan
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-hover table-nowrap">
                                <thead class="thead-default">
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Meter</th>
                                        <th>Nama</th>
                                        <th>Awal Meter</th>
                                        <th>AkhirMeter</th>
                                        <th>Pengguna L</th>
                                        <th>Penggunaan M<sup>3</sup></th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPenggunaan as $key => $penggunaan)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $penggunaan->dataPengguna->nomor_meter }}</td>
                                        <td>{{ $penggunaan->dataPengguna->nama}}</td>
                                        <td>{{ $penggunaan->awal_meter}}</td>
                                        <td>{{ $penggunaan->akhir_meter}}</td>
                                        <td>{{ $penggunaan->pemakaian_liter}}</td>
                                        <td>{{ number_format($penggunaan->pemakaian_kubik,0,'.','.')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('js')
<script>
    Livewire.on('tambahPengguna', function(){
        $('#modalPengguna').modal('show')
        $('.modal-title').text('Tambah Pengguna Baru');
    })

    Livewire.on('updatePengguna', function(){
        $('#modalPengguna').modal('show')
        $('.modal-title').text('Edit Pengguna');
    })

    Livewire.on('modalPengeluaran', function(){
        $('#modalPengguna').modal('show')
        $('.modal-title').text('Tambah Penggunaan');
    })
</script>
@endpush
