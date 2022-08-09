@extends('master')

@section('title')
@endsection


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row mx-auto mb-3">
                <h2 class="text-center mx-auto">Your Short Url:</h2>
                <h3 class="text-center  mx-auto"><a target="_blank" href="{{$link}}">{{url('/').'/'.$url}}</a></h3>
                <a href="{{route('user.dashboard')}}" class="btn btn-success col-md-3 mx-auto mt-2">Go Back</a>
            </div>
        </div>
    </section>
@endsection
