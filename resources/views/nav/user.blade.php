@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if (session('status'))
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
    @endif

    {{-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#staticBackdrop">
        Tambah Akun
    </button> --}}

    <table class="table">
        {{-- <div>
            {{ $data_user->links('pagination::bootstrap-4') }}
        </div> --}}
        <thead class="bg-danger">
            <tr>
                <th scope="col">#</th>
                <th scope="col">nama</th>
                <th scope="col">email</th>
                <th scope="col">status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_user as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
  
                @if ($user->role==1)
                <td>
                    <p class="btn btn-success btn-sm">Aktif</p>
                </td>
                @else
                <td>
                    <p class="btn btn-danger btn-sm">NonAktif</p>
                </td>   
                @endif

                <td>

                    @if ($user->role!=1)
                    <div class="">
                        {{-- <form action="{{ route('barangDetail',  $user->id)}}" method="GET"> --}}
                        <form action="{{ route('user.approve',  $user->id)}}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-info"><i class="fas fa-check"></i></button>
                        </form>
                    </div>
                    @else
                    <div class="">
                        {{-- <form action="{{ route('barangDetail',  $user->id)}}" method="GET"> --}}
                        <form action="{{ route('user.reject',  $user->id)}}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog " style="max-width: 1000px!important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
