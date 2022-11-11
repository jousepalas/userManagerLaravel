@extends('layouts.app')

@section('content')
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<div class="container">
    <div class="row justify-content-center">

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
        <tr>
            <th><img src={{$user->photo ? asset('storage/' . $user->photo) :
    asset('storage/photos/no-image.jpg')}} width="70" height="70"/></th>
            <th>{{$user->id}}</th>
            <th>{{$user->name}}</th>
            <th>{{$user->email}}</th>
            <th>{{$user->created_at}}</th>
            <th class="mt-4 p-2 flex space-x-6">
                <a href="/user/edit/{{$user->id}}">
                <i class="fa-solid fa-pencil">Edit</i>
                </a>
            </th>
        </tr>
    </thead>
</table>

 </div>
</div>
</div>
 <!-- <div>{{$user}}</div> -->

 @endsection