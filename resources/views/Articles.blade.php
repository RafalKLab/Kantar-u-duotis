@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-md-6 mt-5 wraper">
            @if(count($articles))
                <h2>{{$articles->first()->source}} naujausi straipsniai!</h2>
                @foreach($articles as $article)
                    <div class="card text-center">
                        <a href="{{route('showArticle', $article->id)}}"><h5 class="card-header">{{$article->header}}</h5></a>
                    </div>
                @endforeach
            @else
                <div class="card text-center">
                    <h5 class="card-header">Straipsnius gauti nepavyko</h5>
                </div>
            @endif
        </div>
    </div>
@endsection
