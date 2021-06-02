@extends('layouts.master')


@section('content')
<div class="wrapper">
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Déclarer un incident 
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
                        <form action="{{ url('chef/incidents') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="titre">titre</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="titre" placeholder="Saisir titre de materiel">
                                    @error('titre')
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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