@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Créer d'un nouveau devis </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('quotes.index') }}">
                <button class="btn btn-danger float-right">Annuler</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="col-md-6">
            <div class="card card-primary">
                <form method="post" action="{{ route('quotes.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">

                            <label for="libelle">Titre</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                   name="title"
                                   placeholder="Enter your first name" value="{{ old('title') }}">

                            @error('title')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>

                        <div>
                            Ajouter des prestations
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @parent
    @routes

    <script>

    </script>
@stop
