<div  class="max-w-7xl mx-auto mt-12">
    <div class="inset-0 fixed overflow-y-auto px-4 py-6 md:py-24 z-40" x-data="{show: @entangle($attributes->wire('model')).defer}" 
            x-show="show"
            x-on:keydown.escape.window="show=false"
        >
        <div  style="display: none;" class="fixed inset-0 transform" x-show="show" x-on:click="show=false" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75">
                
            </div>
        </div>

        <div style="display: none;" x-show="show" class="bg-white rounded-lg overflow-hidden transform sm:w-full sm:mx-auto max-w-3xl p-4" 
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >

                <!-- Title / Close-->
            <div class="flex items-center justify-between mt-12">
                <h2 class="flex-auto justify-center mr-3 text-black max-w-none mt-12 mb-4 border-b-4 border-indigo-500 text-3xl text-center">{{$title}}</h2>

                <button type="button" class="z-50 cursor-pointer text-red-600" @click="show = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
           
            {{$slot}}
        </div>

    </div>    
</div>
