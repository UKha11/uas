@extends('layouts.admin')

@section('content')
<div class="am-mainpanel">

    <div class="am-pagetitle">
      <h5 class="am-title">Data Event</h5>
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
    </div><!-- am-pagetitle -->

    @if (session('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div>
    @endif
    @if ($errors->any())
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    <div class="am-pagebody">
        <div class="card pd-20 pd-sm-40">
            <div class="table-responsive">
              <table class="table mg-b-0">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama Event</th>
                    <th>Tema</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Htm</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tema }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->waktu }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->htm }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('event.show', $item->id) }}">+Peserta</a>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{ $item->id }}">Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{ $item->id }}">Hapus</button>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!-- MODAL TAMBAH -->
        <div id="modalTambah" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('event.store') }}" method="POST">
                    @csrf
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Form Input</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                        <label class="form-control-label">Nama Event: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan nama event" name="nama" required>
                        <label class="form-control-label">Tema:</label>
                        <input type="text" class="form-control" placeholder="Masukkan tema" name="tema">
                        <label class="form-control-label">Tanggal: <span class="tx-danger">*</span></label>
                        <input type="date" class="form-control" placeholder="Masukkan tanggal" name="tanggal" required>
                        <label class="form-control-label">Waktu: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan waktu" name="waktu" required>
                        <label class="form-control-label">Tempat: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan tempat" name="tempat" required>
                        <label class="form-control-label">Htm:</label>
                        <input type="number" min="0" class="form-control" placeholder="Masukkan htm" name="htm">
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Simpan</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">batal</button>
                    </div>
                </form>
            </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- MODAL EDIT -->
        @foreach ($data as $item)
        <div id="modalEdit{{ $item->id }}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('event.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Form Input</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                        <label class="form-control-label">Nama Event: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan nama event" name="nama" value="{{ $item->nama }}" required>
                        <label class="form-control-label">Tema: </label>
                        <input type="text" class="form-control" placeholder="Masukkan tema" name="tema" value="{{ $item->tema }}">
                        <label class="form-control-label">Tanggal: <span class="tx-danger">*</span></label>
                        <input type="date" class="form-control" placeholder="Masukkan tanggal" name="tanggal" value="{{ $item->tanggal }}" required>
                        <label class="form-control-label">Waktu: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan waktu" name="waktu" value="{{ $item->waktu }}" required>
                        <label class="form-control-label">Tempat: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan tempat" name="tempat" value="{{ $item->tempat }}" required>
                        <label class="form-control-label">Htm:</label>
                        <input type="number" min="0" class="form-control" placeholder="Masukkan htm" name="htm" value="{{ $item->htm }}">
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Simpan</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">batal</button>
                    </div>
                </form>
            </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        @endforeach

        <!-- MODAL HAPUS -->
        @foreach ($data as $item)
        <div id="modalHapus{{ $item->id }}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('event.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Pesan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                    <h4 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Hapus data</a></h4>
                    <p class="mg-b-5">Yakin menghapus data?</p>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Ya</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        @endforeach
    </div><!-- am-pagebody -->
  </div><!-- am-mainpanel -->
@endsection
