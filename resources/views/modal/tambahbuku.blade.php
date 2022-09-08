<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3>Tambah Buku</h3>
          </div>
          <form id="editUserForm" class="row g-3" action="/tambahbukupost" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label class="form-label" for="basic-default-name">Nama Buku</label>
        
                  <input type="text" class="form-control" id="basic-default-name" placeholder="Laskar Pelangi" name="nama" />
            </div>
            <div class="col-12">
                <label class="form-label" for="basic-default-name">Kategori Buku</label>

                    <select id="datavilla" class="form-control @error('kategori') is-invalid @enderror"
                    name="kategori" aria-label="Default select example">
                    <option value="" disabled selected>Pilih Kategori</option>
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
            <div class="col-12">
                <label class="form-label" for="basic-default-name">Kode Buku</label>
                  <input type="text" class="form-control" id="basic-default-name" placeholder="001BK" name="kodebuku" />
            </div>
            <div class="col-12">
                <label class="form-label" for="basic-default-name">Penerbit</label>
                  <input type="text" class="form-control" id="basic-default-name" placeholder="Erlangga" name="penerbit" />
               
            </div>
            <div class="col-12">
                <label class="form-label" for="basic-default-phone">Tahun Terbit</label>
             
                  <input
                    type="number"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder="2021"
                    aria-describedby="basic-default-phone"
                    name="tahunterbit"
                  />
            </div>
            <div class="col-12 ">
                <label class="form-label" for="basic-default-phone">Jumlah Buku</label>
                   
                            <input
                              type="number"
                              id="basic-default-phone"
                              class="form-control phone-mask"
                              placeholder="10"
                              aria-describedby="basic-default-phone"
                              name="jumlah"
                            />
   
            </div>
            <div class="col-12">
                <label class="form-label" for="basic-default-message">Deskripsi</label>
                  <textarea
                    id="basic-default-message"
                    class="form-control"
                    placeholder="Hi, Do you have a moment to talk Joe?"
                    aria-label="Hi, Do you have a moment to talk Joe?"
                    aria-describedby="basic-icon-default-message2"
                    name="deskripsi"
                  ></textarea>
             
            </div>
            <div class="col-12">
                <label class="form-label" for="basic-default-name">Foto Buku</label>
             
                  <input type="file" class="form-control" id="basic-default-name" name="foto" />
       
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