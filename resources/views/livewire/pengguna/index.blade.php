<div>
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

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <button wire:click='tambahPengguna' class="btn btn-primary"> <i class="fa fa-user-plus"></i> Tambah
                        Pengguna</button>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                Semua Data Pengguna
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
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPengguna as $key => $pengguna)
                                    <tr>
                                        <td scope="row">{{ $key+1 }}</td>
                                        <td>{{ $pengguna->nomor_meter }}</td>
                                        <td>{{ $pengguna->nama }}</td>
                                        <td>{{ $pengguna->alamat }}</td>
                                        <td>{{ $pengguna->telepon }}</td>
                                        <td>
                                            <div class="button-group">
                                                <button wire:click='edit({{ $pengguna->id }})'
                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                                <button wire:click='catatPengeluaran({{ $pengguna->id }})'
                                                    class="btn btn-sm btn-success"><i
                                                        class="fa fa-cash-register"></i></button>
                                                <a href="{{ route('pengguna.show', $pengguna->id) }}">
                                                    <button class="btn btn-sm btn-info"><i
                                                            class="fa fa-eye"></i></button>
                                                </a>
                                                <button wire:click='delete({{ $pengguna->id }})'
                                                    class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash-alt"></i></button>
                                            </div>
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

    <div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($statusUpdate)
                    @livewire('pengguna.update')
                    @elseif($updatePengeluaran)
                    @livewire('pengeluaran.update')
                    @elseif($createPengeluaran)
                    @livewire('pengeluaran.create')
                    @else
                    @livewire('pengguna.create')
                    @endif
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
</script>
@endpush
