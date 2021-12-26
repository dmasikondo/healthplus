<header>
    <div class="space-x-2">
        <a href="/articles?category={{strtolower($article->category)}}"
           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
           style="font-size: 10px">{{$article->category}}</a>

        <a href="/articles?{{!is_null($article->published_at)? 'published=published': 'unpublished=unpublished'}}"
           class="px-3 py-1 border {{!is_null($article->published_at)? 'border-green-300 hover:bg-green-200 text-green-300': 'border-red-300 hover:bg-red-200 text-red-300'}} rounded-full text-xs uppercase font-semibold"
           style="font-size: 10px">{{!is_null($article->published_at)? 'Published': 'Not Published'}}</a>
    </div>

    <div class="mt-4">
        <h1 class="text-3xl">
            <a href="/articles/{{$article->slug}}" class="font-bold uppercase text-gray-900 hover:text-green-500 font-bold no-underline hover:underline">
                {{$article['title']}}
            </a>
        </h1>
        <p class="text-xs text-gray-400 flex flex-col md:flex-row">                        
            <span  class="flex-1">Created <time>{{Carbon\Carbon::parse($article->created_at)->format('D d M Y h:i:s')}}</time> </span>
            <span  class="flex-justify-end">Last Updated {{$article->updated_at->diffForHumans()}}</span>
        </p> 
        @if(!is_null($article->published_at))
            <p class="text-xs text-gray-400">
                <span  class="flex-1">Published {{$article->published_at->diffForHumans()}} </span>
            </p>
        @endif                                       
    </div>
</header>