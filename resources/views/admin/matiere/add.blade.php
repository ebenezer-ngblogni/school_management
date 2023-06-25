@extends('layouts.app')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter une nouvelle matière</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">

              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label>Nombre de crédits</label>
                    <input type="number" class="form-control" value="{{ old('credit') }}" name="credit" required placeholder="Crédits">
                  </div>
                  <div class="form-group">
                    <label>Semestre</label>
                    <input type="number" class="form-control" value="{{ old('semestre') }}" name="semestre" required placeholder="Semestre">
                  </div>
                  <div class="form-group">
                    <label>Masse horaire</label>
                    <input type="number" class="form-control" value="{{ old('duree') }}" name="duree" required placeholder="Masse Horaire">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

