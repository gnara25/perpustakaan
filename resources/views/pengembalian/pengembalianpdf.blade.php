<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5> Laporan Pengembalian </h4>
    </center>
 
     <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No.Tansaksi </th>
                                                        <th>Nama Siswa </th>
                                                        <th>kelas</th>
                                                        <th>Tanggal Pengembalian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->transaksi }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ $row->kelas }}</td>
                                                            <td>{{ Carbon\Carbon::parse($row->tanggalpengembalian)->format('d-m-Y') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

 
</body>
</html>