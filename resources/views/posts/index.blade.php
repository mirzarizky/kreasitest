@extends('layout.master')

@section('title', 'Blog post')

@section('content')
<div class="bg-white py-24 sm:py-32 dark:bg-gray-900">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl">
      <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl dark:text-white">From the blog</h2>
      <p class="mt-2 text-lg/8 text-gray-600 dark:text-gray-300">Learn how to grow your business with our expert advice.</p>
      <div class="mt-10 space-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 dark:border-gray-700">
        @foreach ($posts as $post)
            <x-posts.article-card :post="$post" />
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
