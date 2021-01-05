@extends('layouts.admin')

@section('content')
<div class="am-mainpanel">

    <div class="am-pagetitle">
      <h5 class="am-title">Data Peserta Event</h5>
    </div><!-- am-pagetitle -->

    @if (session('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div>
    @endif
    @if (session('failed'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        {{ session('failed') }}
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
            <div class="row row-sm mg-t-15 mg-sm-t-20">
                <div class="col-md-6">
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Data Event</h6>
                    <label class="form-control-label">Nama Event:</label>
                    <input type="text" value="{{ $event->nama }}" class="form-control" readonly>
                    <label class="form-control-label">Tema:</label>
                    <input type="text" value="{{ $event->tema }}" class="form-control" readonly>
                    <label class="form-control-label">Tanggal:</label>
                    <input type="text" value="{{ $event->tanggal }}" class="form-control" readonly>
                    <label class="form-control-label">Waktu:</label>
                    <input type="text" value="{{ $event->waktu }}" class="form-control" readonly>
                    <label class="form-control-label">HTM:</label>
                    <input type="text" value="{{ $event->htm }}" class="form-control" readonly>
                  </div><!-- card -->
                </div><!-- col-6 -->
                <div class="col-md-6">
                    <div class="card pd-20 pd-sm-40">
                      <h6 class="card-body-title">Data Pesera</h6>
                      <form action="{{ route('event.update', $event->id) }}" method="POST">
                          @csrf
                          @method('put')
                          <label class="form-control-label">Peserta:</label>
                          <select name="peserta" id="peserta" class="form-control" required>
                              <option>Pilih Peserta</option>
                              @foreach ($anggota as $item)
                                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                              @endforeach
                          </select>
                          <button type="submit" class="btn btn-success">Tambah</button>
                      </form>
                      <table class="table mg-b-0 mt-3">
                          <thead>
                            <tr>
                              <th>Nomor</th>
                              <th>Peserta</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($event->peserta as $item)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->nama }}</td>
                                  <td>
                                      <form action="{{ route('event.hapuspeserta', $event->id) }}" method="POST">
                                          @csrf
                                          @method('put')
                                          <input type="text" hidden name="id_peserta" value="{{ $item->id }}">
                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                      </form>
                                  </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                    </div><!-- card -->
                  </div><!-- col-6 -->
              </div>
        </div>
    </div><!-- am-pagebody -->
  </div><!-- am-mainpanel -->
@endsection
