@extends('news.base')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="card-group col-4 news-card">
                    <div class="card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->body}}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
