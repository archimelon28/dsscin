@extends('base')
@section('content')
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Kampus</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form action="{{route('kampus.store')}}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Kampus</label>
                <input type="text" id="inputName" name="nama" class="form-control">
              </div>
              <div class="custom-file">
                  <input  type="file" class="custom-file-input" name="gambar" id="customFile">
                  <label class="custom-file-label" for="customFile">Gambar</label>
				</div>
              <div class="form-group">
                <label for="inputName">UKT</label>
                <input type="text" id="inputName" name="ukt" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Akreditasi</label>
                <input type="text" id="inputName" name="akreditasi" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Sarana & Prasarana</label>
                <input type="text" id="inputName" name="sarana" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
@endsection