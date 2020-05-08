@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Utilisateurs </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('create.user') }}">
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
            First name
        </th>
        <th>
            Last name
        </th>
        <th>
            Email
        </th>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('js')
    @parent
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('list.users') }}',
                        type: 'GET',
                    },
                    columns: [
                        {data: 'id'},
                        {data: 'first_name'},
                        {data: 'last_name'},
                        {data: 'email'}
                    ]
                }
            );
        });
    </script>
@stop
