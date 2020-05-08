@extends('admin.dashboard')

@section('content_header')
    <div class="row">
        <div class="col">
            <h1 class="m-0 text-dark"> Create User </h1>
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
                <form method="post" action="{{ route('store.user') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"
                                   placeholder="Enter your first name" value="{{ old('last_name') }}">

                            @error('last_name')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="last_name">Prénom</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"
                                   placeholder="Enter your last name" value="{{ old('first_name') }}">

                            @error('first_name')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                   placeholder="Enter your email" value="{{ old('email') }}">

                            @error('email')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="first_name">Password</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                   placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="first_name">Confirm Password</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="confirm_password"
                                   name="confirm_password"
                                   placeholder="Confirm Password">

                            @error('confirm_password')
                            <div class="error invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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
