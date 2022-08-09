@extends('master')

@section('title')
    Welcome to URL Shortener
@endsection


@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row mx-auto text-center">
                <div class="col-md-6 mx-auto text-center">
                    <div class="card">
                        <div class="card-header"><h4>Fill the form to register</h4></div>
                        <div class="card-body">
                            <form action="{{route('user.register')}}" method="post">
                                @csrf

                                @if(Session::get('error'))
                                    <h5 class="text-center mx-auto mb-3 text-danger">{{Session::get('error')}}</h5>
                                @endif

                                @if(Session::get('success'))
                                    <h5 class="text-center mx-auto mb-3 text-success">{{Session::get('success')}}</h5>
                                @endif

                                <div class="row mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>

                                <div class="row mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>

                                <div class="row mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <div class="row mb-3">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                </div>

                                <div class="row mb-3">
                                    <input type="submit" class="btn btn-success" value="Register">
                                </div>

                                <div class="row">
                                    <h6>Already Registered? <a href="{{route('home')}}">Login Here.</a></h6>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
