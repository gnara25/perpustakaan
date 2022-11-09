<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman PDF</title>
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
        <h5> Laporan Peminjaman PDF </h4>
    </center>
 
     <table class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Tanggal Peminjaman</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($data as $row)
                                                    <tr>
                                                        <td scope="row">{{ $no++ }}</td>
                                                        <td>{{$row->idnama->nama}}</td>
                                                        <td>{{ $row->kelas }}</td>
                                                        <td>{{ Carbon\Carbon::parse($row->tanggalpinjam)->format('d-m-Y') }}</td>
                                                        
                                                       
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

 
</body>
</html>