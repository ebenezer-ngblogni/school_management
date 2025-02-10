@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste de mes étudiants (Total : {{ $getRecord->total() }})</h1>
                </div>
            </div>
        </div>
    </section>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste de mes étudiants</h3>
                </div>
                <div class="card-body p-0">
                    @if($getRecord->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Matricule</th>
                                    <th>Filiere</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->first_name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->matricule }}</td>
                                        <td>{{ $value->filiere_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="padding: 10px; float: right;">
                            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                        </div>
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
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .empty-state {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 2rem;
    }
    
    .btn-outline-secondary:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
    
    /* Animation pour l'icône de rafraîchissement */
    .btn:hover .bi-arrow-clockwise {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
</style>
@endpush