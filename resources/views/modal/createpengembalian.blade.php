<div class="modal fade" id="CreatePengembalian" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="address-title">Pengembalian Buku</h3>
          </div>
          <form id="CreatePengembalian" class="row g-3" action="/tambahpengembalianpost" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label class=" col-form-label" >Nama Siswa</label>
                    <div class="from-grup">
                      <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" name="nama">
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col-12">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Kelas</label>
                        <div class="col-sm-10">
                          <div class="form-check form-check-inline ">
                            <input
                                class="form-check-input @error('kelas') is-invalid @enderror"
                                type="radio" name="kelas" id="inlineRadio1"
                                value="X">
                            <label class="form-check-label"
                                for="inlineRadio1">X</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input
                                class="form-check-input @error('kelas') is-invalid @enderror"
                                type="radio" name="kelas" id="inlineRadio1"
                                value="XI">
                            <label class="form-check-label"
                                for="inlineRadio1">XI
                        </div>
                        <div class="form-check form-check-inline ">
                            <input
                                class="form-check-input @error('kelas') is-invalid @enderror"
                                type="radio" name="kelas" id="inlineRadio1"
                                value="XII">
                            <label class="form-check-label"
                                for="inlineRadio1">XII
                        </div>
                  </div>
                </div>  
            </div>
            <div class="col-12">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label class=" col-form-label" >Nama Buku</label>
                    <div class="from-grup">
                      <input type="text" class="form-control" id="basic-default-name" placeholder="Senja Yang Inda" name="namabuku">
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col-12">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label class=" col-form-label" >Tgl.Pengembalian</label>
                    <div class="from-grup">
                      <input type="date" class="form-control" id="basic-default-name" name="tanggalpengembalian">
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col-12">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label class=" col-form-label" >Jumlah</label>
                    <div class="from-grup">
                      <input type="number" class="form-control" id="basic-default-name" placeholder="100" name="jumlah">
                      @error('jumlah')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col- text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('templates.script')

  <script>
    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
    @endif
</script>