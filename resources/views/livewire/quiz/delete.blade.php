<div>
    <x-modal wire:model="show">   
        <!-- content -->
      <x-slot name="title">
        {{$question}} 
      </x-slot>
      <div class="m-4 p-4">
         <div class="md:col-span-2 xl:col-span-1">
            <div class="rounded bg-green-500 p-3">
              <div class="flex justify-between py-1 text-white">
                <h3 class="text-sm font-semibold overflow-auto"> Author: Dee Masi</h3>
                <p class="uppercase text-sm"> Created <small>{{$created}}</small></p>
              </div>
              <div class="text-sm text-black dark:text-gray-50 mt-2">
               {{--  <div class="bg-white  p-2 rounded mt-1 border-b border-green-100 text-lg font-semibold"> 
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, corporis.

                </div> --}}
             
                <div class="bg-white p-2 rounded mt-1 border-b border-gray-100 ">
                    Are you sure you want to delete this quiz question and all it's options?</div>
                <div class="bg-white p-2 rounded mt-1 border-b border-gray-100">
                  Do  not delete if you <span class="text-green-700">are not sure</span> proceed only when you are sure <span class="text-red-700">To Delete</span>

                </div>
                <p class="mt-3 text-gray-600 dark:text-gray-400">You may not be able to recover deleted content</p>
              </div>
            </div>
          </div> 

        <div class="flex justify-center pb-3 text-grey-dark my-4">
          <div class="text-center mr-3 border-r mx-8 pr-3">
            <h2></h2>
            <button class="font-semibold text-red-700" wire:click="yesDelete"  wire:loading.remove wire:target="yesDelete">Delete</button>
                  <span wire:loading wire:target="yesDelete">
                    Processing ...
                  </span>             
          </div>
          <div class="ml-16 text-center">
            <h2></h2>
            <button class="font-semibold text-green-500" wire:click="dontDelete"  wire:loading.remove wire:target="dontDelete">Cancel</button>
                  <span wire:loading wire:target="dontDelete">
                    Processing ...
                  </span>            
          </div>
        </div>        
                                             

      </div>
  </x-modal>
</div>
