@extends('news.base')

@section('content')
<div class="container news-container">
    <div class="row">
        <div class="col-12">
            <div class="row show-box">
                <div class="col-12 show-img">
                    <img src="{{$article->picture}}" alt="Card image cap">
                </div>
                <div class="col-12 show-info">
                    <h5 class="show-title">{{$article->title}}</h5>
                    <p class="show-text">{{$article->body}}</p>
                    <p>{{$article->author->name}}</p>
                    @foreach($article->tags as $tag)
                    <a href="{{route('tag.show', $tag->id)}}">
                        <div class="chip">
                            {{$tag->name}}
                        </div>
                    </a>
                    @endforeach
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="comment-box">
                        <form action="" method="post">
                        @csrf
                            <input type="text">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
