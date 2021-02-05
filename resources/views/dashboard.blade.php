@php
$pengeluaran = App\Models\Inventaris::whereYear('created_at', date('Y'));
$pemasukan = App\Models\Penggunaan::query();
@endphp

<x-app-layout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <a class="weatherwidget-io" href="https://forecast7.com/en/n7d03112d75/bangkalan/"
                        data-label_1="BANGKALAN" data-label_2="Cuaca" data-theme="pure">BANGKALAN Cuaca</a>
                    <script>
                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="jumbotron">
                        <div class="container-fluid">
                            <h1 class="display-4">Selamat Datang {{ Auth::user()->name }}</h1>
                            <p class="lead">Selamat bertugas dan jangan lupa untuk selalu menunaikan shalat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success card-outline">
                        <h5 class="card-header">
                            Data Pendapatan
                        </h5>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tbody>
                                    @php
                                    $pendapatanBulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                    $totalPedapatanBulan=count($pendapatanBulan);
                                    @endphp

                                    @for ($namaBulan = 1; $namaBulan < $totalPedapatanBulan; $namaBulan+=1) <tr>
                                        <th scope="row">{{ $pendapatanBulan[$namaBulan] }}</th>
                                        <td>:</td>
                                        <td>Rp.
                                            {{ number_format(App\Models\Penggunaan::whereYear('created_at', date('Y'))->whereMonth('created_at', $namaBulan)->sum('tagihan'),2,',','.') }}
                                        </td>
                                        </tr>
                                        @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-danger card-outline">
                        <h5 class="card-header">
                            Data Pengeluaran
                        </h5>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tbody>
                                    @php
                                    $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                    $jlh_bln=count($bulan);
                                    @endphp

                                    @for ($i = 1; $i < $jlh_bln; $i+=1) <tr>
                                        <th scope="row">{{ $bulan[$i] }}</th>
                                        <td>:</td>
                                        <td>Rp.
                                            {{ number_format(App\Models\Inventaris::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->sum('jumlah_total'),2,',','.') }}
                                        </td>
                                        </tr>
                                        @endfor


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>

</x-app-layout>
