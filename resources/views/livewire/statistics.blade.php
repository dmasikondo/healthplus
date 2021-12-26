<div class="h-full mt-14 mb-10">
     <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
    {{-- admins and superadmins --}}
    @if(Auth::user()->hasRole('admin')|| Auth::user()->hasRole('superadmin'))
        <x-statistics-card>
            <x-slot name="symbol">users</x-slot>
            <x-slot name="number">{{$users}}</x-slot>
            <x-slot name="title">Users</x-slot>
        </x-statistics-card> 
        <x-statistics-card>
            <x-slot name="symbol">emoji-happy</x-slot>
            <x-slot name="number">{{$active_users}}</x-slot>
            <x-slot name="title">Active Users</x-slot>
        </x-statistics-card>  
        <x-statistics-card>
            <x-slot name="symbol">mail-open</x-slot>
            <x-slot name="number">{{$usersWithUnverifiedEmail}}</x-slot>
            <x-slot name="title">Users with unverified email</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">emoji-sad</x-slot>
            <x-slot name="number">{{$inactive_users}}</x-slot>
            <x-slot name="title">Inactive Users</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">lock-closed</x-slot>
            <x-slot name="number">{{$active_users}}</x-slot>
            <x-slot name="title">Suspended Users</x-slot>
        </x-statistics-card> 
        <x-statistics-card>
            <x-slot name="symbol">globe-alt</x-slot>
            <x-slot name="number">{{$superadmin_users}}</x-slot>
            <x-slot name="title">Superadmins</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">finger-print</x-slot>
            <x-slot name="number">{{$admin_users}}</x-slot>
            <x-slot name="title">Admins</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">printer</x-slot>
            <x-slot name="number">{{$publisher_users}}</x-slot>
            <x-slot name="title">Publishers</x-slot>
        </x-statistics-card> 
        <x-statistics-card>
            <x-slot name="symbol">pencil</x-slot>
            <x-slot name="number">{{$author_users}}</x-slot>
            <x-slot name="title">Authors</x-slot>
        </x-statistics-card> 
    @endif                      
    {{-- ./admins and superadmins --}}
    {{-- superadmins and publishers --}}
    @if(Auth::user()->hasRole('superadmin')|| Auth::user()->hasRole('publisher'))
        <x-statistics-card>
            <x-slot name="symbol">clipboard-list</x-slot>
            <x-slot name="number">{{$articles}}</x-slot>
            <x-slot name="title">Articles</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">eye</x-slot>
            <x-slot name="number">{{$published_articles}}</x-slot>
            <x-slot name="title">Published Articles</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">eye-off</x-slot>
            <x-slot name="number">{{$unpublished_articles}}</x-slot>
            <x-slot name="title">Not Published Articles</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">adjustments</x-slot>
            <x-slot name="number">{{$pmtct_articles}}</x-slot>
            <x-slot name="title">PMTCT Articles</x-slot>
        </x-statistics-card> 
        <x-statistics-card>
            <x-slot name="symbol">ban</x-slot>
            <x-slot name="number">{{$prevention_articles}}</x-slot>
            <x-slot name="title">Prevention Articles</x-slot>
        </x-statistics-card>
        <x-statistics-card>
            <x-slot name="symbol">beaker</x-slot>
            <x-slot name="number">{{$treatment_articles}}</x-slot>
            <x-slot name="title">Treatment Articles</x-slot>
        </x-statistics-card> 
    @endif
    {{-- ./superadmins and publishers --}}
    </div>
</div>
