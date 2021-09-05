<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-800 leading-tight">
            {{ __('Quiz ') }} 
        </h2>
    </x-slot> 
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">                     
     <div class="mt-4 mx-4">
      <div class="max-w-7xl overflow-hidden rounded-lg shadow-xs">
        <div class="grid md:grid-cols-2 md:gap-4 text-gray-900 my-4 pr-6">
    @foreach($quizzes as $quiz)
            <div class=" px-4 md:px-6 text-xl text-gray-800 leading-normal border-b-2 border-gray-200 py-4" style="font-family:Georgia,serif;">
                <div class="font-sans my-4">
                    <p class="text-base md:text-sm text-green-500 font-bold"> 
                       
                    </p>
                    <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                        {{$quiz->question}}
                    </h1>
                    <p class="text-sm md:text-base font-normal text-gray-600">
                        Published {{Carbon\Carbon::parse($quiz->created_at)->format('D d M Y h:i:s')}}
                    </p>
                    <p class="text-xs text-gray-800 flex flex-col md:flex-row">
                        <span  class="flex-1">Written By {{$quiz->user->first_name}} {{$quiz->user->surname}} </span>                              
                        <span  class="flex-justify-end">Last Updated {{$quiz->updated_at->diffForHumans()}}</span>
                    </p>                        
                </div>
                <div class="flex mb-4 items-center">
                    <p class="w-full text-grey-darkest">{{$quiz->answer}}</p>
                    <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green-700 border-green-700 hover:bg-green-300">
                        Correct
                    </button>

                </div>
                <div class="flex mb-4 items-center">
                    <p class="w-full text-grey-darkest">{{$quiz->allChoices[1]}}</p>
                    <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red-700 border-red-700 hover:text-white hover:bg-red-300">
                        Incorrect
                    </button> 
                </div>  
                <div class="flex mb-4 items-center">
                    <p class="w-full text-grey-darkest">{{$quiz->allChoices[2]}}</p>
                    <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red-700 border-red-700 hover:text-white hover:bg-red-300">
                        Incorrect
                    </button> 
                </div>                                

                <div class="">
                    <p class="space-y-2">
                        <span class="text-semibold text-gray-500">Instruction was:</span>
                        <span>{{$quiz->instructionText}}</span>
                    </p>
                </div> 

            </div>
        @endforeach
        </div>
      </div>
     </div>
 </div>
      
</x-app-layout>









