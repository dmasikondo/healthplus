                    @if(!is_null($article->published_at))
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full"> 
                        Published 
                        <x-icon name="check-circle" class="inline w-4 h-4"/>
                      </span> 

                     @else
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full"> 
                        Awaiting Publishing
                        <x-icon name="exclamation" class="inline w-4 h-4"/>
                      </span>                
                    @endif  
