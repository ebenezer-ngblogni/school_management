@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Télécharger des documents de vos cours</h1>
                    </div>
                </div>
            </div>
        </section>

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
                    <div class="card-body">
                        @php
                            $hasDocuments = false;
                            foreach($getStart as $value) {
                                if(count($value) > 0) {
                                    $hasDocuments = true;
                                    break;
                                }
                            }
                        @endphp

                        @if($hasDocuments)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Matières</th>
                                        <th>Fichiers</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getStart as $value)
                                        @foreach($value as $val)
                                            <tr>
                                                <td>{{ $val->matiere_name }}</td>
                                                <td>{{ $val->file_name }}</td>
                                                <td>
                                                    <a href="{{ url($val->file_path) }}" 
                                                       download 
                                                       class="btn btn-warning">
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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
                </div>
            </div>
        </section>
    </div>
@endsection