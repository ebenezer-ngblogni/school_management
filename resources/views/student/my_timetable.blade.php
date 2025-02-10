@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Emploi du temps</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $hasClasses = false;
                        foreach($getRecord as $value) {
                            if(!empty($value['week'])) {
                                foreach($value['week'] as $week) {
                                    if(!empty($week['start_time']) || !empty($week['end_time']) || !empty($week['room_number'])) {
                                        $hasClasses = true;
                                        break 2;
                                    }
                                }
                            }
                        }
                    @endphp

                    @if($hasClasses)
                        @foreach($getRecord as $value)
                            @php
                                $hasTimeSlots = false;
                                foreach($value['week'] as $week) {
                                    if(!empty($week['start_time']) || !empty($week['end_time']) || !empty($week['room_number'])) {
                                        $hasTimeSlots = true;
                                        break;
                                    }
                                }
                            @endphp

                            @if($hasTimeSlots)
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $value['name'] }}</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Jour</th>
                                                    <th>Heure de début</th>
                                                    <th>Heure de fin</th>
                                                    <th>Numéro de salle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($value['week'] as $valueW)
                                                    @if(!empty($valueW['start_time']) || !empty($valueW['end_time']) || !empty($valueW['room_number']))
                                                        <tr>
                                                            <td>{{ $valueW['week_name'] }}</td>
                                                            <td>{{ !empty($valueW['start_time']) ? date('H:i', strtotime($valueW['start_time'])) : '' }}</td>
                                                            <td>{{ !empty($valueW['end_time']) ? date('H:i', strtotime($valueW['end_time'])) : '' }}</td>
                                                            <td>{{ $valueW['room_number'] }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center py-5">
                                    <div class="mb-4">
                                        <i class="bi bi-calendar-x text-muted" style="font-size: 4rem;"></i>
                                    </div>
                                    <h4 class="text-muted mb-3">Aucun emploi du temps trouvé</h4>
                                    <p class="text-muted mb-4">Vous n'avez pas encore de cours planifiés dans votre emploi du temps.</p>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button onclick="window.location.reload()" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-clockwise me-2"></i>Rafraîchir la page
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection