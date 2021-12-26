        <header class="max-w-6xl text-center">
            <h1 class="text-4xl">
                Latest <span class="text-green-500">Health Plus</span> Articles
            </h1>

            <h2 class="inline-flex mt-2">
                Awesome articles 
                @if(isset(request()->name))
                    by {{request()->name}} {{request()->second_name}}
                @elseif(request()->routeIs('my-articles'))
                    by Me
                @else
                for tackling Hiv 
                @endif
                &nbsp;
                <img src="{{url('storage/images/healthplus_cat.png')}}" alt="Health Plus Cat" class="h-6">
            </h2>
            <p class="text-sm mt-4 space-y-2">
                <span>Another year. Another update.</span> 
                <span>Promoting Adherence, Awareness and Prevention amongst Adolescents living with Hiv by creating and maintaining good articles!</span>
            </p>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
                <!--  Category -->
                <div class="relative lg:flex lg:inline-flex items-center bg-gradient-to-br from-yellow-50 via-white to-green-50 border border-1 border-black" >
                    <x-articles.dropdown> 
                         <x-slot name="title">
                            {{isset(request()->category)? ucwords(request()->category): 'Categories'}}
                         </x-slot>
                            <x-articles.dropdown-item  href="/articles?category">All</x-articles.dropdown-item>
                            <x-articles.dropdown-item  href="/articles?category=pmtct&{{http_build_query(request()->except('category'))}}">
                                PMTCT
                            </x-articles.dropdown-item>
                            <x-articles.dropdown-item  href="/articles?category=prevention&{{http_build_query(request()->except('category'))}}">
                                Prevention
                            </x-articles.dropdown-item>
                            <x-articles.dropdown-item  href="/articles?category=treatment&{{http_build_query(request()->except('category'))}}">
                                Treatment
                            </x-articles.dropdown-item>
                        </x-articles.dropdown>
                    </div>
                <!-- Published Filters -->
                <div class="relative lg:flex lg:inline-flex items-center bg-gradient-to-br from-yellow-50 via-white to-green-50 border border-1 border-black">
                    <x-articles.dropdown> 
                         <x-slot name="title">
                            @if(isset(request()->published))
                                Published
                            @elseif(isset(request()->unpublished))
                                Unpublished
                            @else
                                Published Status
                            @endif
                         </x-slot>
                        <x-articles.dropdown-item  href="/articles?published">All</x-articles.dropdown-item>
                        <x-articles.dropdown-item  href="/articles?published=published&{{http_build_query(request()->except(['published','published']))}}">
                            Published
                        </x-articles.dropdown-item> 
                        <x-articles.dropdown-item  href="/articles?unpublished=unpublished&{{http_build_query(request()->except(['published','published']))}}">
                            Unpublished
                        </x-articles.dropdown-item>                                 
                    </x-articles.dropdown>   
                </div>

                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gradient-to-br from-yellow-50 via-white to-green-50 rounded-xl px-3 py-2">
                    <form method="GET" action="">
                        <input type="hidden" name="category" value="{{request()->category}}">
                        <input type="hidden" name="published" value="{{request()->published}}">
                        <input type="hidden" name="unpublished" value="{{request()->unpublished}}">
                        <input type="text" name="content" placeholder="Find something, (enter)" value="{{request()->content}}" 
                               class="bg-transparent placeholder-black font-semibold text-sm">
                    </form>
                </div>               
            </div>
        </header>