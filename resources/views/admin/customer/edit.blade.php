@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Modifier un client </h1>
        </div><!-- /.col -->
        <div class="col">
            <a href="{{ route('user.index') }}">
                <button class="btn btn-danger float-right">Annuler</button>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="col-md-6">
            <div class="card card-primary">
                <form method="post" action="{{ route('customer.update', [$customer->id]) }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="last_name">Nom entreprise</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                   placeholder="Nom entreprise" value="{{ $customer->customerable->name }}">

                            @error('name')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="siret">Siret</label>
                            <input type="text" class="form-control @error('siret') is-invalid @enderror" id="siret" name="siret"
                                   placeholder="Siret" value="{{ $customer->customerable->siret }}">

                            @error('siret')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact_last_name">Nom du contact</label>
                            <input type="text" class="form-control @error('contact_last_name') is-invalid @enderror" id="contact_last_name" name="contact_last_name"
                                   placeholder="Nom" value="{{ $customer->customerable->contact_last_name }}">

                            @error('contact_last_name')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="contact_first_name">Prénom du contact</label>
                            <input type="text" class="form-control @error('contact_first_name') is-invalid @enderror" id="contact_first_name" name="contact_first_name"
                                   placeholder="Prénom" value="{{ $customer->customerable->contact_first_name }}">

                            @error('contact_first_name')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                   placeholder="Email" value="{{ $customer->email }}">

                            @error('email')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Adresse</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                   placeholder="Adresse" value="{{ $customer->address }}">

                            @error('address')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                                   placeholder="Ville" value="{{ $customer->city }}">

                            @error('city')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="country">Pays</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country"
                                   placeholder="Pays" value="{{ $customer->country }}">

                            @error('country')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        @csrf
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
