@extends('layout.default')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Šaltinis:</th>
            <th scope="col">Naujausi</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Delfi.lt</td>
            <td><a class="btn btn-success" href="{{route('getArticlesDelfi')}}">Gauti naujausius</a></td>
        </tr>
        <tr>
            <td>15min.lt</td>
            <td><a class="btn btn-success" href="{{route('getArticles15min')}}">Gauti naujausius</a></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <div class="btn-group" role="group">
        <form action="{{route('deleteArticles')}}" method="POST">
            @csrf
            <input type="submit" class="btn btn-danger" value="Ištrinti straipsnius">
        </form>
    </div>
@endsection
