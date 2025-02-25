<nav class="navbar rounded-b-xl" id="navbar">
    <div class="container relative flex flex-wrap items-center justify-between">
        <div class="nav-icons flex items-center lg_992:order-2 md:ms-6">
            <ul class="list-none menu-social mb-0 flex items-center space-x-3">
                <li>
                    <a href="{{ route('index') }}" 
                       class="size-8 flex items-center justify-center rounded-full 
                              {{ request()->routeIs('index') ? 'bg-red-500 text-white' : 'bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white' }}">
                        <i data-feather="home" class="size-4"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" 
                       class="size-8 flex items-center justify-center rounded-full 
                              {{ request()->routeIs('profile') ? 'bg-red-500 text-white' : 'bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white' }}">
                        <i data-feather="user" class="size-4"></i>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="h-8 px-4 text-[12px] tracking-wider flex items-center justify-center font-medium rounded-full bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white"><i data-feather="log-out" class="size-4"></i></button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="navigation lg_992:order-1 lg_992:flex hidden ms-auto" id="menu-collapse">
            
        </div>
    </div>
</nav>
