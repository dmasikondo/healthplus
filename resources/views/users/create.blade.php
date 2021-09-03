<div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-xl text-indigo-200 leading-tight">
            {{ __('Register a user') }} 
        </h2>
    </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl {{-- mx-auto --}} sm:px-6 lg:px-8  shadow-inner">
            <div class="mb-6 {{-- p-6 sm:px-20 --}} bg-white border-b border-gray-200 shadow-lg">
                <div>
                    <div class="w-full bg-white p-5 rounded-lg lg:rounded-l-none">
                        <x-session-message/>
                        <x-jet-validation-errors class="mb-4" />
                        <h3 class="pt-4 text-2xl text-center text-gray-300">Create a Member of Staff's  User Account!</h3>
                        <form action="/users/registration" method="post" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf

                        <div class="flex gap-2 flex-col md:flex-row center">            
                                <div class="mt-4 relative flex-1">
                                    <x-form.input id="first_name" type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}"  required/> 
                                    <x-form.label for="first_name">First Name</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="user" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>                           
                                    </div>
                                    <p class="text-red-900 italic text-sm">@error('first_name') {{$message}} @enderror</p>                    
                                </div>

                                <div class="mt-4 relative flex-1">
                                    <x-form.input id="surname" type="text" name="surname" placeholder="Surname" value="{{old('surname')}}" required/> 
                                    <x-form.label for="surname">Surname</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="user-group" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>                           
                                    </div>
                                    <p class="text-red-900 italic text-sm">@error('last_name') {{$message}} @enderror</p>                    
                                </div>   
                        </div>

                        <div class="flex gap-2 flex-col md:flex-row center">            
                                <div class="mt-4 relative flex-1">
                                    <x-form.input id="email" type="email" name="email" placeholder="Email" value="{{old('email')}}" required/> 
                                    <x-form.label for="email">Email</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="mail-open" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>                           
                                    </div>
                                    <p class="text-red-900 italic text-sm">@error('email') {{$message}} @enderror</p>                    
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

                        <div class="flex gap-2 flex-col md:flex-row center my-4">            
                                <div class="mt-4 relative flex-1">
                                    <x-form.select id="role"  name="role" placeholder="Select a User Role" required> 
                                        <option value="" class="py-4 border-l-4 border-transparent hover:border-blue-500 "></option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" class="h-12">{{$role->name}}</option>
                                    @endforeach 
                                    </x-form.select>
                                    <x-form.label for="role">Select a User Role</x-form.label>             
                                    <div class="absolute right-0 top-0 mt-6 mr-2">
                                        <x-icon name="tag" class="h-6 w-6 text-indigo-600 " stroke-width="1"/>                           
                                    </div>
                                    <p class="text-red-900 italic text-sm">@error('role') {{$message}} @enderror</p>                    
                                </div>               
                        </div>        
                          <div class="my-6 text-center">
                                <button class="w-full px-4 py-2 font-bold text-white bg-indigo-500 rounded-full hover:bg-indigo-700 focus:outline-none focus:shadow-outline" type="submit">
                                    Register User Account
                                </button>
                            </div>
                            <hr class="mb-6 border-t">
                        </form>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
</div>