@extends('layouts.master')


@section('content')
<div class="wrapper">
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Modifier un matériel 
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
                        <form action="{{ url('directeur/materiels/'.$materiel->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categorie">Catégorie</label>
                                    <select name="categorie" id="categorie" class="form-control">
                                        <option value="" selected disbaled>Choisir catégorie</option>
                                        <option value="papier" @if($materiel->categorie == "papier") selected @endif>Papier</option>
                                        <option value="materiel" @if($materiel->categorie == "materiel") selected @endif>Matériel</option>
                                    </select>
                                    @error('categorie')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom de materiel</label>
                                    <input type="text" class="form-control" name="nom" value="{{ $materiel->nom }}" id="nom" placeholder="Saisir nom de materiel">
                                    @error('nom')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantite">Quantité de materiel</label>
                                    <input type="number" class="form-control" name="quantite" value="{{ $materiel->quantite }}" id="quantite" placeholder="Saisir quantite de materiel">
                                    @error('quantite')
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