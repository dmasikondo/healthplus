<div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activate your account') }} 
        </h2>
    </x-slot>
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-indigo-200 shadow-inner">
            <div class="mb-6 p-6 sm:px-20 bg-white border-b border-gray-200 shadow-lg">
                <div>
                    <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                        <x-session-message/>
                        <h3 class="pt-4 text-2xl text-center">Activating Your Account!</h3>
                        <form action="/users/activate-account" method="post" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf
                            @method('put')
                            <input type="hidden" name="checkit" value="{{$slug}}">


                        <div class="flex gap-2 flex-col md:flex-row center">            
                                <div class="mt-4 relative flex-1">
                                    <x-form.input id="first_name" type="text" name="first_name" placeholder="Surname" value="{{old('first_name')}}"  required/> 
                                    <x-form.label for="first_name">First Name</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="user" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>                           
                                    </div>
                                    <p class="text-red-900 italic text-sm">@error('first_name') {{$message}} @enderror</p>                    
                                </div>

                                <div class="mt-4 relative flex-1">
                                    <x-form.input id="second_name" type="text" name="second_name" placeholder="Second Name" value="{{old('second_name')}}" required/> 
                                    <x-form.label for="second_name">Last Name</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="user-group" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>                           
                                    </div>
                                    <p class="text-red-900 italic text-sm">@error('second_name') {{$message}} @enderror</p>                    
                                </div>   
                        </div>

                        <div class="flex gap-2 flex-col md:flex-row center">            
                                <div class="mt-4 relative flex-1">
                                    <x-form.input id="password" type="password" name="password" placeholder="Password" required/> 
                                    <x-form.label for="password">Password</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="lock-closed" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>                           
                                    </div>
                                    <p class="text-red-900 italic text-sm">@error('password') {{$message}} @enderror</p>                    
                                </div>

                                <div class="mt-4 relative flex-1">
                                    <x-form.input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required/> 
                                    <x-form.label for="password_confirmation">Confirm Password</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="key" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>                           
                                    </div>                 
                                </div>  
                        </div>









                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                        First Name
                                    </label>
                                    <input name="first_name" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('first_name') border-red-500 @enderror" id="firstName" type="text" placeholder="First Name " value="{{old('first_name')}}">
                                    @error('first_name')<p class="text-xs italic text-red-500">{{$message}}</p>@enderror
                                </div>
                                <div class="md:ml-2 ">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="second_name">
                                        Last Name
                                    </label>
                                    <input name="second_name" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('last_name') border-red-500 @enderror" id="second_name" type="text" placeholder="Last Name" value="{{old('second_name')}}">
                                    @error('second_name')<p class="text-xs italic text-red-500">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                        Password
                                    </label>
                                    <input name="password" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border @error('password') border-red-500 @enderror rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                                    @error('password')<p class="text-xs italic text-red-500">{{$message}}</p>@enderror
                                </div>
                                <div class="md:ml-2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">
                                        Confirm Password
                                    </label>
                                    <input name="password_confirmation" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="" type="password" placeholder="******************">
                                </div>
                            </div>
                            
                            <div class="mb-6 text-center">
                                <button class="w-full px-4 py-2 font-bold text-white bg-indigo-500 rounded-full hover:bg-indigo-700 focus:outline-none focus:shadow-outline" type="submit">
                                    Activate Account
                                </button>
                            </div>
                            <hr class="mb-6 border-t">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>
</div>