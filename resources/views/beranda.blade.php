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
                                            <h2 class="mb-0 text-white">{{$bukucount}} <i
                                                    class='font-14 text-white'>Buku</i>  </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="fadeIn animated bx bx-book-alt"></i>
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
                                            <h2 class="mb-0 text-white">{{$anggotacount}}<i
                                                    class='font-14 text-white'> Orang</i>  </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="fadeIn animated bx bx-user-circle"></i>
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
                                            <h2 class="mb-0 text-white">{{$pinjam}} <i
                                                    class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="fadeIn animated bx bx-upload"></i>
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
                                            <h2 class="mb-0 text-white">{{$petugas}} <i
                                                    class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                        </div>
                                        <div class="ms-auto font-35 text-white"><i class="fadeIn animated bx bx-group"></i>
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
                                            <h5 class="mb-0">Daftar Anggota <a href="daftaranggota" class="btn btn-white btn-sm px-4 radius-15" style="float: right; ">lihat lebih banyak </a> </h5>

                                        </div>
                                        <hr/>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>No.</th> -->
                                                        <!-- <th>Foto</th> -->
                                                        <th>Nisn</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Tgl.Lahir</th>
                                                        <th>Kelas</th>
                                                        <th>Alamat</th>
                                                       <!--  <th>Qr Code</th> -->
                                                    </tr>
                                                </thead>
                                             <!--    @php
                                                    $no = 1;
                                                @endphp -->
                                                <tbody>
                                                    @foreach ($anggota as $row)
                                                        <tr>
                                                           <!--  <td scope="row">{{ $no++ }}</td> -->
                                                            <!-- <td><img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px"></td> -->
                                                            <td>{{ $row->nisn }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}
                                                            </td>
                                                            <td>{{ $row->kelas }}</td>
                                                            <td>{{ $row->alamat }}</td>
                                                           <!--  <td> {!! QrCode::size(100)->generate($row->nisn) !!}
                                                            </td> -->
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
                                            <h5 class="mb-0">Daftar Buku <a href="buku" class="btn btn-white btn-sm px-4 radius-15" style="float: right; ">lihat lebih banyak </a> </h5>
                                        </div>
                                        <hr/>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                                <thead>

                                                    <!-- <th>
                                                        <input type="checkbox" name="select_all" id="select_all">
                                                    </th> -->
                                                    <!-- <th>No</th> -->
                                                    <th>Judul Buku </th>
                                                    <!-- <th>Kategori Buku</th> -->
                                                    <!-- <th>Kode Buku</th> -->
                                                    <th>Penulis Buku</th>
                                                    <th>Penerbit</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Jumlah</th>
                                                    <!-- <th>Halaman Buku</th>
                                                    <th>Lokasi Buku</th>
                                                    <th>Deskripsi</th>
                                                    <th>Foto</th> -->
                                                 <!--    @if (auth()->user()->role == 'admin')
                                                        <th>Aksi</th>
                                                    @endif -->

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($buku as $row)
                                                        <tr>
                                                            <!-- <td><input type="checkbox" id="example" name="id[]"
                                                                    value="{{ $row->id }}">
                                                            </td> -->
                                                            <!-- <td>{{ $no++ }}</td> -->
                                                            <td>{{ $row->namabuku }}</td>
                                                            <!-- <td>{{ $row->idkategori->kategori }}</td> -->
                                                        <!--     <td>{{ $row->kodebuku }}</td> -->
                                                            <td>{{ $row->penulis }}</td>
                                                            <td>{{ $row->penerbit }}</td>
                                                            <td>{{ $row->tahunterbit }}</td>
                                                            <td>{{ $row->jumlah }}</td>
                                                          <!--   <td>{{ $row->halbuku }}</td>
                                                            <td>{{ $row->lokasibuku }}</td>
                                                            <td>{{ $row->deskripsi }}</td>
                                                            <td> <img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px">
                                                            </td> 
                                                          @if (auth()->user()->role == 'admin')
                                                                <td class="b">
                                                                    <a href="/editbuku/{{ $row->id }}"
                                                                        class="btn btn-success">
                                                                        <i class="fa-solid fa-square-pen"></i>
                                                                    </a>
                                                                    <a href="#" class="btn btn-danger delete"
                                                                        data-id="{{ $row->id }}"
                                                                        data-nama="{{ $row->nama }}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </a>
                                                                </td> 
                                                            @endif -->
                                                        </tr> 
                                                    @endforeach

                                                </tbody>
                                            </table>
   
                                    </div>
                                </div>
                        </div>
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

</body>

</html>

