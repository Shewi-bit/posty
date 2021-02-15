@extends('layouts.app')

@section('content')
    <div class="flex flex-col flex-wrap justify-center items-center">
        <div class="w-8/12 bg-green-300 p-6 rounded-lg">
            <h1>All Post From {{$user->name}}</h1>
            <p>Total Number Of Post: {{$posts->count()}}</p>
            <p>Total Number Of Like: {{$user->receivedLikes->count()}}</p>
        </div>
        <div class="w-8/12 bg-white p-6 rounded-lg mt-4">
            @if($posts->count())
                @foreach($posts as $post)
                    <div class="mb-4">
                        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                        <p class="mb-2">{{ $post->body }}</p>

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Delete</button>
                            </form>
                        @endcan

                        <div class="flex items-center">
                            @auth
                                @if (!$post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500">Like</button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">Unlike</button>
                                    </form>
                                @endif
                            @endauth

                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>
                    </div>

                @endforeach
                    {{$posts->links()}}
            @else
                there are no post
            @endif
        </div>
    </div>
    @endsection
