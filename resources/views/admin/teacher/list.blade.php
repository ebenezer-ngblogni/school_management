@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liste des enseignants (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Ajouter un enseignant</a>
          </div>


        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-md-12">
          {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search Student</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">

                <div class="form-group col-md-2">
                  <label>Name</label>
                  <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-2">
                  <label>Email</label>
                  <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Email">
                </div>
                <div class="form-group col-md-2">
                    <label>Matricule</label>
                    <input type="text" class="form-control" value="{{ Request::get('matricule') }}" name="matricule" placeholder="Matricule">
                  </div>



              <div class="form-group col-md-3">
                <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                <a href={{ url('admin/teacher/list') }} class="btn btn-success" style="margin-top: 30px;">Reset</a>

              </div>
            </div>
            </div>
        </form>
        </div> --}}

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des enseignants</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th >#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Statut</th>
                        <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($getRecord as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->first_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->statut }}</td>
                                <td>
                                    <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>

            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection

