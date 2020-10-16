@component('components.app') 
    <form method="POST" action="{{ $user->path() }}">
        @csrf
        @method('PATCH')

        <div class="mb-6">

            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="name"
                id="name"
                value="{{ $user->name }}"
                required
            ></input>

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">

            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Username
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="username"
                id="username"
                value="{{ $user->username }}"
                required
            ></input>

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            
        </div>
        

        
        <div class="mb-6">

            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="email"
                name="email"
                id="email"
                value="{{ $user->email }}"
                required
            ></input>

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            
        </div>

        <div class="mb-6">

            <label for="passowrd" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="Passowrd"
                name="passowrd"
                id="passowrd"
                required
            ></input>

            @error('passowrd')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            
        </div>

        <div class="mb-6">

            <label for="passowrd_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password Confirmation
            </label>

            <input class="border border-gray-400 p-2 w-full"
                type="passowrd"
                name="passowrd_confirmation"
                id="passowrd_confirmation"
                required
            ></input>

            @error('passowrd_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            
        </div>

        <div class="mb-6">
            <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >Submit
            </button>
        </div>
        
        
    </form>
@endcomponent('components.app')