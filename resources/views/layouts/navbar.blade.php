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
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const navbar = document.getElementById('navbar');
    menuToggle.addEventListener('click', () => {
        navbar.classList.toggle('hidden');
        navbar.classList.toggle('block');
    });
</script>