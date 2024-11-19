<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.4.7/flowbite.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="bg-black border-b border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <span class="self-center text-2xl font-semibold">One-stop-fitness</span>
        <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-white rounded-lg md:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">
            <span class="sr-only">menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div id="navbar" class="hidden w-full md:block md:w-auto">
        <ul class="font-medium flex flex-col p-4 mt-4 bg-black rounded-lg md:flex-row md:space-x-8 md:mt-0">
    <li><a href="{{ route('home') }}" class="py-2 px-4 text-white hover:bg-gray-800 rounded transition-all">Home</a></li>

    @if(Auth::check() && Auth::user()->role === 'coach')
        <li><a href="{{ route('coach.dash') }}" class="py-2 px-4 text-white hover:bg-gray-800 rounded transition-all">Schedule</a></li>
    @else
        <li><a href="{{ route('coach.classes') }}" class="py-2 px-4 text-white hover:bg-gray-800 rounded transition-all">Bookings</a></li>
    @endif

    @if(Auth::check())
        <li><a href="{{ url('profile/show') }}" class="py-2 px-4 text-white hover:bg-gray-800 rounded transition-all">Profile</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button 
                    type="submit" 
                    class="px-4 py-1 -mt-2 text-white border-2 border-[#71C9CE] hover:bg-gray-800 rounded-lg transition-all"
                >
                    Logout
                </button>
            </form>
        </li>
    @else
        <li>
            <a 
                href="{{ route('login') }}" 
                class="py-1 -mt-2 px-4 text-white border-2 border-[#71C9CE] hover:bg-gray-800 rounded-lg transition-all"
            >
                Login
            </a>
        </li>
    @endif
</ul>

        </div>
    </div>
</nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Your Information</h2>
                    <ul class="space-y-2">
                        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                        <li><strong>Role:</strong> {{ Auth::user()->role }}</li>
                    </ul>
                    <div class="mt-4">
                        <a 
                            href="{{ route('profile.edit') }}" 
                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all"
                        >
                            Edit Information
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    
