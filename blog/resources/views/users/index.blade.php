@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Users  </h1>
        <a class="btn btn-success" href="{{route('user.create')}}"> create user</a>
           </div>
      </div>
    </div>

    <div class="row">
        <div class="col">

       <div class="container" style=" padding-bottom: 13px">
        <form class="form-inline" action="/search" method="POST" >
            @csrf

            <div class="form-group mx-sm-3 mb-2">
              <label for="inputPassword2" class="sr-only">Password</label>
              <input type="text" name="q" class="form-control" id="inputPassword2" placeholder="search">
            </div>
            <button type="submit" class="btn btn-primary mb-2">click</button>
          </form>
       </div>

        </div>
      </div>


      @if (isset($details))
      <div class="row" style="padding-top: 2%; padding-bottom:3%">

        <div class="container">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col"> Email</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($details as $item)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>

                          </tr>
                        @endforeach

                    </tbody>
                  </table>


              </div>
        </div>




    </div>
      @endif




    <div class="row">
        @if ($users->count() > 0 )
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($users as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if ($item->is_admin == 1)
                            <a class="text-dark" href="{{route('user.not.admin',['id'=> $item->id])}}"> <i class="fas  fa-2x fa-user"></i> admin </a>

                            @else
                            <a class="text-success" href="{{route('user.admin',['id'=> $item->id])}}"> <i class="fas  fa-2x fa-user"></i> not admin  </a>

                            @endif

                         <a class="text-danger" href="{{route('user.destroy',['id'=> $item->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>
                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>


          </div>
        @else
        <div class="col">
            <div class="alert alert-danger" role="alert">
                Not tags
              </div>
        </div>

        @endif


    </div>
  </div>
@endsection


