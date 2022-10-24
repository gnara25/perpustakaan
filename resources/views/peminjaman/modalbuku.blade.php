<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="Bukuid" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Daftar Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fileSelection1">
                     <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Judul Buku </th>
                                                    <th>Kategori Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>Penulis Buku</th>
                                                    <th>Penerbit</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Halaman Buku</th>
                                                    <th>Jumlah</th>
                                                    <th>Lokasi Buku</th>
                                                    <th>Deskripsi</th>
                                                    <th>Foto</th>
                                                          
                                                    <th>Aksi</th>
                                                    

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ( $bukuid as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->namabuku }}</td>
                                                            <td>{{ $row->idkategori->kategori }}</td>
                                                            <td>{{ $row->kodebuku }}</td>
                                                            <td>{{ $row->penulis }}</td>
                                                            <td>{{ $row->penerbit }}</td>
                                                            <td>{{ $row->tahunterbit }}</td>
                                                            <td>{{ $row->halbuku }}</td>
                                                            <td>{{ $row->jumlah }}</td>
                                                            <td>{{ $row->lokasibuku }}</td>
                                                            <td>{{ $row->deskripsi }}</td>
                                                            <td> <img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px">
                                                            </td>
                                                            
                                                            <td style="width:17%">
                                                                   <!--    <button class="btn btn-primary"    id="Select_File2" data_id="{{ $row->kodebuku }}">
                                                                <i class="fa fa-check"> </i> Pilih
                                                                </button>  -->
                                                            <form action="/cartpost" method="POST" id="form-tambah" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" value="{{ $row->id }}" name="id">
                                                                <input type="hidden" value="{{ $row->namabuku }}" name="namabuku">
                                                                <input type="hidden" value="{{ $row->kodebuku }}" name="kodebuku">
                                                                <input type="hidden" value="1" name="quantity">
                        

                                                                 <button class="btn btn-primary"    id="Select_File2" data_id="{{$row->kodebuku}}" data-bs-dismiss="modal">
                                                                <i class="fa fa-check"> </i> Pilih
                                                                </button>
                                                             <!--    <a href="" target="_blank">
                                                                <button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a> -->
                                                            </form>    
                                                            </td>
                                                            
                                                        </tr>
                                                       
                                             
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        
                                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>