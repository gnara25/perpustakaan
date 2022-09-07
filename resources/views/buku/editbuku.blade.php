
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Perpustakaan || Kita</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    @include('template.head')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('template.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

            @include('template.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><a href="/buku" class="text-muted fw-light">Daftar Buku</a> </h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Buku</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form action="/editbukupost/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Buku</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" name="nama" value="{{$data->nama}}"  />
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Kategori Buku</label>
                            <div class="col-sm-10">
                                <select id="datavilla" class="form-control @error('kategori') is-invalid @enderror"
                                name="kategoribuku" aria-label="Default select example">
                                <option value=""></option>
                                @foreach ($idkategori as $kategori)
                                    <option value="{{ $kategori->id }}" >
                                        {{ $kategori->kategori }}</option>
                                @endforeach
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        Silahkan Pilih No kategori
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Kode Buku</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-name" name="kodebuku" value="{{$data->kodebuku}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Penerbit</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-name" name="penerbit" value="{{$data->penerbit}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Tahun Terbit</label>
                          <div class="col-sm-10">
                            <input
                              type="number"
                              id="basic-default-phone"
                              class="form-control phone-mask"
                              aria-describedby="basic-default-phone"
                              name="tahunterbit"
                              value="{{$data->tahunterbit}}"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Jumlah Buku</label>
                          <div class="col-sm-10">
                            <input
                              type="number"
                              id="basic-default-phone"
                              class="form-control phone-mask"
                              aria-describedby="basic-default-phone"
                              name="jumlah"
                              value="{{$data->jumlah}}"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi</label>
                          <div class="col-sm-10">
                            <textarea
                              id="basic-default-message"
                              class="form-control"
                              aria-label="Hi, Do you have a moment to talk Joe?"
                              aria-describedby="basic-icon-default-message2"
                              name="deskripsi"
                              value="{{$data->deskripsi}}"
                            ></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Foto Buku</label>
                            <div class="col-sm-10">
                                <img class="img mb-3" src="{{ asset('fotobuku/' . $data->foto) }}" alt=""
                                style="width: 100px; height: 100px;">
                              <input type="file" class="form-control" id="basic-default-name" name="foto" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('template.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    @include('template.script')
  </body>
</html>
