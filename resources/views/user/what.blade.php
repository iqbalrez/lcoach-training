<x-guest-layout>
    {{-- Hero --}}
    <section class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-screen md:w-3xl lg:w-4xl xl:w-5xl h-fit items-center px-6 py-12 md:px-0 md:py-12">
            <div class="flex items-center h-fit col-span-9">
                <div class="justifty-center text-center md:text-start w-full">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 md:pr-24">We believe in empowering businesses and individuals to reach their full potential.</h1>
                </div>
            </div>
            
            <div class="hidden md:block col-span-3 h-fit relative rounded-2xl overflow-hidden w-full">
                    <img class="w-full aspect-square object-cover rounded-2xl" src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image of a person working on a laptop">
            </div>
        </div> 
    </section>

    {{-- Services --}}
    <section class="flex justify-center bg-gray-50 px-6 md:px-0 py-12">
        <div class="w-screen md:w-3xl lg:w-4xl xl:w-5xl">
            <h2 class="text-3xl text-center font-bold text-blue-950 mb-6">Our services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md justify-center">
                    <img class="w-full aspect-video md:aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2 grow">
                        <h3 class="text-center text-lg font-bold text-blue-950">Learning, Consulting, and Coaching</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>

                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md justify-center">
                    <img class="w-full aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2 grow">
                        <h3 class="text-center text-lg font-bold text-blue-950">Assessment and Psychological Test</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>
                                
                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md justify-center">
                    <img class="w-full aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2 grow">
                        <h3 class="text-center text-lg font-bold text-blue-950">Organization Development</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>

                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md justify-center">
                    <img class="w-full aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2 grow">
                        <h3 class="text-center text-lg font-bold text-blue-950">HR Administration Service</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>

                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md justify-center">
                    <img class="w-full aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2 grow">
                        <h3 class="text-center text-lg font-bold text-blue-950">Employee Engagement Survey</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>

                {{-- Card --}}
                <div class="flex flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md justify-center">
                    <img class="w-full aspect-[4/3] object-cover opacity-50 bg-gray-100" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 flex flex-col gap-2 grow">
                        <h3 class="text-center text-lg font-bold text-blue-950"> Headhunter and Recruitment Services</h3>
                        
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    {{-- CTA --}}
    <section class="flex-col justify-center bg-white px-6 md:px-0 py-12">
        <div class="mx-auto md:w-5xl justify-center text-center gap-2">
            <h2 class="text-center text-3xl font-bold text-blue-950 mb-6">Looking to elevate your business?</h2>
            <a href="/contact">
                <button class="inline-block bg-amber-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded">
                    Contact us
                </button>
            </a>
        </div>
    </section>

    <x-footer></x-footer>
</x-guest-layout>