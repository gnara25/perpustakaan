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
                <br>
                <div class="container" style="display: flex;">
                    <div class="from-control " style="margin-left: auto;">
                        <i class="fa-solid fa fa-search btn btn-info"></i>
                        <input type="search" name="cari" id="cari" placeholder="Scan Kode">
                    </div>
                </div>
                <div class="modal-body fileSelection1">
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>Judul Buku </th>
                                <th>Kategori Buku</th>
                                <th>Kode Buku</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Jumlah</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody class="data">
                                @foreach ($bukuid as $row)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $row->namabuku }}</td>
                                        <td>{{ $row->kategori }}</td>
                                        <td>{{ $row->kodebuku }}</td>
                                        <td>{{ $row->penerbit }}</td>
                                        <td>{{ $row->tahunterbit }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td> <img src="{{ asset('fotobuku/' . $row->foto) }}" alt=""
                                                style="width: 50px; height: 50px">
                                        </td>

                                        <td style="width:17%">
                                            {{-- <input type="hidden" value="{{ $row->id }}" name="id">
                                            <input type="hidden" value="{{ $row->namabuku }}" name="namabuku">
                                            <input type="hidden" value="{{ $row->kodebuku }}" name="kodebuku">
                                            <input type="hidden" value="1" name="quantity"> --}}

                                            <button class="btn btn-primary" id="Select_File2" onclick="tambah(this)"
                                                data-id="{{ $row->id }}" data-nama="{{ $row->namabuku }}"
                                                data-kode="{{ $row->kodebuku }}" data-bs-dismiss="modal">
                                                <i class="fa fa-check"> </i> Pilih
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tbody id="conten" class="caridata"></tbody>

                        </table>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

z    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
        $('#cari').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.data').hide();
                $('.caridata').show();
            } else {
                $('.data').show();
                $('.caridata').hide();
            }
            $.ajax({

                type: 'GET',
                url: '{{ URL::to('cari') }}',
                data: {
                    'cari': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#conten').html(data);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#cari').val("").focus();
            $('#cari').keyup(function(e) {
                var tex = $(this).val();
                console.log(tex);
                if (tex !== "" && e.keyCode === 13) {

                    $('#cari').focus();
                }
                e.preventDefault();
            });
            $('#pilihBuku').click(function() {
                $('#cari').val("").focus();
            });
        });
    </script>
