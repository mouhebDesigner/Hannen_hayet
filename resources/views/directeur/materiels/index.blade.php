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
                            <h1 class="m-0">Liste des fournitures</h1>
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
                                                  
                                                </div>
                                                <a href="{{ url('/directeur/materiels/create') }}">
                                                    <button class="btn-delete">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Nom
                                                        </th>
                                                        <th>
                                                            Cat??gorie
                                                        </th>
                                                        <th>
                                                            Quantit??
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
                                                    @foreach($materiels as $materiel)
                                                        <tr>
                                                            <td>{{ $materiel->nom }}</td>
                                                            <td>{{ $materiel->categorie }}</td>
                                                            <td>{{ $materiel->quantite }}</td>
                                                            <td>{{ $materiel->created_at }}</td>
                                                            <td>{{ $materiel->updated_at }}</td>
                                                            <td>
                                                                <div class="d-flex justify-content-around">
                                                                    <form action="{{ url('directeur/materiels/'.$materiel->id) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn-delete" onclick="return confirm('Voules-vous supprimer cet fourniture')">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                    <a href="{{ url('directeur/materiels/'.$materiel->id.'/edit') }}" onclick="return confirm('Voules-vous modifier cet fourniture')">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>
                                                            Nom
                                                        </th>
                                                        <th>
                                                            Cat??gorie
                                                        </th>
                                                        <th>
                                                            Quantit??
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
                                            {{ $materiels->links() }}
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
