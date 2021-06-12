<div class="row">
   
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Materiel::count() }}</h3>

            <p>Les fournitures</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('directeur/materiels') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    
    <!-- ./col -->
</div>