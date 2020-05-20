@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Evènement </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('prestation.create') }}">
                <button class="btn btn-success float-right">Create</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    Mes beaux évènements
@endsection

@section('js')
    @parent
@stop
