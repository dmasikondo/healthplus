<div class="w-7/10 mx-auto shadow-md rounded-md p-4 bg-white">
      <div class="flex justify-end mb-3 text-indigo-600 gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
        </svg>
        <span class="text-xs text-indigo-600">Search for the user using different criteria</span>
      </div>
    <form action="/candidates">
      <div class="flex gap-2 flex-col md:flex-row center">
        <div class="relative flex-1">
          <select  id="role" name="role" class="peer h-12 w-full border border-1.5 rounded-md border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-indigo-600 focus:border-2 p-3" placeholder="Select a User Role" title="Role">
          {{-- <div class="max-h-12 overflow-auto" > --}}
            <option value="" class="hover:bg-indigo-100">All: Roles</option>
          @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
          @endforeach
          </select>
          <label for="department" class="absolute left-2 px-1 -top-2.5 bg-white text-indigo-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-indigo-600 peer-focus:text-sm">User Role</label>
          
        </div>
     
        <div class="relative flex-1">
          <input id="surname" name="surname" type="text" class="peer h-12 w-full border border-1.5 rounded-md border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-indigo-600 focus:border-2 p-3" placeholder="Surname" value="{{request('surname')}}" />
          <label for="surname" class="absolute left-2 px-1 -top-2.5 bg-white text-indigo-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-indigo-600 peer-focus:text-sm">Surname</label>
          <div class="absolute right-0 top-0 mt-2 mr-2">
            <x-icon name="user" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>
          </div>
        </div>
        <div class="relative flex-1">
          <input id="first_name" value="{{request('first_name')}}" name="first_name" type="text" class="peer h-12 w-full border border-1.5 rounded-md border-gray-300 text-gray-900 placeholder-transparent focus:outline-none focus:border-indigo-600 focus:border-2 py-4 px-8" 
            placeholder="First Name" 
          />
          <label for="candidate_number" class="absolute left-2 px-1 -top-2.5 bg-white text-indigo-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-indigo-600 peer-focus:text-sm">First Name</label>
          <div class="absolute right-0 top-0 mt-2 mr-2">
            <x-icon name="identification" class="h-6 w-6 text-indigo-600 hidden md:block" stroke-width="1"/>
          </div>
        </div>

      </div>
      <div class="flex justify-center mt-6">
        <button class="bg-white text-blue-400  font-extrabold text-lg rounded-full px-6 py-3 hover:bg-indigo-100 ">Search</button>
      </div>
    </form>

  </div>