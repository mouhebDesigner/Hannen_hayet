@extends('layouts.master')


@section('content')
<div class="wrapper">
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un technicien 
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire d'ajout</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('directeur/techniciens/'.$technicien->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="name">Nom de technicien</label>
                                    <input type="text" class="form-control" name="name" value="{{ $technicien->name }}" id="name" placeholder="Saisir nom de technicien">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="specialite">Spécialité de technicien</label>
                                    <input type="text" class="form-control" name="specialite" value="{{ $technicien->specialite }}" id="name" placeholder="Saisir spécialité de technicien">
                                    @error('specialite')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <label for="email">Email de technicien</label>
                                    <input type="text" class="form-control" name="email" value="{{ $technicien->email }}" id="email" placeholder="Saisir email de technicien">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe  de technicien</label>
                                    <input type="password" class="form-control" name="password" value="{{ $technicien->password }}" id="password" placeholder="Saisir mot de passe de technicien">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer la Mot de passe</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ $technicien->password }}" id="password" placeholder="Saisir password de technicien">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="numtel">Numéro de téléphone de technicien</label>
                                    <input type="number" class="form-control" name="numtel" value="{{ $technicien->numtel }}" id="numtel" placeholder="Saisir numéro de téléphone de technicien">
                                    @error('numtel')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                              
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-info">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection
