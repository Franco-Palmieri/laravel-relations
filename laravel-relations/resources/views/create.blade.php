@extends('news.base')
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('articles.store')}}" method="post" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" name="body" class="form-control" id="body">
                </div>
                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input type="text" name="picture" class="form-control" id="picture">
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="author_id">Options</label>
                        <select class="form-select" id="author_id" name="author_id">
                            <option selected>Choose...</option>
                            @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                    </div>-
                </div>
                <strong>Tags</strong>
                @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}"><label>{{$tag->name}}</label>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

