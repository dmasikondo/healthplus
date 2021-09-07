<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
            <p class="text-green-700 text-2xl font-extrabold pt-2">HealthPlus</p>
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        {{-- <img class="fixed inset-0 -z-10 hidden lg:block" src="/storage/images/wave.png" > --}}
        <div class="fixed inset-0 z-0 hidden lg:block" style="z-index: 0;">
            <img  src="/storage/images/wave.png" >
        </div>
        <div class="{{-- flex flex-end items-center --}}">
            {{-- <img class="w-1/2" src="/storage/images/bg.svg"> --}}
        </div>  

 
   {{--  <div class="z-100"> --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

        <div class="flex gap-2 flex-col md:flex-row center lg:min-w-7xl">            
                <div class="mt-4 relative flex-1">
                    <x-form.input id="surname" type="text" name="surname" placeholder="Surname" value="{{old('surname')}}" required/> 
                    <x-form.label for="surname">Surname</x-form.label>             
                    <div class="absolute right-0 top-0 mt-6 mr-2">
                        <x-icon name="user-group" class="h-6 w-6 text-green-600 " stroke-width="1"/>                           
                    </div>
                    <p class="text-red-900 italic text-sm">@error('surname') {{$message}} @enderror</p>                    
                </div>

                <div class="mt-4 relative flex-1">
                    <x-form.input id="first_name" type="text" name="first_name" placeholder="Names" value="{{old('first_name')}}" required/> 
                    <x-form.label for="first_name">First Name(s)</x-form.label>             
                    <div class="absolute right-0 top-0 mt-6 mr-2">
                        <x-icon name="user" class="h-6 w-6 text-green-600 " stroke-width="1"/>                           
                    </div>
                    <p class="text-red-900 italic text-sm">@error('names') {{$message}} @enderror</p>                    
                </div>    
        </div>

        <div class="flex gap-2 flex-col md:flex-row center">            
                <div class="mt-4 relative flex-1">
                    <x-form.input id="email" type="email" name="email" placeholder="Email" value="{{old('email')}}" required/> 
                    <x-form.label for="email">Email</x-form.label>             
                    <div class="absolute right-0 top-0 mt-6 mr-2">
                        <x-icon name="mail-open" class="h-6 w-6 text-green-600 " stroke-width="1"/>                           
                    </div>
                    <p class="text-red-900 italic text-sm">@error('email') {{$message}} @enderror</p>                    
                </div>      
        </div>

        <div class="flex gap-2 flex-col md:flex-row center">            
                <div class="mt-4 relative flex-1">
                    <x-form.input id="password" type="password" name="password" placeholder="Password" required/> 
                    <x-form.label for="password">Password</x-form.label>             
                    <div class="absolute right-0 top-0 mt-6 mr-2">
                        <x-icon name="lock-closed" class="h-6 w-6 text-green-600 " stroke-width="1"/>                           
                    </div>
                    <p class="text-red-900 italic text-sm">@error('password') {{$message}} @enderror</p>                    
                </div>

                <div class="mt-4 relative flex-1">
                    <x-form.input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required/> 
                    <x-form.label for="password_confirmation">Confirm Password</x-form.label>             
                    <div class="absolute right-0 top-0 mt-6 mr-2">
                        <x-icon name="key" class="h-6 w-6 text-green-600 " stroke-width="1"/>                           
                    </div>                 
                </div>  
        </div>      

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 cursor-pointer" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
                <x-jet-button class="ml-4 cursor-pointer">
                    <a href="/">
                        <x-icon name="home" class="w-5 h-5"/>
                    </a>
                </x-jet-button>                
            </div>
        </form>
  {{--   </div>  --}}   

    </x-jet-authentication-card>
</x-guest-layout>
