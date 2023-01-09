<!DOCTYPE html>
<html lang="en">

@include('template.head')

<body>
    <!-- wrapper -->
    <div class="wrapper">

        @include('template.navbar')

        @include('template.sidebar')

        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->

            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Edit Peminjaman</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Peminjaman/Edit Peminjaman
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="">
                                <form action="/editpeminjamanpost/{{ $data->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="nama" class="col-sm-4 col-form-label"> Nama Siswa</label>
                                        <div class="col-sm-8">
                                            <select class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" aria-label="Default select example" id="nama">
                                                @foreach ($namasiswa as $p)
                                                    <option value="{{ $p->id }}" data-kelas='{{ $p->kelas }}'
                                                        <?php if ($data->nama == $p->id) {
                                                            echo 'selected';
                                                        } ?>>{{ $p->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="kategori" class="col-sm-4 col-form-label">Kelas </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                                name="kelas" value="{{ $data->kelas }}" readonly>
                                            @error('kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="kodebuku" class="col-sm-4 col-form-label">Judul Buku :</label>
                                        <div class="col-sm-8">
                                            <select class="form-control @error('namabuku') is-invalid @enderror"
                                                name="namabuku" aria-label="Default select example">
                                                @foreach ($namabuku as $p)
                                                    <option value="{{ $p->id }}" <?php if ($data->namabuku == $p->id) {
                                                        echo 'selected';
                                                    } ?>>
                                                        {{ $p->namabuku }}</option>
                                                @endforeach
                                            </select>
                                            @error('namabuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="penerbit" class="col-sm-4 col-form-label">Tanggal Peminjaman
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                class="form-control @error('tanggalpinjam') is-invalid @enderror"
                                                id="tanggalpinjam" name="tanggalpinjam"
                                                value="{{ $data->tanggalpinjam }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="tahunterbit" class="col-sm-4 col-form-label">Tanggal Pengembalian
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="date"
                                                class="form-control @error('tanggalpengembalian') is-invalid @enderror"
                                                id="tanggalpengembalian" name="tanggalpengembalian"
                                                value="{{ $data->tanggalpengembalian }}" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Buku </label>
                                        <div class="col-sm-8">
                                            <input type="number"
                                                class="form-control @error('jumlah') is-invalid @enderror"
                                                id="jumlah" name="jumlah" value="{{ $data->jumlah }}">
                                            @error('jumlah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <center> <button type="submit" class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span class="text">Edit Peminjaman</span>
                                        </button></center>
                                    <!-- <button type="submit"  class="btn btn-primary">Tambah</button> -->
                                    <!--  <a href="/peminjaman" class="btn btn-primary fas fa-arrow-circle-left">Kembali</a> -->
                                </form>
                                <center> <a href="/peminjaman" class="btn btn-dark btn-icon-split col-sm-3 mb-3">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-circle-left"></i>
                                            </span>
                                            <span class="text">Kembali</span>
                                         </a>
                                </center>
                            </div>
                        </div>
                    </div>
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
        {{-- @include('template.footer') --}}
    </div>
    <!-- end wrapper -->
    @include('template.script')

    <script type="text/javascript">
        const selection = document.getElementById('nama');
        selection.onchange = function(e) {
                const kelas = e.target.options[e.target.selectedIndex].dataset.kelas
                document.getElementById('kelas').value = kelas;
        }
    </script>
</body>

</html>
