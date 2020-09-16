@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Edit Tag</h1>
            <a class="btn btn-success" href="{{route('tags')}}"> all tags</a>
           </div>
      </div>

    </div>
    <div class="row">

        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
        @endif


      <div class="col">
      <form action="{{route('tag.update',['id'=> $tag->id])}}" method="POST"  >
        @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Name  </label>
            <input type="text" name="tag" value="{{$tag->tag}}"  class="form-control"   >
            </div>

            <div class="form-group">

                <button class="btn btn-danger" type="submit">update</button>
            </div>

          </form>
      </div>
    </div>
  </div>
@endsection


