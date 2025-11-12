@extends('layout.master')

@section('title', $post->title)

@section('content')
<div class="bg-white py-24 sm:py-32 dark:bg-gray-900">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
      <p class="text-base/7 font-semibold text-indigo-600 dark:text-indigo-400">
        {{ $post->published_at->format('M d, Y') }}
    </p>
    <div class="flex items-center justify-between">

        <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl dark:text-white">
          {{ $post->title }}
        </h1>
          @auth
          <a href="{{ route('posts.edit', $post->slug) }}" class="outline px-2 text-sm py-1 text-gray-900 dark:text-white">edit</a>
          @endauth
    </div>
      <div class="mt-10  gap-8 text-base/7 text-gray-700 lg:max-w-none dark:text-gray-300">
        {!! $post->content !!}
      </div>
    </div>

    <div class="relative mt-8 flex items-center gap-x-4">
        <img src="https://ui-avatars.com/api/?background=random&name={{ \Illuminate\Support\Str::replace(' ', '+', $post->author) }}"
            alt="" class="size-10 rounded-full bg-gray-50 dark:bg-gray-800" />
        <div class="text-sm/6">
            <p class="font-semibold text-gray-900 dark:text-white">
                <span class="absolute inset-0"></span>
                {{ $post->author }}
            </p>
            <p class="text-gray-600 dark:text-gray-300">Author</p>
        </div>
    </div>
  </div>

</div>
@endsection
