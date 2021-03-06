@extends('news.base')

@section('content')
    <div class="container ">
        <div class="row news-container">
            @foreach($articles as $article)
                <div class="col-8">
                    <div class="row news-box">
                        <div class="col-12 col-md-6 news-img">
                            <a href="{{route('articles.show', $article->id)}}"><img src="{{$article->picture}}" class="card-img-bottom" alt="Card image cap"></a>
                        </div>
                        <div class="col-12 col-md-6 news-info">
                            <h5 class="news-title">{{$article->title}}</h5>
                            <p>{{$article->body}}</p>
                            <p class="card-text"><small class="text-muted">{{$article->updated_at}}</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-4 news-aside-container">
                    <div class="row news-aside">
                        <div class="col-12 col-md-6 news-img">
                            <a href="{{route('articles.show', $article->id)}}"><img src="{{$article->picture}}" class="card-img-bottom" alt="Card image cap"></a>
                        </div>
                        <div class="col-12 col-md-6 news-info">
                            <h5 class="news-title">{{$article->title}}</h5>
                            <p>{{$article->body}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="nav">
                <div class="pagination">
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
