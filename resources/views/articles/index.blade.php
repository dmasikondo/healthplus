<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-900 leading-tight">
            {{ __('Articles') }} 
        </h2>
    </x-slot> 
    <section class="px-6 py-8">

        @include('partials._articles-header')
        <div class="max-w-6xl mt-6 lg:mt-20 space-y-6">
            <x-session-message/>
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
            @can('create', App\models\Article::class)
                <p class="text-center">No articles yet. <x-link href="/articles/create">Create something informative</x-link>
            @else
                <p class="text-center">No articles yet. Please check back later</p>
            @endcan
        @endif
        </div>
    </section>
      
</x-app-layout>









