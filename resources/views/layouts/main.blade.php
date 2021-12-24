<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">        

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

<body style="font-family: Open Sans, sans-serif">
    <x-jet-banner />
    @livewire('navigation-menu')    
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="{{url('storage/images/health_plus_logo.svg')}}" alt="Health Plus Logo" style="height: 2em;">
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                <a href="/" class="text-xs font-bold uppercase">Home Page</a>

                <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        @include('partials._articles-header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($articles->count())
        {{$articles->links()}}
            <x-articles.article-featured-card :article="$articles[0]"/>

            <div class="lg:grid lg:grid-cols-6">
                @foreach($articles->skip(1) as $article)
                <x-articles.article-card 
                    :article="$article" 
                    class="{{$loop->iteration < 3 ? 'col-span-3': 'col-span-2'}}"
                    />
                @endforeach
            </div> 
            {{$articles->links()}}             
        @else
            <p class="text-center">No articles yet. Please check back later</p>
        @endif
        </main>

        <footer class="bg-gradient-to-br from-yellow-50 via-white to-green-50 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="{{url('storage/images/healthplus_cat.png')}}" alt="Health Plus Cat" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl font-semibold">Stay alert with the latest valuable articles</h5>
            <p class="text-sm mt-3">Promise to keep your audience well informed. No naivety.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-green-200 px-6 rounded-full">
                    <nav class="md:flex md:justify-between md:items-center">
                        <div class="mr-4">
                            <a href="/" class="hover:shadow-xl">
                                <img src="{{url('storage/images/health_plus_logo.svg')}}" alt="Health Plus Logo" class="h-8 hover:shadow-xl">
                            </a>
                        </div>

                        <div class="mt-8 md:mt-0 space-x-6">
                            <a href="/" class="text-xs font-bold uppercase text-gray-900 hover:text-green-500 font-bold no-underline hover:underline">Home Page</a>
                            <a href="/articles" class="text-xs font-bold uppercase text-gray-900 hover:text-green-500 font-bold no-underline hover:underline">Articles</a>
                            <a href="/quizzes" class="text-xs font-bold uppercase text-gray-900 hover:text-green-500 font-bold no-underline hover:underline">Quizzes</a>

                            
                        </div>
                    </nav>

                   
                </div>
            </div>
        </footer>
    </section>
</body>
