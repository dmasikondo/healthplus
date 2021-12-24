@props(['article'])
<article
    class="transition-colors duration-300 hover:bg-gradient-to-br hover:from-yellow-50 hover:via-white hover:to-green-50 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            @include('partials._isImageOrVideo')
        </div>

        <div class="flex-1 flex flex-col justify-between">
            @include('partials._createdon-headers')

            <div class="text-sm mt-2">
                 {{Str::words($article->description, 80)}}

            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{ url('storage/images/healthplus_cat.png') }}" alt="Health Plus Cat" class="h-8 w-10">
                    <div class="ml-3">
                        <h5 class="font-bold">
                             <a href="/articles?name={{$article->user->first_name}}&second_name={{$article->user->surname}}" class="text-gray-900 hover:text-green-500 font-bold no-underline hover:underline">
                                {{$article->user->first_name}} {{$article->user->surname}}
                             </a>
                            
                        </h5>
                        <h6>
                            @foreach($article->user->roles as $role)
                                {{$role->name}}
                            @endforeach
                            at Health Plus
                        </h6>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/articles/{{$article->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-green-200 hover:bg-green-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>