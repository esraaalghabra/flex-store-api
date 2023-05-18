@extends('layouts.llogin')

@section('title','User Login')
@section('mainTitle','Login as user')
@section('info','You are have account as user in our documents to login in !')
@section('form')
    <form method="post" action="{{url('shop/login')}}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <div class="col-md-6">
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"  placeholder="Enter email address..." required>
            </div>
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password..." required>
            </div>
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember_me" id="remember-me" class="chk-remember">
            <label class="form-check-label" for="remember-me">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">login</button>
    </form>
@endsection
