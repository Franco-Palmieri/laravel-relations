@extends('news.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row show-box">
                <div class="col-12 show-img">
                    <img src="{{$article->picture}}" alt="Card image cap">
                </div>
                <div class="col-12 show-info">
                    <h5 class="show-title">{{$article->title}}</h5>
                    <p class="show-text">{{$article->body}}</p>
                    @foreach($article->tags as $tag)
                        <div class="chip">
                            {{$tag->name}}
                        </div>
                    @endforeach
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
