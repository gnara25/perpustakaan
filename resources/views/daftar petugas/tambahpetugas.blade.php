<!DOCTYPE html>
<html lang="en">

@include('template.head')

<style type="text/css">
    .foto {
        text-align: center;
    }
    input{
        display: none;
    }
    img{
        max-width: 100px;
        margin-bottom: 2%;
		display: none;
    }
    /* label.image-button{
        display: block;
    } */
    .ngengkel{
        display: block !important;
    }
    span.change-image{
        display: none;
		text-align: left;
		cursor: pointer;
    }

</style>

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
                                        <label for="foto" class="image-button col-sm-4 col-form-label ngengkel" >Foto :</label>
                                        <div class="col-sm-8">
                                            
                                            <img src="" class="image-preview">
                                            {{-- <span class="change-image">Choose </span> --}}
                                            <input type="file" accept="image/*" id="foto"
                                                class="form-control @error('foto') is-invalid @enderror" name="foto"
                                                value="{{ old('foto') }}">

                                            @error('foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <center> <button type="submit"
                                                class="btn btn-info btn-icon-split col-sm-3 mb-3">
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
                </div>
            </div>
        </div>

        <!--end page-content-wrapper-->
    </div>

    <!--end page-wrapper-->
    <!--start overlay-->
    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    @include('template.footer')
    </div>
    <!-- end wrapper -->
    @include('template.script')

    <script>
        $('#foto').on('change', function() {
            $input = $(this);
            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function(data) {
                    $('.image-preview').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                $('.image-button').css('display', 'none');
                $('.image-preview').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });

        $('.change-image').on('click', function() {
            $control = $(this);
            $('#foto').val('');
            $preview = $('.image-preview');
            $preview.attr('src', '');
            $preview.css('display', 'none');
            $control.css('display', 'none');
            $('.image-button').css('display', 'block');
        });
    </script>
</body>

</html>
