<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Edit Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="table-responsive">
                                        <form action="" method="POST" class="from-buku">
                                            @csrf
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>

                                                    <th>
                                                        <input type="checkbox" name="select_all" id="select_all">
                                                    </th>
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
                                                    @foreach ($buku as $row)
                                                        <tr>
                                                            <td><input type="checkbox" id="example" name="id[]" value="{{$row->id}}">
                                                            </td>
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
                                                            
                                                            <td class="b">
                                                                <a href="/editbuku/{{ $row->id }}" 
                                                                    class="btn btn-success">
                                                                    <i class="fa-solid fa-square-pen"></i>
                                                                </a>
                                                            </td>
                                                            
                                                        </tr>
                                                        
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </form>
                                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
