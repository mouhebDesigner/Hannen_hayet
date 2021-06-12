@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        
        @include('includes.header')
        @include('includes.aside')
        <div class="content-wrapper" style="min-height: 257px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Liste de demandes 
                                @if(Auth::user()->isResponsable())
                                    à traiter
                                @endif
                            </h1>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    @include('includes.error-message')
                    <div class="row">
                        <div class="col-12">
                            
                            <!-- /.card -->

                            <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-between">
                                                <div id="example1_filter" class="dataTables_filter">
                                                    <label>
                                                        Search:
                                                        <input 
                                                        type="search" class="form-control form-control-sm" 
                                                        placeholder="" 
                                                        aria-controls="example1">
                                                    </label>
                                                </div>
                                                @if(Auth::user()->grade == "chef")
                                                <a href="{{ url('chef/demandes/create') }}">
                                                    <button class="btn-delete">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Materiel
                                                        </th>
                                                        <th>
                                                            Quantité
                                                        </th>
                                                        <th>
                                                            date de creation
                                                        </th>
                                                        <th>
                                                            date de modification
                                                        </th>
                                                        <th>
                                                            Actions
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach($demandes as $demande)
                                                        <tr>
                                                            <td>{{ $demande->materiel->nom }}</td>
                                                            <td>{{ $demande->quantite }}</td>
                                                            <td>{{ $demande->created_at->diffForHumans() }}</td>
                                                            <td>{{ $demande->updated_at->diffForHumans() }}</td>
                                                            <td>
                                                                @if(Auth::user()->isChef())
                                                                <div class="d-flex justify-content-around">
                                                                    <form action="{{ url('chef/demandes/'.$demande->id) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer cette demande')">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                    <a href="{{ url('chef/demandes/'.$demande->id.'/edit') }}" onclick="return confirm('Voules-vous modifier cette demande')">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                                @elseif(Auth::user()->isAdmin()) 
                                                                    @if($demande->materiel->quantite > $demande->quantite)
                                                                        <div class="d-flex justify-content-around">
                                                                            @if($demande->etat == "accepter")
                                                                                <button disabled class="btn btn-success" onclick="return confirm('Voules-vous accepter cette demande')">
                                                                                    Accepter <i class="fa fa-check"></i>
                                                                                </button>

                                                                            @else 

                                                                                <a href="{{ url('directeur/demandes/'.$demande->id.'/accepter') }}" class="btn btn-success" onclick="return confirm('Voules-vous accepter cette demande')">
                                                                                    Accepter
                                                                                </a>
                                                                            @endif
                                                                            @if($demande->etat == "refuser")
                                                                                <button disabled class="btn btn-danger" onclick="return confirm('Voules-vous accepter cette demande')">
                                                                                    Réfuser <i class="fa fa-check"></i>
                                                                                </button>
                                                                            @else 
                                                                                <a href="{{ url('directeur/demandes/'.$demande->id.'/refuser') }}" class="btn btn-danger" onclick="return confirm('Voules-vous refuser cette demande')">
                                                                                    Réfuser
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                    @else 
                                                                        @if($demande->transferer == NULL)
                                                                            <a href="{{ url('directeur/demandes/'.$demande->id.'/transferer') }}" class="btn btn-success" onclick="return confirm('Voules-vous transférer cette demande')">
                                                                                Transférer au responsable
                                                                            </a>
                                                                        @else 
                                                                            <button disabled class="btn btn-success" onclick="return confirm('Voules-vous accepter cette demande')">
                                                                                Transféré <i class="fa fa-check"></i>
                                                                            </button>
                                                                        @endif

                                                                    @endif
                                                                @else 
                                                                    <div class="d-flex justify-content-around">
                                                                        @if($demande->etat == "accepter")
                                                                            <button disabled class="btn btn-success" onclick="return confirm('Voules-vous accepter cette demande')">
                                                                                Accepter <i class="fa fa-check"></i>
                                                                            </button>

                                                                        @else 

                                                                            <a href="{{ url('directeur/demandes/'.$demande->id.'/accepter') }}" class="btn btn-success" onclick="return confirm('Voules-vous accepter cette demande')">
                                                                                Accepter
                                                                            </a>
                                                                        @endif
                                                                        @if($demande->etat == "refuser")
                                                                            <button disabled class="btn btn-danger" onclick="return confirm('Voules-vous accepter cette demande')">
                                                                                Réfuser <i class="fa fa-check"></i>
                                                                            </button>
                                                                        @else 
                                                                            <a href="{{ url('directeur/demandes/'.$demande->id.'/refuser') }}" class="btn btn-danger" onclick="return confirm('Voules-vous refuser cette demande')">
                                                                                Réfuser
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>
                                                            Materiel
                                                        </th>
                                                        <th>
                                                            Quantité
                                                        </th>
                                                        <th>
                                                            date de creation
                                                        </th>
                                                        <th>
                                                            date de modification
                                                        </th>
                                                        <th>
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
