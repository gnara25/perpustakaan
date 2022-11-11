<!DOCTYPE html>
<html lang="en">

<body>
    @include('template.head')
    <!-- wrapper -->
    <div class="wrapper">
        @include('template.sidebar')
        <!--header-->
        @include('template.navbar')
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row mb-3">
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-voilet">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">{{ $bukucount }} <i
                                                    class='font-14 text-white'>Buku</i> </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i
                                                class="fadeIn animated bx bx-book-alt"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Daftar Buku</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-primary-blue">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">{{ $anggotacount }}<i
                                                    class='font-14 text-white'> Orang</i> </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i
                                                class="fadeIn animated bx bx-user-circle"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Daftar Anggota</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-rose">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">{{ $pinjam }} <i
                                                    class='font-14 text-white'>Peminjaman</i> </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i
                                                class="fadeIn animated bx bx-upload"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Peminjaman</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-sunset">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">{{ $petugas }} <i
                                                    class='font-14 text-white'>Petugas</i> </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i
                                                class="fadeIn animated bx bx-group"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Petugas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <!-- row -->
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-6 d-flex">
                            <div class="card radius-15 w-100">
                                <div class="card-body">
                                    <div class="card-title mb-4">
                                        <h5 class="mb-0">Daftar Anggota <a href="daftaranggota"
                                                class="btn btn-white btn-sm px-4 radius-15" style="float: right; ">lihat
                                                lebih banyak </a>
                                        </h5>
                                    </div>
                                    <hr />
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Nisn</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Tgl.Lahir</th>
                                                    <th>Kelas</th>
                                                    <th>Alamat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($anggota as $row)
                                                    <tr>
                                                        <td>{{ $row->nisn }}</td>   
                                                        <td>{{ $row->nama }}</td>
                                                        <td>{{ Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}
                                                        </td>
                                                        <td>{{ $row->kelas }}</td>
                                                        <td>{{ $row->alamat }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-xl-6 d-flex">
                            <div class="card radius-15 w-100">
                                <div class="card-body">
                                    <div class="card-title mb-4">
                                        <h5 class="mb-0">Daftar Buku <a href="buku"
                                                class="btn btn-white btn-sm px-4 radius-15" style="float: right; ">lihat
                                                lebih banyak </a> </h5>
                                    </div>
                                    <hr />
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <th>Judul Buku </th>
                                                <th>Kategori </th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Thn.Terbit</th>
                                                <th>Jumlah</th>

                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($buku as $row)
                                                    <tr>
                                                        <td>{{ $row->namabuku }}</td>
                                                        <td>{{ $row->idkategori->kategori }}</td>
                                                        <td>{{ $row->penulis }}</td>
                                                        <td>{{ $row->penerbit }}</td>
                                                        <td>{{ $row->tahunterbit }}</td>
                                                        <td>{{ $row->jumlah }} buku</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-24 col-lg-24 col-xl-12 d-flex">
                            <div class="card radius-15 w-100">
                                <div class="card-body">

                                    <div class="card-title mb-4">
                                        <center>
                                            <h5 class="mb-1" style="font-size: 160%;">Buku TerPopuler</h5>
                                        </center>
                                        <div class="row">
                                            <div class="col-md-3" style="float: right;">
                                                <label class="mb-1" style="font-size: 100%;">FILTER BUKU :</label>
                                                <select id="kategories" class="form-control">
                                                    <option value=""  disabled selected>Pilih Kategori Buku
                                                    </option>
                                                    @if (count($idkategori) > 0)
                                                        @foreach ($idkategori as $kategoris)
                                                            <option value="{{ $kategoris->id }}">
                                                                {{ $kategoris->kategori }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <th>No</th>
                                                <th>Judul Buku </th>
                                                <th>Kategori Buku</th>
                                                <th>Tahun Terbit</th>
                                                <th>Dipinjam</th>
                                                <th>Foto</th>

                                            </thead>
                                            <tbody id="tbodys">
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @if (count($data) > 0)
                                                    @foreach ($data as $row)
                                                        @if ($row->dipinjam > 0)
                                                            
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->namabuku }}</td>
                                                            <td>{{ $row->idkategori->kategori }}</td>
                                                            <td>{{ $row->tahunterbit }}</td>
                                                            <td>{{ $row->dipinjam }} Kali</td>
                                                            <td> <img
                                                                    src="{{ asset('fotobuku/' . $row->foto) }}"alt=""
                                                                    style="width: 70px; height: 70px">
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="chart radius-15">
                            <div id="chartnilai"></div> 
                        </div>

                        <!--end row-->
                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--end page-wrapper-->
            <!--start overlay-->
            <div class="overlay toggle-btn-mobile"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            @include('template.footer')
        </div>
        <!-- end wrapper -->
        @include('template.script')

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script>
            const chart = Highcharts.chart('chartnilai', {
                title: {
                    text: 'Laporan Denda Bulanan'
                },
                xAxis: {
                    categories: {!! json_encode($previousMonths) !!},
                },
                series: [{
                    type: 'column',
                    name: 'Total Denda',
                    colorByPoint: true,
                    data: {!! json_encode($array_pengeluaran) !!},
                    showInLegend: false
                }]
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#kategories").on('change', function() {
                    var kategories = $(this).val();
                    console.log(kategories);
                    $.ajax({
                        url: "{{ route('berandah') }}",
                        type: "GET",
                        data: {
                            'kategories': kategories
                        },
                        success: function(data) {
                            var data = data.data;
                            var html = '';
                            console.log(data)
                            if (data.length > 0) {
                                for (let i = 0; i < data.length; i++) {
                                    html += '<tr>\
                                                                                                <td>' + (i + 1) + '</td>\
                                                                                                <td>' + data[i]['namabuku'] + '</td>\
                                                                                                <td>' + data[i]['kategori'] + '</td>\
                                                                                                <td>' + data[i][
                                        'tahunterbit'] + '</td>\
                                                                                                <td>' + data[i]['dipinjam'] + '</td>\
                                                                                                <td><img style="width: 70px; height: 70px" src="http://127.0.0.1:8000/fotobuku/' + data[i]['foto']  +'"/ ></td>\
                                                                                                </tr>';
                                }
                            } else {
                                html += '<tr>\
                                                                                       <td colspan="6"> ** Buku Dengan Kategori Ini Tidak Ada **</td>\
                                                                                                </tr>';
                            }

                            $('#tbodys').html(html);
                        }

                    });
                });
            });
        </script>

</body>

</html>
