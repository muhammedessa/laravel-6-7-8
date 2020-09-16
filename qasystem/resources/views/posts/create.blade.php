@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="header">Create</div>
                    <div class="card-body">
                    <form method="POST" action="{{route('posts.store')}}">
                        @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">  Title</label>
                              <input type="text" class="form-control" name="title" required>
                             </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">  Description</label>
                                <textarea type="text" class="form-control" name="description" required>
                                </textarea>
                               </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection
