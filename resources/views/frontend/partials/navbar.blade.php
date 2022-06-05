<nav class="shadow bg-color3 text-white sticky top-0 z-50">
    <div class="container mx-auto px-4 xl:px-0 py-5 flex justify-between items-center">
        <div class="flex items-center gap-10">
            <a href="{{ route('user.home') }}">
                <h1 class="font-bold text-2xl">WeesataPku</h1>
            </a>
            <ul class="flex items-center gap-5">
                <li><a href="{{ route('user.home') }}" class="font-medium hover:text-color1 transition-colors">Home</a></li>
                <li><a href="{{ route('user.wisata.index') }}" class="font-medium hover:text-color1 transition-colors">Wisata</a></li>
                <li><a href="{{ route('user.article.index') }}" class="font-medium hover:text-color1 transition-colors">Blog</a></li>
            </ul>
        </div>

        <div>
            @if (Route::has('login'))
                @auth    
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-white hover:text-color1 hover:border-color1 focus:outline-none focus:text-color2 focus:border-color2 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>
    
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @else
                    <div class="flex items-center gap-5">
                        <a class="hover:text-color1 transition-colors" href="{{ route('login') }}">Login</a>
                        <a class="hover:text-color1 transition-colors" href="{{ route('register') }}">Register</a>
                    </div>
                @endauth
            @endif
        </div>
    </div>
</nav>