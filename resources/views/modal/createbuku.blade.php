{{-- <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="CreateBuku" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <center><h4 class="modal-title">{{__('Tambah Kategori')}}</h4></center> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                         <span aria-hidden="true">&times;</span>  
                </div>        
                        <div class="modal-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label class=" col-form-label" >Kategori Buku</label>
                                <div class="from-grup">
                                  <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" name="kategori" />
                                </div>
                              </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Tambah</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                          </div>
                
            </div>
        </div>
    </div>
</form> --}}

<div class="modal fade" id="CreateBuku" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="address-title">Tambah Kategori Buku Baru</h3>
          </div>
          <form id="CreateBuku" class="row g-3" action="/tambahkategoripost" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label class=" col-form-label" >Kategori Buku</label>
                    <div class="from-grup">
                      <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" name="kategori">
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>