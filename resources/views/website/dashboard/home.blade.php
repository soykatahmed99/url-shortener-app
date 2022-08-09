@extends('master')

@section('title')
    Welcome {{Session::get('user_name')}}
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row mx-auto text-center">
                <div class="col-md-8 mx-auto text-center">
                    <div class="row mb-3">
                        <h4>Make a Short Url</h4>
                        <hr>
                    </div>

                    <div class="row mb-3">
                        <div class="card card-body">
                            <form action="{{route('short.url')}}" method="post">
                                @csrf
                                <h6 class="text-center mx-auto text-muted mb-3">Note: You can short 3 links per minute. <br> If you try to short more than 3 links per minute, you will be blocked for 5 minutes.</h6>
                                <div class="row mb-3">
                                    <label for="" class="col-md-2">Link</label>
                                    <div class="col-md-10">
                                        <input type="url" class="form-control" name="url">
                                        @error('url') <span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-md-2"></label>
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success" value="Generate Short Url">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
