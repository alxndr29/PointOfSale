<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Receipt example</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 30px;
            max-width: 30px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 90px;
            max-width: 90px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 200px;
            max-width: 200px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="ticket">
        
        <p class="centered">NOTA PEMBELIAN
            <br>Tanggal: {{$data->tanggal}}
            <br>No. Nota: {{$data->idnotajual}}
            <br>Kasir: {{$data->nama_pegawai}}
            <br>Pelanggan: {{$data->nama_pelanggan}}
        </p>
        <table>
            <thead>
                <tr>
                    <th class="quantity">Qty</th>
                    <th class="description">Deskripsi</th>
                    <th class="price">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $key => $value)
                <tr>
                    <td class="quantity">{{$value->jumlah}}</td>
                    <td class="description">{{$value->nama}}</td>
                    <td class="price">Rp.{{number_format($value->harga,2)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td class="quantity"></td>
                    <td class="description">TOTAL</td>
                    <td class="price">Rp. {{number_format($total,2)}}</td>
                </tr>

            </tbody>
        </table>
        <p class="centered">Terimakasih sudah berbelanja.
            <br>Toko Sinjai</p>
    </div>
   
</body>

</html>