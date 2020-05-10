@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Créer une nouvelle prestation </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('prestation.index') }}">
                <button class="btn btn-danger float-right">Annuler</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="col-md-6">
            <div class="card card-primary">
                <form action="{{ route('prestation.update', [$prestation->id]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">

                            <label for="libelle">Libellé</label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle"
                                   placeholder="Enter your first name" value="{{ $prestation->libelle }}">

                            @error('libelle')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                   placeholder="Enter your last name" value="{{ $prestation->price }}">

                            @error('price')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="details">Détails</label>
                            <textarea id="details" class="form-control" name="details" rows="5">{{ $prestation->details }}</textarea>
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
