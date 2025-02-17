@extends('layouts.app')

@section('content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Listes des matières</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/matiere/add') }}" class="btn btn-primary">Ajouter une nouvelle matière</a>
                    </div>


                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rechercher une matière</h3>
                    </div>
                    <form method="get" action="" style="margin-bottom: 30px;">
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{ Request::get('name') }}"
                                        name="name" placeholder="Name">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Nombre de crédits</label>
                                    <input type="number" class="form-control" value="{{ Request::get('credit') }}"
                                        name="credit" placeholder="Credits">
                                </div>


                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href={{ url('admin/matiere/list') }} class="btn btn-success"
                                        style="margin-top: 30px;">Reset</a>

                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- </div> --}}

                    @include('_message')

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listes des matières </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            @if ($getRecord->count() > 0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Nombre de Crédits</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->credit }}</td>
                                                <td>
                                                    <a href="{{ url('admin/matiere/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/matiere/delete/' . $value->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="text-center py-5">
                                    <div class="mb-4">
                                        <i class="bi bi-people-fill text-muted" style="font-size: 4rem;"></i>
                                    </div>
                                    <h4 class="text-muted mb-3">Aucune matière trouvée</h4>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button onclick="window.location.reload()" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-clockwise me-2"></i>Rafraîchir la page
                                        </button>
                                    </div>
                                </div>
                            @endif
                            {{-- <div style="padding: 10px; float: right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div> --}}
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
