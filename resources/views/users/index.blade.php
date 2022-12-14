
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
<p class="text-center">Centered nav:</p>
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="/user/new" class="btn btn-info btn-lg">
                  <span class="glyphicon glyphicon-plus"></span> Create </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/softDeleted">Soft Deleted</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
        </div>
<div class="mx-4">
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>id</th>
            <th>First Name</th>
            <th>Middlename</th>
            <th>Lastname</th>
            <th>Suffixname</th>
            <th>Username</th>
            <th>Email</th>
            <th>created</th>
        </tr>

    @foreach($users as $user)
    <tr>
        <th>
        <img src={{$user->photo ? asset('storage/' . $user->photo) :
    asset('storage/photos/no-image.jpg')}} width="70" height="70"/>
        </th>
        <th>{{$user->id}}</th>
        <th>{{$user->firstname}}</th>
        <th>{{$user->middlename}}</th>
        <th>{{$user->lastname}}</th>
        <th>{{$user->suffixname}}</th>
        <th>{{$user->username}}</th>
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
         
            <form method="GET" action="/show/{{$user->id}}">
                <button class="text-red-500"><i class="fa-solid fa-eye"></i>Show</button>
            </form>
            </th>
            <th>
            <form method="POST" action="user/destroy/submit/{{$user->id}}">
                @csrf
                @method('POST')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>Destroy</button>

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

 