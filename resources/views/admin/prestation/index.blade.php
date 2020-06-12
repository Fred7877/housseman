@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Prestations </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('prestations.create') }}">
                <button class="btn btn-success float-right">Create</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table id="tablePrestations" class="table table-striped table-bordered">
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

    @csrf
@endsection

@section('js')
    @parent
    @routes

    <script>
        $(document).ready(function () {
            var tablePrestations = $('#tablePrestations').DataTable(
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
                            data: 'actions', render: function (data, type, row) {
                                html = "<div class='float-right'>" +
                                    "<div class='row'>" +
                                    "<div class='col-md-5 col-lg-5'>" +
                                    "<a href='" + route('prestations.edit', [row.id]) + "'>" +
                                    "<button type='button' class='btn btn-primary btn-sm'>Modifier</button>" +
                                    "</a>" +
                                    "</div>" +
                                    "<div class='col-md-5 col-lg-5'>" +
                                    "<button type='button' data-idPrestation='" + row.id + "' class='btn btn-danger btn-sm delete-prestation'>Supprimer</button>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>";
                                return html;
                            }, width: "15%", "searchable": false,
                        },
                    ],
                    "drawCallback": function (settings) {
                        // Action supprimer
                        $('.delete-prestation').on('click', function (e) {
                            Swal.fire({
                                title: 'Supprimer cette prestation ?',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Oui'
                            }).then((result) => {
                                if (result.value !== undefined) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.ajax({
                                        method: "DELETE",
                                        url: route('prestations.destroy', [e.target.dataset.idprestation]),
                                    }).done(function (msg) {
                                        tablePrestations.draw();
                                        if (msg === 'ok') {
                                            Swal.fire(
                                                'Supprimer !',
                                                'La prestation a été supprimée',
                                                'success'
                                            )
                                        }
                                    });
                                }
                            });
                        });
                    }
                }
            );
        });

    </script>
@stop
