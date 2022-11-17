
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
      
<h1>Soft Deleted List</h1>
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
    <form method="POST" action="user/destroy/submit/{{$user->id}}">
        @csrf
        @method('POST')
        <button class="text-red-500"><i class="fa-solid fa-trash"></i>Destroy</button>
    </form>    

    <form method="GET" action="/restoreClient/{{$user->id}}">
            <button class="text-green-500"><span>&#9842;</span> Restore</button>
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

