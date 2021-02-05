<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 shadow-sm">
                <h3 class="text-center text-primary">PMB AIR BERSIH</h3>
                <h5 class="text-center">Tagihan : {{ date('d-F-Y') }}</h5>
            </div>
        </div>
        <p>ID <span class="float-right">{{ $id }}</span></p>
        <p>Nomor Refrensi: <span class="float-right">{{ date('dmy') . $id }}</span></p>
        <hr>
        <p>Nama <span class="float-right">{{ $sumber_dana }}</span></p>
        <p>Alamat <span class="float-right">{{ $alamat }}</span></p>
        <p>No Meter <span class="float-right">{{ $no_meter }}</span></p>
        <p>Meter Awal: <span class="float-right">{{ $meter_awal }}</span></p>
        <p>Meter Akhir: <span class="float-right">{{ $meter_akhir }}</span></p>
        <p>Jumlah Pekaian: <span class="float-right">{{ $meter_akhir-$meter_awal }}</span></p>
        <p>Biaya Perawatan: <span class="float-right">Rp. {{ number_format($biaya_perawatan,2,',','.') }}</span></p>
        <p>Harga Perkubik: <span class="float-right">Rp. {{ number_format($harga_perkubik,2,',','.') }}</span></p>
        <hr>
        <p>Diskon: <span class="float-right">Rp. {{ number_format($diskon,2,',','.') }}</span></p>
        <p>Total: <span class="float-right">Rp. {{ number_format($total,2,',','.') }}</span></p>


    </div>
</body>

</html>
