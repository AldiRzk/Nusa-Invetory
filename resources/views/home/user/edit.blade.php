@extends('layouts.master')
@section('content')
@section('title', 'user')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-header bg-gradient-secondary text-white">
                <h4 class="text-white">Add User Data</h4>
                <a href="/user" class="btn btn-white text-primary">Return</a>
            </div>
            <div class="card-body">
                <form action="/user/{{$user->id}}/update" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}"/>
                        @error('name')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email', $user->email)}}"/>
                        @error('email')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}"/>
                        @error('password')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="" hidden>-- Select Role --</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                            <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                        @error('role')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </section>
</div>
@endsection
