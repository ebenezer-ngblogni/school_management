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
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-md-12">


        <div class="card">
            <div class="card-header">
            {{-- <h3 class="card-title">{{ $value['name'] }}</h3> --}}
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                  <th >Jour</th>
                  <th >Filière</th>
                  <th >Matière</th>
                  <th >Heure de début</th>
                  <th >Heure de fin</th>
                  <th >Numéro de salle</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($total as $value)
                        <tr>
                            <td>{{ $value['week_name'] }}</td>
                            <td>{{ $value['filiere_name'] }}</td>
                            <td>{{ $value['matiere_name'] }}</td>
                            <td>{{ $value['start_time'] }}</td>
                            <td>{{ $value['end_time'] }}</td>
                            <td>{{ $value['room_number'] }}</td>
                        </tr>

                    @endforeach
              </tbody>
            </table>
        </div>
    </div>
    </form>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



@endsection


