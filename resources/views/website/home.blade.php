@extends('master')

@section('title')
    Welcome to URL Shortener
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row mx-auto text-center">
                <div class="col-md-4 mx-auto text-center">
                    <div class="card">
                        <div class="card-header"><h4>Login to continue</h4></div>
                        <div class="card-body">
                            <form action="{{route('user.login')}}" method="post">
                                @csrf
                                @if(Session::get('error'))
                                    <h5 class="text-center mx-auto mb-3 text-danger">{{Session::get('error')}}</h5>
                                @endif

                                <div class="row mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>

                                <div class="row mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <div class="row mb-3">
                                    <input type="submit" class="btn btn-success" value="Login">
                                </div>

                                <div class="row">
                                    <h6>Don't Have Account? <a href="{{route('user.register.page')}}">Create Here.</a></h6>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
