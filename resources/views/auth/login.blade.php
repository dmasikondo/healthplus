<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
            <p class="text-green-700 text-2xl font-extrabold pt-2">HealthPlus</p>
        </x-slot>
        <x-session-message/>
        <x-session-warning/>
        <x-jet-validation-errors class="mb-4" />
        <div class="fixed inset-0 z-0 hidden lg:block" style="z-index: 0;">
            <img  src="/storage/images/wave.png" style="z-index:0;" >
        </div>
        

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="z-100 relative" style="position: relative;">
            @csrf
        <div class="flex gap-2 flex-col md:flex-row center">            
                <div class="mt-4 relative flex-1">
                    <x-form.input id="email" type="email" name="email" placeholder="Email" value="{{old('email')}}" required/> 
                    <x-form.label for="email">Email</x-form.label>             
                    <div class="absolute right-0 top-0 mt-2 mr-2">
                        <x-icon name="mail-open" class="h-6 w-6 text-green-600 " stroke-width="1"/>                           
                    </div>
                    <p class="text-red-900 italic text-sm">@error('email') {{$message}} @enderror</p>                    
                </div>      
        </div>

        <div class="flex gap-2 flex-col md:flex-row center">            
                <div class="mt-4 relative flex-1">
                    <x-form.input id="password" type="password" name="password" placeholder="Password" required/> 
                    <x-form.label for="password">Password</x-form.label>             
                    <div class="absolute right-0 top-0 mt-2 mr-2">
                        <x-icon name="lock-open" class="h-6 w-6 text-green-600 " stroke-width="1"/>                           
                    </div>
                    <p class="text-red-900 italic text-sm">@error('password') {{$message}} @enderror</p>                    
                </div>  
        </div>    

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 space-x-2">
                @if (Route::has('password.request'))
                    <p>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password? ') }} 
                        </a>                        
                    </p>

                @endif
                    <p>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/register">
                            {{ __(' Not registered?') }}
                        </a>                         
                    </p>

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
