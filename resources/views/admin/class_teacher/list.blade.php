@extends('layouts.app')

@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listes des assignations</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/class_teacher/add') }}" class="btn btn-primary">Ajouter une nouvelle association</a>
          </div>


        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-md-12">


            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listes des associations</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Filieres</th>
                      <th>Enseignants</th>
                      {{-- <th>Matières</th> --}}
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->filiere_name }}</td>
                            <td>{{ $value->teacher_name }}</td>
                            <td>
                                <a href="{{ url('admin/class_teacher/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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

