@extends('layouts.app')

@section('content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mes matières</h1>
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
                        <h3 class="card-title">Listes des matières </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if ($getRecord->count() > 0)

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Nombre de Crédits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->matiere_name }}</td>
                                            <td>{{ $value->credit }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="bi bi-people-fill text-muted" style="font-size: 4rem;"></i>
                                </div>
                                <h4 class="text-muted mb-3">Aucun étudiant trouvé</h4>
                                <p class="text-muted mb-4">Vous n'avez pas encore d'étudiants dans votre liste.</p>
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
