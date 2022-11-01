<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="ModalBk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fileSelection1">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>No.</th> --}}
                                    <th>Judul Buku</th>
                                    <th>Kode Buku</th>
                                    <th>Jumlah</th>
                                    <th>Denda perHAri</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody id="tbody-cartbuku">
                                @foreach ( $data as $buku)
                                    <tr>
                                        {{-- <td>{{ $no++ }}</td> --}}
                                        <td>{{ $buku->namabuku }}</td>
                                        <td>{{ $buku->kodebuku }}</td>
                                        <td>{{ $buku->jumlah }}</td>
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
    

