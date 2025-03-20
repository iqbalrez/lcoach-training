<x-guest-layout>
    {{-- Hero --}}
    <section class="flex justify-center bg-white">
        <div class="grid grid-cols-1 gap-6 max-w-screen md:max-w-6xl h-fit items-center px-6 pt-12 md:px-0">
            <div class="flex items-center h-fit">
                <div class="justifty-center text-center w-full">
                    <h1 class="text-2xl md:text-4xl font-bold text-gray-800">{{ $webConfig->hero_who_copywriting }}</h1>
                    </div>
            </div>
            
            <div class="h-fit relative rounded-2xl">
                <div class="flex flex-col justify-center">
                    <img class="md:w-3/4 mx-auto aspect-video object-cover rounded-2xl" src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image of a person working on a laptop">
                    
                    <div class="-translate-y-24 mx-auto px-8 pt-6 w-5/6 md:w-2/3 bg-white rounded-2xl flex flex-col gap-3">
                        <h2 class="text-2xl font-bold text-blue-950">{{ $webConfig->subheading_who }}</h2>
                        <p class="leading-relaxed">
                        {!! $webConfig->who_copywriting !!}
                        <p>
                        <div class="grid md:grid-cols-2 gap-6 md:pt-6">
                            <div class="relative">
                                <img class="w-full aspect-video object-cover rounded-xl" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                                <div class="md:absolute md:block hidden rounded-full w-fit isolate bottom-8 -left-1/2 px-4 py-4 bg-amber-500">
                                    <h2 class="text-xs md:text-sm text-white">Business Training, PT. Abadi Jaya</h2>
                                </div>
                            </div>
                            <div class="relative">
                                <img class="w-full aspect-video object-cover rounded-xl" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                                <div class="md:absolute md:block hidden rounded-full w-fit isolate -top-8 -right-1/2 -translate-x-1/2 px-4 py-4 bg-amber-500">
                                    <h2 class="text-xs md:text-sm text-white">Coaching, Mandiri Inhealth</h2>
                                </div>
                            </div>
                            <div class="relative">
                                <img class="w-full aspect-video object-cover rounded-xl" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                                <div class="md:absolute md:block hidden rounded-full w-fit isolate  -bottom-8 -left-1/2 translate-x-1/2 px-4 py-4 bg-amber-500">
                                    <h2 class="text-xs md:text-sm text-white">Coaching, Pertamina</h2>
                                </div>
                            </div>
                            <div class="relative">
                                <img class="w-full aspect-video object-cover rounded-xl" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                                <div class="md:absolute md:block hidden rounded-full w-fit isolate top-8 -right-1/2 px-4 py-4 bg-amber-500">
                                    <h2 class="text-xs md:text-sm text-white">Digital Training, Astra International</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>

    {{-- Services --}}
    <section class="flex justify-center bg-gray-50 px-6 md:px-0 py-12">
        <div class="md:w-5xl">
            <h2 class="text-3xl text-center font-bold text-blue-950 mb-6">Our values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-screen md:w-3xl lg:w-4xl xl:w-5xl mx-auto items-center">
                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md w-full justify-center">
                    <img class="w-full aspect-video md:aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="text-center text-lg font-bold text-blue-950">Mindset</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>

                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md w-full justify-center">
                    <img class="w-full aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="text-center text-lg font-bold text-blue-950">Skillset</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>
                                
                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md w-full justify-center">
                    <img class="w-full aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2">
                        <h3 class="text-center text-lg font-bold text-blue-950">Toolset</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="flex-col justify-center bg-white px-6 md:px-0 py-12">
        <div class="mx-auto md:w-5xl justify-center text-center gap-2">
            <h2 class="text-center text-3xl font-bold text-blue-950 mb-6">Want to learn more about us?</h2>
            <a href="/contact">
                <button class="inline-block bg-amber-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded">
                    Contact us
                </button>
            </a>
        </div>
    </section>

    <x-footer></x-footer>
</x-guest-layout>