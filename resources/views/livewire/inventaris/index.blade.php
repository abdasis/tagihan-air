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
                    <div class="card">
                        <div class="card-header">Form Tambah Pengeluaran</div>
                        <div class="card-body">
                            <form wire:submit.prevent='store'>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" wire:model="nama_barang" id="nama_barang"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" wire:model="jumlah" id="jumlah" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="harga_satuan">Harga Satuan</label>
                                        <input type="text" wire:model="harga_satuan" id="harga_satuan"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary float-right">Tambah Pengeluaran</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPengeluaran as $key => $pengeluaran)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $pengeluaran->nama_barang}}</td>
                                        <td>{{ $pengeluaran->jumlah}}</td>
                                        <td>Rp. {{ number_format($pengeluaran->harga_satuan,2,'.',',') }}</td>
                                        <td>Rp. {{ number_format($pengeluaran->jumlah_total,2,'.',',') }}</td>
                                        <td class="text-center">
                                            <i class="fa fa-edit text-warning cursor-pointer"
                                                wire:click='update({{ $pengeluaran->id }})'></i>
                                            <i class="fa text-danger fa-trash-alt cursor-pointer"
                                                wire:click='delete({{ $pengeluaran->id }})'></i>
                                        </td>
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

    <div class="modal fade" id="modalPengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('pengeluaran.update')
                </div>
            </div>
        </div>
    </div>


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

    Livewire.on('modalEdit', function(){
        $('#modalPengeluaran').modal('show')
        $('.modal-title').text('Edit Pengeluaran');
    })
</script>
@endpush
