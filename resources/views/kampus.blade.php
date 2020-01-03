@extends('base')
@section('content')
	<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
              <a href="{{route('kampus.create')}} " title="">
              	<button type="button" class="btn btn-block btn-info btn-sm">Tambah Data</button>
              </a>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 10%">
                          Nama Kampus
                      </th>
                      <th style="width: 30%">
                          Gambar
                      </th>
                      <th style="width: 8%" class="text-center">
                          Akreditas
                      </th>
                      <th style="width: 8%" class="text-center">
                          UKT
                      </th>
                      <th style="width: 8%" class="text-center">
                          Sarana & Prasarana
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @php $no = 1 @endphp
                @foreach($kampus as $data)
                <tr>
                  <td>
                    {{$no++}}
                  </td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->gambar}}</td>
                  <td>{{$data->ukt}}</td>
                  <td>{{$data->akreditas}}</td>
                  <td>{{$data->sarana_prasarana}}</td>
                  <td>
                    <form action="{{ route('kampus.destroy', $data->id_kampus ) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                    <a  class="btn btn-sm btn-primary" href="{{ route('kampus.edit', $data->id_kampus) }}" title="">Edit</a>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau menghapus aku?')">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection