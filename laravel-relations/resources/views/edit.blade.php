@extends('news.base')
@section('content')
<div class="container news-container">
    <div class="row">
        <div class="col-12">
            <h2>MODIFICA IL POST</h2>
        </div>
            <form action="{{route('articles.update', $article)}}" method="post" class="col-12">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" name="body" class="form-control" id="body" value="{{$article->body}}">
                </div>
                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input type="text" name="picture" class="form-control" id="picture" value="{{$article->picture}}">
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="author_id">Options</label>
                        <select class="form-select" id="author_id" name="author_id" >
                            <option selected>Choose...</option>
                            @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <strong>Tags</strong>
                @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}"> <label>{{$tag->name}}</label>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</div>
@endsection