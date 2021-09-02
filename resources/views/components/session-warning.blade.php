<div>
  <!-- session warning message -->
  @if(session()->has('warning'))
    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 "  x-data="{ show: true }" x-show="show" x-init="setTimeout(()=>show=false, 10000)">
            <div slot="avatar" class="mr-2">
                <x-icon name="exclamation" class="h-4 w-4 space-x-2 mr-2"/>
            </div>
            <div class="text-sm font-normal  max-w-full flex-initial">
                {{session('warning')}}
            </div>
            <div class="flex flex-auto flex-row-reverse">
                <div @click="show = false">
                    <x-icon name="x" class="h-4 w-4 cursor-pointer"/>
                </div>
            </div>
        </div>
      @endif
  <!-- end of session message --> 
</div>