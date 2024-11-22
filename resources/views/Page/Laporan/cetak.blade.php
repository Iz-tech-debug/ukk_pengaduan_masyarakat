<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Laporan Pengaduan Masyarakat Kota Cimahi</h2>

    <table>
        <tbody>
            <tr>
                <td>Periode</td>
                <td>:</td>
                <td>{{ $daffaperiode }}</td>
            </tr>
            <tr>
                <td>Penyusun</td>
                <td>:</td>
                <td>Tim Pengaduan Masyarakat</td>
            </tr>
            <tr>
                <td>Wilayah</td>
                <td>:</td>
                <td>Kota Cimahi</td>
            </tr>
        </tbody>
    </table>

    <br>

    <h3>I. Pendahuluan</h3>
    <p>Laporan ini disusun berdasarkan data pengaduan yang masuk ke dalam sistem pengaduan masyarakat Kota Cimahi. Data
        tersebut diolah dan disajikan dalam bentuk tabel untuk memudahkan pemahaman dan analisis.</p>

    <h3>II. Hasil Pengaduan</h3>

    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Belum Selesai</th>
                <th>Sedang Proses</th>
                <th>Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daffapengaduan as $item)
                <tr>
                    <td>{{ date('F Y', strtotime($item->bulan)) }}</td>
                    <td>{{ $item->belum_selesai }}</td>
                    <td>{{ $item->proses }}</td>
                    <td>{{ $item->selesai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
