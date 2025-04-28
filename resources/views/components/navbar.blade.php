<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="w-screen md:w-3xl lg:w-4xl xl:w-5xl mx-auto px-6 xl:px-0">
        <div class="flex justify-between w-full h-16">
            <div class="flex justify-between w-full">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('user.landing.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 md:flex">        
                    <x-nav-link href="/" :active="request()->routeIs('user.landing.index')">Home</x-nav-link>
                    <x-nav-link href="/who" :active="request()->routeIs('user.landing.who')">Who we are</x-nav-link>
                    <x-nav-link href="/what" :active="request()->routeIs('user.landing.what.*')">What we do</x-nav-link>
                    <x-nav-link href="/case-studies" :active="request()->routeIs('user.landing.case-studies.*')">Case studies</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->routeIs('user.landing.contact')">Contact us</x-nav-link>
                </div>
            </div>
            
            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="/" :active="request()->routeIs('user.landing.index')">Home</x-responsive-nav-link>
            <x-responsive-nav-link href="/who" :active="request()->routeIs('user.landing.who')">Who we are</x-responsive-nav-link>
            <x-responsive-nav-link href="/what" :active="request()->routeIs('user.landing.what.*')">What we do</x-responsive-nav-link>
            <x-responsive-nav-link href="/case-studies" :active="request()->routeIs('user.landing.case-studies.*')">Case studies</x-responsive-nav-link>
            <x-responsive-nav-link href="/contact" :active="request()->routeIs('user.landing.contact')">Contact us</x-responsive-nav-link>
        </div>

    </div>
</nav>
