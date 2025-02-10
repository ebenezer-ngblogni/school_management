@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Emploi du temps</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rechercher un emploi du temps</h3>
                    </div>
                    <form method="get" action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Filière</label>
                                    <select class="form-control getClass" name="class_id" required>
                                        <option value="">Select</option>
                                        @foreach ($getClass as $class)
                                            <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Matière</label>
                                    <select class="form-control getSubject" id="getS" name="subject_id" required>
                                        <option value="">Select</option>
                                        @if (!empty($getSubject))
                                            @foreach ($getSubject as $subject)
                                                <option
                                                    {{ Request::get('subject_id') == $subject->matiere_id ? 'selected' : '' }}
                                                    value="{{ $subject->matiere_id }}">{{ $subject->matiere_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                    <a href={{ url('admin/class_timetable/list') }} class="btn btn-success"
                                        style="margin-top: 30px;">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                @include('_message')

                @if (!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
                    <form action="{{ url('admin/class_timetable/add') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                        <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Filière-Emploi du temps</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <!-- ... rest of the table code ... -->
                                </table>
                                <div style="text-align: right; padding:20px">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="bi bi-calendar3 text-muted" style="font-size: 4rem;"></i>
                                </div>
                                {{-- <h4 class="text-muted mb-3">Aucun emploi du temps à afficher</h4> --}}
                                {{-- <p class="text-muted">Veuillez sélectionner une filière et une matière pour continuer</p> --}}
                                <h4 class="text-muted mb-3">Veuillez sélectionner une filière et une matière pour continuer</h4>
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
@endsection

@section('script')
    <script type="text/javascript">
        $('.getClass').change(function() {
            var class_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/class_timetable/get_subject') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    class_id: class_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.getSubject').html(response.html);
                },
            });
        });
    </script>
@endsection