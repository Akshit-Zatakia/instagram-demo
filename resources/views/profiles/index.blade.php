@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/logo.png" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex align-baseline justify-content-between">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts()->count() }}</strong> posts</div>
                <div class="pr-4"><strong>23k</strong> followers</div>
                <div class="pr-4"><strong>212</strong> following</div>
            </div>
            <div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href= {{$user->profile->url}} target="_blank">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <div class="row pt-4">
            
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{$post->id}}">
                        <img src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                </div>    
            @endforeach
            
            
            
        </div>
    </div>
</div>
@endsection
