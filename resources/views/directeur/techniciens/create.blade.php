@extends('layouts.master')


@section('content')
<div class="wrapper">
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un technicien 
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
                        <form action="{{ url('directeur/techniciens') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" id="inputs">
                                <div class="form-group">
                                    <label for="name">Nom de technicien</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Saisir nom de technicien">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="specialite">Spécialité de technicien</label>
                                    <select name="specialite" id="specialite" class="form-control">
                                        <option value="" selected disbaled>Choisir spécialité</option>
                                        <option value="informatique">Informatique</option>
                                        <option value="software">Software</option>
                                        <option value="hardware">Hardware</option>
                                    </select>
                                    @error('specialite')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <label for="email">Email de technicien</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Saisir email de technicien">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe  de technicien</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" placeholder="Saisir mot de passe de technicien">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer la Mot de passe</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}" id="password" placeholder="Saisir mot de passe de technicien">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="numtel">Numéro de téléphone de technicien</label>
                                    <input type="number" class="form-control" name="numtel" value="{{ old('numtel') }}" id="numtel" placeholder="Saisir numéro de téléphone de technicien">
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
@section('script')
<script>
    $("#tp").on('click', function(){
        $("#etudiant_tp").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#etudiant_id_tp').append('<option value="'+value.etudiant.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#td").on('click', function(){
        $("#etudiant_td").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#etudiant_id_td').append('<option value="'+value.etudiant.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#cours").on('click', function(){
        $("#etudiant_cours").css('display', 'block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/teachers/',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);

                $.each(data, function(index, value){
                    $('#etudiant_id_cours').append('<option value="'+value.etudiant.id+'">'+value.nom+'</option>');
                });

            }    
        });
    });
    $("#section_id").on('change', function(){
        var section_id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/module_list/'+section_id,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log("test");
                $("#module_id").empty();
                $("#module_id").append('<option value="" disabled selected> Choisir module</option>')
                $.each(data, function(index, value){
                    $("#module_id").append('<option value="'+value.id+'">'+value.titre+'</option>')
                });
            }    
        });
    });
</script>

@endsection