@extends('layouts.homeD')

@section('users')
<div>
    <h1>Hello {{ Auth::user()->name }} </h1>
    <!-- users/add.blade.php -->
    <form method="POST" action="{{ route('users.add') }}">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <select name="role">
            <option value="admin">Admin</option>
            <option value="guru">Guru</option>
            <option value="santri">Santri</option>
        </select>
        <button type="submit">Submit</button>
    </form>


</div>

@endsection