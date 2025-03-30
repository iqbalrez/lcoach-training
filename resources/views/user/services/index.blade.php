<x-guest-layout>
    {{-- Hero --}}
    <section class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-screen md:w-3xl lg:w-4xl xl:w-5xl h-fit items-center px-6 py-12 lg:px-0 md:py-12">
            <div class="flex items-center h-fit col-span-9">
                <div class="justifty-center text-center md:text-start w-full">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 md:pr-24">{{ $webConfig->hero_what_copywriting}}</h1>
                </div>
            </div>
            
            <div class="hidden md:block col-span-3 h-fit relative rounded-2xl overflow-hidden w-full">
                    <img class="w-full aspect-square object-cover rounded-2xl" src="{{ $webConfig->hero_what_image != null ? asset('storage/web_config/' . $webConfig->hero_what_image)  : 'https://placehold.jp/200x200.png'  }}" alt="What we do image">
            </div>
        </div> 
    </section>

    {{-- Services --}}
    <section class="flex justify-center bg-gray-50 px-6 md:px-0 py-12">
        <div class="w-screen md:w-3xl lg:w-4xl xl:w-5xl">
            <h2 class="text-3xl text-center font-bold text-blue-950 mb-6">Our services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($services as $service)
                {{-- Card --}}
                <div class="hover:scale-105 transition-transform rounded-2xl overflow-hidden bg-white drop-shadow-md w-full flex flex-col gap-8 h-auto">
                    <div class="flex flex-col gap-2">
                        <img class="w-full aspect-[4/3] object-cover bg-gray-100 bg-blend-multiply" src="{{ $service->image != null ? asset('storage/services/' . $service->image) : 'https://placehold.jp/150x150.png' }}" alt="{{ $service->title }} illustration">
                        <div class="px-6 py-3 flex flex-col gap-2">
                            <h3 class="text-xl font-bold text-blue-950">{{ $service->title }}</h3>
                            <hr class="border border-gray-300 my-2"></hr>
                            <p class="text-gray-800"> {{ $service->description }} </p>
                        </div>
                    </div>
                    
                    <div class="items-end justify-end h-full bg-transparent flex px-6 pb-6">
                        <a href="{{route('user.landing.what.detail', $service->id)}}" class="flex gap-2 items-center text-amber-500 gap-x-2"><p class="hover:text-blue-950 text-black">Read more</p> <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
                    </div>
                </div>
                @endforeach
            </div> 
        </div>
    </section>

    {{-- CTA --}}
    <section class="flex-col justify-center bg-white px-6 md:px-0 py-12">
        <div class="mx-auto w-full justify-center text-center gap-2">
            <h2 class="text-center text-3xl font-bold text-blue-950 mb-6">Looking to elevate your business?</h2>
            <a href="/contact">
                <button class="inline-block bg-amber-500 hover:bg-blue-950 text-white font-semibold px-6 py-3 rounded transition-colors">
                    Contact us
                </button>
            </a>
        </div>
    </section>

    <x-footer></x-footer>
</x-guest-layout>