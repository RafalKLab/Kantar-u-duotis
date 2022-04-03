@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5 wraper">
            <div class="card text-justify">
                <h5 class="card-header">{{$article->header}}</h5>
                <div class="card-body">
                    {{$article->content}}
                </div>
            </div>
        </div>
    </div>
@endsection
