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
                        <div class="breadcrumb-title pe-3">Daftar Anggota</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="petugas"><i
                                                class="fadeIn animated bx bx-group"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Petugas/TambahPetugas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="row">
                                <form action="/tambahpetugaspost" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="username" class="col-sm-4 col-form-label">Nama Lengkap :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="name">Username :</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                id="username" name="username" value="{{ old('username') }}"
                                                placeholder="Username">
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="notelepon">No. Telepon :</label>
                                            <input type="number"
                                                class="form-control @error('notelepon') is-invalid @enderror"
                                                id="notelepon" name="notelepon" value="{{ old('notelepon') }}"
                                                placeholder="No.Telpon">
                                            @error('notelepon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-3">
                                        <label for="email" class="col-sm-4 col-form-label">Email :</label>
                                        <div class="col-sm-8">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{ old('email') }}" placeholder="Masukan Email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="password" class="col-sm-4 col-form-label">Passwoard :</label>
                                        <div class="col-sm-8">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" value="{{ old('password') }}"
                                                placeholder="Passwoard ">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="foto" class="col-sm-4 col-form-label">Foto :</label>
                                        <div class="col-sm-8">
                                            <input type="file"
                                                class="form-control @error('foto') is-invalid @enderror" id="foto"
                                                name="foto" value="{{ old('foto') }}" placeholder="Passwoard ">
                                            @error('foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-body">
                                            <center> <button type="submit" class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                                    <span class="text">Tambah Petugas</span>
                                                </button>
                                                <div class=" mb-3">
                                                    <a href="petugas" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                                        <span class="text">Kembali</span>
                                                    </a>
                                            </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card radius-15" style="width: 30%; float: right; height: 1000%;">
                        <div class="card-body">
                            <div class="form-group row mb-3" style="height: 100%; ">
                                <label for="foto" class="col-sm-4 col-form-label">Foto :</label>
                                <div class="col-sm-8">
                                    <img style="height: 10000%" src="" alt="">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" value="{{ old('foto') }}"
                                        placeholder="Passwoard ">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
    @include('template.footer')
    </div>
    <!-- end wrapper -->
    @include('template.script')
</body>

</html>
