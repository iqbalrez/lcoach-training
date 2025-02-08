<nav class="bg-white drop-shadow-md py-4 flex justify-center items-center w-full">
    <div class="flex items-center justify-between w-5xl">
        <div class="flex">
            <a href="/">
                <x-application-logo class="h-12 fill-current text-gray-500" />
            </a>
        </div>
        <div class="flex gap-10 items-center">
            <x-nav-link href="/" :active="request()->routeIs('welcome')">Home</x-nav-link>
            <x-nav-link href="/about" :active="request()->routeIs('about')">Who we are</x-nav-link>
            <x-nav-link href="/contact" :active="request()->routeIs('contact')">What we do</x-nav-link>
            <x-nav-link href="/login" :active="request()->routeIs('login')">Case studies</x-nav-link>
            <x-nav-link href="/register" :active="request()->routeIs('register')">Contact us</x-nav-link>
        </div>
    </div> 
</nav>


