@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Télécharger des documents de vos cours</h1>
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
            @include('_message')


            </div>

          </div>

        </div>

        <div class="card">
            <div class="card-header">
              <h3 class="card-title"> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                      <th>Matières</th>
                      <th>Fichiers</th>
                  </tr>
                </thead>
                <tbody>
                      @foreach ($getStart as $value)
                            @foreach ($value as $val)
                                <tr>
                                    <td>{{ $val->matiere_name }}</td>
                                    <td>
                                        {{ $val->file_name }}
                                   </td>
                                   <td>
                                       <a download href="{{ url($val->file_path) }}" type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i>
                                       </span>Download</button>
                                   </td>

                                </tr>
                             @endforeach
                      @endforeach
                </tbody>
              </table>


          </div>
            <!-- /.card-body -->
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

