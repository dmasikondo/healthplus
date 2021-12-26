<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-900 leading-tight">
            {{ __('Articles') }} 
        </h2>
    </x-slot> 
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
        <div class="max-w-6xl mt-6 lg:mt-20 space-y-6">
        @if($articles->count())

        {{$articles->links()}}
        @can('view', $articles[0])
            <x-articles.article-featured-card :article="$articles[0]"/>
        @endcan
            <div class="lg:grid lg:grid-cols-6">
                @foreach($articles->skip(1) as $article)
            @can('view', $article)
                <x-articles.article-card 
                    :article="$article" 
                    class="{{$loop->iteration < 3 ? 'col-span-3': 'col-span-2'}}"
                    />
            @endcan
                @endforeach
            </div> 
            {{$articles->links()}}             
        @else
            @can('create', App\models\Article::class)
                <p class="text-center">No articles yet. <x-link href="/articles/create">Create something informative</x-link>
            @else
                <p class="text-center">No articles yet. Please check back later</p>
            @endcan
        @endif
        </div>
    </section>
      
</x-app-layout>









