<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased flex flex-col">
        <header class="p-4 dark:bg-gray-900 dark:text-gray-100">
            <div class="container flex justify-between h-16 mx-auto md:justify-center md:space-x-8">
                <a rel="noopener noreferrer" href="{{ route('home') }}" aria-label="Back to homepage" class="text-3xl font-bold uppercase flex items-center p-2">
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full dark:bg-violet-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="w-5 h-5 rounded-full dark:text-gray-900">
                            <path d="M18.266 26.068l7.839-7.854 4.469 4.479c1.859 1.859 1.859 4.875 0 6.734l-1.104 1.104c-1.859 1.865-4.875 1.865-6.734 0zM30.563 2.531l-1.109-1.104c-1.859-1.859-4.875-1.859-6.734 0l-6.719 6.734-6.734-6.734c-1.859-1.859-4.875-1.859-6.734 0l-1.104 1.104c-1.859 1.859-1.859 4.875 0 6.734l6.734 6.734-6.734 6.734c-1.859 1.859-1.859 4.875 0 6.734l1.104 1.104c1.859 1.859 4.875 1.859 6.734 0l21.307-21.307c1.859-1.859 1.859-4.875 0-6.734z"></path>
                        </svg>
                    </div>
                </a>
                <button title="Button" type="button" class="p-4 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 dark:text-gray-100">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </header>

        <div class="dark:bg-gray-800 flex-grow">
            <article class="container max-w-2xl px-6 py-12 mx-auto space-y-12 dark:bg-gray-800 dark:text-gray-50">
                <div class="w-full mx-auto space-y-4 text-center">
                    <div class="flex justify-center gap-x-2">
                        @foreach ($post->tags as $tag)
                            <p class="text-xs font-semibold tracki uppercase">#{{ $tag->name }}</p>
                        @endforeach
                    </div>
                    <h1 class="text-4xl font-bold leadi md:text-5xl">{{ $post->title }}</h1>
                    <p class="text-sm dark:text-gray-400">by
                        <a rel="noopener noreferrer" href="#" target="_blank" class="underline dark:text-violet-400">
                            <span itemprop="name">{{ $post->user->name }}</span>
                        </a>on
                        <time datetime="2021-02-12 15:34:18-0200">{{ $post->published_format }}</time>
                    </p>
                </div>
                <div class="dark:text-gray-100 prose prose-headings:text-white prose-blockquote:text-slate-400 prose-a:text-slate-100 prose-a:font-semibold prose-figcaption:text-slate-300">
                    {!! $post->content !!}
                </div>
            </article>
        </div>

        @if ($post->photos->isNotEmpty())
            <section class="py-6 dark:bg-gray-800">
                <div class="container flex flex-col justify-center p-4 mx-auto">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 sm:grid-cols-2">
                        @foreach ($post->photos as $photo)
                            <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->alt_text }}" />
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <footer class="px-4 py-8 dark:bg-gray-800 dark:text-gray-400">
            <div class="container flex flex-wrap items-center justify-center mx-auto space-y-4 sm:justify-between sm:space-y-0">
                <div class="flex flex-row pr-3 space-x-4 sm:space-x-8">
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full dark:bg-violet-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="w-5 h-5 rounded-full dark:text-gray-900">
                            <path d="M18.266 26.068l7.839-7.854 4.469 4.479c1.859 1.859 1.859 4.875 0 6.734l-1.104 1.104c-1.859 1.865-4.875 1.865-6.734 0zM30.563 2.531l-1.109-1.104c-1.859-1.859-4.875-1.859-6.734 0l-6.719 6.734-6.734-6.734c-1.859-1.859-4.875-1.859-6.734 0l-1.104 1.104c-1.859 1.859-1.859 4.875 0 6.734l6.734 6.734-6.734 6.734c-1.859 1.859-1.859 4.875 0 6.734l1.104 1.104c1.859 1.859 4.875 1.859 6.734 0l21.307-21.307c1.859-1.859 1.859-4.875 0-6.734z"></path>
                        </svg>
                    </div>
                    <ul class="flex flex-wrap items-center space-x-4 sm:space-x-8">
                        <li>
                            <a rel="noopener noreferrer" href="#">Terms of Use</a>
                        </li>
                        <li>
                            <a rel="noopener noreferrer" href="#">Privacy</a>
                        </li>
                    </ul>
                </div>
                <ul class="flex flex-wrap pl-3 space-x-4 sm:space-x-8">
                    <li>
                        <a rel="noopener noreferrer" href="#">Instagram</a>
                    </li>
                    <li>
                        <a rel="noopener noreferrer" href="#">Facebook</a>
                    </li>
                    <li>
                        <a rel="noopener noreferrer" href="#">Twitter</a>
                    </li>
                </ul>
            </div>
        </footer>
    </body>
</html>
