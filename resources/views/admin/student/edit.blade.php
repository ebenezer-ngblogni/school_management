@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit  heyStudent</h1>
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

              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label>Nom<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name="name" required placeholder="Nom">
                          <div style="color:red">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Prénom<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('first_name', $getRecord->first_name) }}" name="first_name" required placeholder="Prénom">
                            <div style="color:red">{{ $errors->first('first_name') }}</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Date de naissance<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" name="date_of_birth" placeholder="Date de naissance">
                            <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Sexe<span style="color: red;">*</span></label>
                                <select class="form-control" required name="gender">
                                    <option value="{{ old('gender', $getRecord->gender) }}">Select Gender</option>
                                    <option {{ (old('gender') == 'M') ? 'selected' : ''}} value="M">Homme</option>
                                    <option {{ (old('gender') == 'F') ? 'selected' : ''}} value="F">Femme</option>
                                </select>
                        </div>
                    </div>

                        <div class="form-group col-md-6">
                            <label>Numéro matricule</label>
                            <input type="text" class="form-control" value="{{ old('matricule', $getRecord->matricule) }}" name="matricule" placeholder="Matricule">
                            <div style="color:red">{{ $errors->first('matricule') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Filière<span style="color: red;">*</span></label>
                            <select class="form-control" required name="filiere_id">
                                <option value="{{ old('filiere_id', $getRecord->filiere_id) }}">Choisir la filière </option>
                                @foreach ($getClass as $value)
                                    <option {{ (old('filiere_id') == $value->id ) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                <hr>

                <div class="form-group col-md-6">
                    <label>Adresse email<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}" name="email" required placeholder="Email">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                </div>

                  <div class="form-group col-md-6">
                    <label>Mot de passe<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="password"  placeholder="Password">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

