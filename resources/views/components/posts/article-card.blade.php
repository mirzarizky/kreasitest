<article class="flex max-w-xl flex-col items-start justify-between">
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-500 dark:text-gray-400">{{ $post->published_at->format('M d, Y') }}</time>
        {{-- <a href="#"
            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 dark:bg-gray-800/60 dark:text-gray-300 dark:hover:bg-gray-800">Marketing</a> --}}
    </div>
    <div class="group relative">
        <h3
            class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600 dark:text-white dark:group-hover:text-gray-300">
            <a href="{{ route('posts.show', $post->slug) }}">
                <span class="absolute inset-0"></span>
                {{ $post->title }}
            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600 dark:text-gray-400">
            {!! $post->content !!}
        </p>
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
</article>
