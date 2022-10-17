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
                <div class="modal-body fileSelection1">
                     <div class="table-responsive">
                                            @csrf
                                            <table id="mytable" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>
                                                            <input type="checkbox" name="select_all" id="select_all">
                                                        </th> --}}
                                                        <th>No.</th>
                                                        <th>Foto</th>
                                                        <th>Nisn</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Tgl.Lahir</th>
                                                        <th>Kelas</th>
                                                        <th>Alamat</th>
                                                        <th>Qr Code</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($anggota as $row)
                                                        <tr>
                                                            {{-- <td><input type="checkbox" id="example" name="id[]" value="{{$row->id}}">
                                                            </td> --}}
                                                            <td scope="row">{{ $no++ }}</td>
                                                            <td><img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px"></td>
                                                            <td>{{ $row->nisn }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}
                                                            </td>
                                                            <td>{{ $row->kelas }}</td>
                                                            <td>{{ $row->alamat }}</td>
                                                            <td> {!! QrCode::size(100)->generate($row->nisn) !!}
                                                            </td>
                                                            <td style="width:20%;">
                                                                <button class="btn btn-primary" id="Select_File1" data_id="<?= $row['nisn'];?>">
                                                                <i class="fa fa-check"> </i> Pilih
                                                                </button>
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
 