<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p{
            font-size: 10px;
        }
        td{
            font-size: 8px;
        }
        table{
            width: 100%;
        }
        *{
            margin: 0px;
            padding: 2px;
        }
        .border{
            border: 1px dashed #444;
        }
        .text-center{
            text-align: center;
        }

        .text-right{
            text-align: right !important;
        }
    </style>
</head>

<body>
<div class="row justify-content-center">
    <div class="col-md-4 shadow-sm">
        <p class="text-center">PMB AIR BERSIH</p>
        <p class="text-center">Tagihan : {{ date('d-F-Y') }}</p>
    </div>
</div>
<div class="border"></div>

<table>
    <tr>
        <td>ID</td>
        <td>:</td>
        <td class="text-right"> {{ $id }}</td>
    </tr>
    <tr>
        <td>Nomor Refrensi</td>
        <td>:</td>
        <td class="text-right">{{ date('dmy') . $id }}</td>
    </tr>

    <tr>
        <td>Nama</td>
        <td>:</td>
        <td class="text-right">{{ $sumber_dana }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td class="text-right">{{ $alamat }}</td>
    </tr>
    <tr>
        <td>No Meter</td>
        <td>:</td>
        <td class="text-right">{{ $no_meter }}</td>
    </tr>
    <tr>
        <td>Meter Awal</td>
        <td>:</td>
        <td class="text-right">{{ $meter_awal }}</td>
    </tr>
    <tr>
        <td>Meter Akhir</td>
        <td>:</td>
        <td class="text-right">{{ $meter_akhir }}</td>
    </tr>
    <tr>
        <td>Jumlah Pekaian</td>
        <td>:</td>
        <td class="text-right">{{ ($meter_akhir-$meter_awal) }}</td>
    </tr>
    <tr>
        <td>Biaya Perawatan</td>
        <td>:</td>
        <td class="text-right">Rp. {{ number_format($biaya_perawatan,2,',','.') }}</td>
    </tr>
    <tr>
        <td>Harga Perkubik</td>
        <td>:</td>
        <td class="text-right">Rp. {{ number_format($harga_perkubik,2,',','.') }}</td>
    </tr>
    <tr>
        <td>Diskon</td>
        <td>:</td>
        <td class="text-right">Rp. {{ number_format($diskon,2,',','.') }}</td>
    </tr>
    <tr>
        <td>Total</td>
        <td>:</td>
        <td class="text-right">Rp. {{ number_format($total,2,',','.') }}</td>
    </tr>
</table>
<div class="border"></div>
</body>

</html>
