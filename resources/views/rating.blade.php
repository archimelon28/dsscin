@extends('base')
@section('content')
	<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kampus</h3>
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
                      <th style="width: 8%">
                      	Rating
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @php $no = 1 @endphp
                @foreach($sort_rating as $data)
                <tr>
                  <td>
                    {{$no++}}
                  </td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->gambar}}</td>
                  <td>{{$data->ukt}}</td>
                  <td>{{$data->akreditas}}</td>
                  <td>{{$data->sarana_prasarana}}</td>
                  <td>{{$data->rating}} </td>
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