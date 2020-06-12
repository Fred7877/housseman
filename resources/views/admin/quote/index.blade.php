@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Quotes </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('quotes.create') }}">
                <button class="btn btn-success float-right">Create</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table id="tableQuotes" class="table table-striped table-bordered">
        <thead>
        <th>
            Id
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
            var tableQuotes = $('#tableQuotes').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('quotes.list') }}',
                        type: 'GET',
                    },
                    columns: [
                        {data: 'id'},
                    ],
                    "drawCallback": function (settings) {
                        // Action supprimer
                        $('.delete-quote').on('click', function (e) {
                            Swal.fire({
                                title: 'Supprimer cette quote ?',
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
                                        url: route('quote.delete', [e.target.dataset.idquote]),
                                    }).done(function (msg) {
                                        tableQuotes.draw();
                                        if (msg === 'ok') {
                                            Swal.fire(
                                                'Supprimer !',
                                                'La quote a été supprimée',
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
