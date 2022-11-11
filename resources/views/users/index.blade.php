
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<div class="container">
    <div class="row justify-content-center">
      
<h1>Users List</h1>
<div class="col-md-6 offset-md-4">
<a href="#" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-plus"></span> Create 
        </a>
        </div>
<div class="mx-4">
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>created</th>
        </tr>

    @foreach($users as $user)
    <tr>
        <th>
        <img src={{$user->photo ? asset('storage/' . $user->photo) :
    asset('storage/photos/no-image.jpg')}} width="70" height="70"/>
        </th>
        <th>{{$user->id}}</th>
        <th>{{$user->name}}</th>
        <th>{{$user->email}}</th>
        <th>{{$user->created_at}}</th>
        <th class="mt-4 p-2 flex space-x-6">
                <a href="/user/edit/{{$user->id}}">
                <i class="fa-solid fa-pencil">Edit</i>
                </a>
            
            <form method="POST" action="user/delete/submit/{{$user->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
            </form>    
            </th>
    </tr>
    
    @endforeach
    </thead>

</table>

 </div>
 </div>
 </div>
 @endsection

 