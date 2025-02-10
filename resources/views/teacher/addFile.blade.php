@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ajouter des documents à vos cours</h1>
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

                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nom de la matière</label>
                                        <select class="form-control" name="filiere_id" required>
                                            <option value="">Select Class</option>
                                            @foreach ($getRecord as $subject)
                                                <option value="{{ $subject->matiere_id }}">{{ $subject->matiere_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Fichier<span style="color: red;">*</span></label>
                                        <input type="file" class="form-control" name="file" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="description">
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

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listes de vos ajouts</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if ($getStart->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Matières</th>
                                        <th>Fichiers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getStart as $value)
                                        <tr>
                                            <td>{{ $value->matiere_name }}</td>
                                            <td>
                                                {{ $value->file_name }}
                                            </td>
                                            <td>
                                                <a download href="{{ url($value->file_path) }}" type="button"
                                                    class="btn btn-rounded btn-warning"><span
                                                        class="btn-icon-left text-warning"><i
                                                            class="fa fa-download color-warning"></i>
                                                    </span>Download</button>
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
                                <h4 class="text-muted mb-3">Aucun document retrouvé</h4>
                                <div class="d-flex justify-content-center gap-2">
                                    <button onclick="window.location.reload()" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-clockwise me-2"></i>Rafraîchir la page
                                    </button>
                                </div>
                            </div>
                        @endif

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
