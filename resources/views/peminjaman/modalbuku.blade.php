<div class="modal fade" id="buku-search">
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Buku</h4>
            </div>
            <div id="modal_body" class="modal-body fileSelection1">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                        @if (auth()->user()->role == 'admin')
                            <th>Aksi</th>
                        @endif

                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($buku as $row)
                            <tr>
                                <td><input type="checkbox" id="example" name="id[]" value="{{ $row->id }}">
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
                                <td> <img src="{{ asset('fotobuku/' . $row->foto) }}" alt=""
                                        style="width: 70px; height: 70px">
                                </td>
                                @if (auth()->user()->role == 'admin')
                                    <td class="b">
                                        <a href="/editbuku/{{ $row->id }}" class="btn btn-success">
                                            <i class="fa-solid fa-square-pen"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                            data-nama="{{ $row->nama }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
