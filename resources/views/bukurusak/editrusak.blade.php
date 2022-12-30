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
                        <div class="breadcrumb-title pe-3">Edit Buku</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i
                                                class='fadeIn animated bx bx-list-ul'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Buku/Edit Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="">
                                <form action="/editrusakpost/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="kategori" class="col-sm-4 col-form-label">Kode Buku :</label>
                                        <div class="col-sm-8">
                                           
                                            <select id="kodebuku" class="form-control @error('kodebuku') is-invalid @enderror"
                                                name="kodebuku" aria-label="Default select example">
                                                @foreach ($buku as $row)
                                                    <option value="{{ $data->kodebuku }}" data-namabuku='{{ $row->namabuku }}' <?php if ($data->kodebuku == $row->id) {
                                                        echo 'selected';
                                                    }  ?>>
                                                        {{ $row->kodebuku }}</option>
                                                @endforeach
                                            </select>
                                            @error('kodebuku')
                                                <div class="invalid-feedback">
                                                    Silahkan Pilih No Kode Buku
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-3">
                                        <label for="namabuku" class="col-sm-4 col-form-label">Nama Buku :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('namabuku') is-invalid @enderror"
                                                id="namabuku" name="namabuku" value="{{$data->namabuku}}" required>
                                            @error('namabuku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-3">
                                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Buku :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                                                id="jumlah" name="jumlah" value="{{$data->jumlah}}" required>
                                            @error('jumlah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <center><button  class="btn btn-info  col-sm-3 mb-0" >
                                        <span class="text">Simpan</span>
                                    </button>
                                    </center>
                                </form>
                                <!-- <center>
                                    <a href="/rusak" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                        <span class="text">Kembali</span>
                                    </a>
                                </center> -->

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
</body>

<script>
    const selection = document.getElementById('kodebuku')
    selection.onchange = function(e){
        const namabuku = e.target.options[e.target.selectedIndex].dataset.namabuku
        document.getElementById('namabuku').value = namabuku;
    }
</script>

</html>
