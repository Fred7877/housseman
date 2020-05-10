@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Prestations </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('prestation.create') }}">
                <button class="btn btn-success float-right">Create</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <th>
            Id
        </th>
        <th>
            Libelle
        </th>
        <th>
            Prix de base
        </th>
        <th>
            Détails
        </th>
        <th>
            Actions
        </th>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('js')
    @parent
    @routes

    <script>
        $(document).ready(function () {

            $('#myTable').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('prestations.list') }}',
                        type: 'GET',
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'libelle'},
                        {data: 'price'},
                        {data: 'details'},
                        {
                            data: 'actions', render: function ( data, type, row) {
                                html =  "<div class='float-right'>" +
                                            "<div class='row'>" +
                                                "<div class='col-md-5 col-lg-5'>" +
                                                    "<a href='"+route('prestation.edit', [row.id])+"'>"+
                                                         "<button type='button' class='btn btn-primary btn-sm'>Modifier</button>" +
                                                    "</a>"+
                                                "</div>" +
                                                "<div class='col-md-5 col-lg-5'>" +
                                                    "<button type='button' class='btn btn-danger btn-sm'>Supprimer</button>" +
                                                "</div>" +
                                            "</div>" +
                                        "</div>";
                                return html;
                            }, width: "15%"
                        },
                    ],

                }
            );
        });
    </script>
@stop
