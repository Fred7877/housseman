@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Evènements </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('event.create') }}">
                <button class="btn btn-success float-right">Create</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table id="tableEvents" class="table table-striped table-bordered">
        <thead>
        <th>
            Id
        </th>
        <th>
            Titre
        </th>
        <th>
            Début
        </th>
        <th>
            Fin
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
            var tableEvents = $('#tableEvents').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('events.list') }}',
                        type: 'GET',
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'title'},
                        {data: 'begin'},
                        {data: 'end'},
                        {
                            data: 'actions', render: function (data, type, row) {
                                html = "<div class='float-right'>" +
                                    "<div class='row'>" +
                                    "<div class='col-md-5 col-lg-5'>" +
                                    "<a href='" + route('event.edit', [row.id]) + "'>" +
                                    "<button type='button' class='btn btn-primary btn-sm'>Modifier</button>" +
                                    "</a>" +
                                    "</div>" +
                                    "<div class='col-md-5 col-lg-5'>" +
                                    "<button type='button' data-idEvent='" + row.id + "' class='btn btn-danger btn-sm delete-event'>Supprimer</button>" +
                                    "</div>" +
                                    "</div>" +
                                    "</div>";
                                return html;
                            }, width: "15%", "searchable": false,
                        },
                    ],
                    "drawCallback": function (settings) {
                        // Action supprimer
                        $('.delete-event').on('click', function (e) {
                            Swal.fire({
                                title: 'Supprimer cet évènement ?',
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
                                        method: "post",
                                        url: route('event.delete', [e.target.dataset.idevent]),
                                    }).done(function (msg) {
                                        tableEvents.draw();
                                        if (msg === 'ok') {
                                            Swal.fire(
                                                'Supprimer !',
                                                'La event a été supprimée',
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
