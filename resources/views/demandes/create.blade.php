@extends('layouts.master')


@section('content')
<div class="wrapper">
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter une demande 
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
                        <form action="{{ url('chef/demandes') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categorie">Catégorie</label>
                                    <select name="categorie" id="categorie" class="form-control">
                                        <option value="" selected disbaled>Choisir catégorie</option>
                                        <option value="papier">Papier</option>
                                        <option value="materiel">Matériel</option>
                                    </select>
                                    @error('categorie')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="materiel_id">Materiel</label>
                                    <select name="materiel_id" id="materiel_id" class="form-control">
                                        <option value="" selected disbaled>Choisir materiel</option>
                                    </select>
                                    @error('materiel_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantite">Quantité de materiel</label>
                                    <input type="number" class="form-control" name="quantite" value="{{ old('quantite') }}" id="quantite" placeholder="Saisir quantite de materiel">
                                    @error('quantite')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}" id="date" placeholder="Saisir date de materiel">
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Saisir la description">{{ old('description') }}</textarea>
                                    @error('description')
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
@section('script')
    <script>
        $("#categorie").on('change', function(){
            
            var categorie = $(this).val();
            $.ajax({
                type:'get',
                url:'/materiel_list/'+categorie,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    console.log("test");
                    $("#materiel_id").empty();
                    $("#materiel_id").append('<option value="" disabled selected> Choisir materiel</option>')
                    $.each(data, function(index, value){
                        $("#materiel_id").append('<option value="'+value.id+'">'+value.nom+'</option>')
                    });
                }    
            });
        });
    </script>
@endsection