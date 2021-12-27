<div class="w-7/10 mx-auto shadow-md rounded-md p-4 bg-white">
      <div class="flex justify-end mb-3 text-green-600 gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
        </svg>
        <span class="text-xs text-green-600">Search for the user using different criteria</span>
      </div>
    <form action="/users">
      <div class="flex gap-2 flex-col lg:flex-row center space-y-4">
        <div class="relative flex-1 mt-4">          
          <x-form.select  id="role" name="role" placeholder="Select a User Role" title="Role">
            <option value="" class="hover:bg-green-100">All: Roles</option>
          @foreach($roles as $role)
            <option value="{{$role->name}}" {{request('role')== $role->name? 'selected':''}} >{{$role->name}}</option>
          @endforeach
          </x-form.select>
          <x-form.label for="role">User Role</x-form.label>
          
        </div>
     
        <div class="relative flex-1">
          <x-form.input id="email" name="email" type="email"  placeholder="email" value="{{request('email')}}"/>
          <x-form.label for="email">Email</x-form.label>
          <div class="absolute right-0 top-0 mt-2 mr-2">
            <x-icon name="mail-open" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>            
          </div>
        </div>
        <div class="relative flex-1">
          <x-form.input id="surname" name="surname" type="text" placeholder="Surname" value="{{request('surname')}}"/>
          <x-form.label for="surname">Surname</x-form.label> 
          <div class="absolute right-0 top-0 mt-2 mr-2">
            <x-icon name="users" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>
          </div>
        </div>        
        <div class="relative flex-1">
          <x-form.input id="first_name" value="{{request('first_name')}}" name="first_name" type="text" placeholder="First Name"/>
          <x-form.label for="first_name">First Name</x-form.label> 
          <div class="absolute right-0 top-0 mt-2 mr-2">
            <x-icon name="user" class="h-6 w-6 text-green-600 hidden md:block" stroke-width="1"/>
          </div>
        </div>

      </div>
      <div class="flex justify-center mt-6">
        <button class="bg-white text-green-400  font-extrabold text-lg rounded-full px-6 py-3 hover:bg-green-100 ">Search</button>
      </div>
    </form>

  </div>