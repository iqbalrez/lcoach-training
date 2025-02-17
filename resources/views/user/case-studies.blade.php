<x-guest-layout>
    {{-- Hero --}}
    <section class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-screen md:w-3xl lg:w-4xl xl:w-5xl h-fit items-center px-6 py-12 lg:px-0 md:py-12">
            <div class="flex items-center h-fit col-span-9">
                <div class="justifty-center text-center md:text-start w-full">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 md:pr-24">Explore how we've helped businesses achieve their goals</h1>
                </div>
            </div>
            
            <div class="hidden md:block col-span-3 h-fit relative rounded-2xl overflow-hidden w-full">
                    <img class="w-full aspect-square object-cover rounded-2xl" src="https://plus.unsplash.com/premium_photo-1661284828052-ea25d6ea94cd?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image of a person working on a laptop">
            </div>
        </div> 
    </section>

    {{-- Horizontal Line --}}
    <div>
        <div class="md:mt-12 bg-gradient h-4 w-full  bg-gradient-to-l from-amber-500 to-blue-950">
    </div>

    {{-- Case Studies --}}
    <section class="flex justify-center bg-gray-50 px-6 lg:px-0 py-12">
        <div class="w-screen md:w-3xl lg:w-4xl xl:w-5xl">
            <h2 class="text-3xl text-start font-bold text-blue-950 mb-6">Case studies</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                {{-- Card --}}
                <div class="h-full flex flex-col relative text-center  w-full justify-center">
                    <img class="z-10 mx-auto translate-y-6 w-4/5 aspect-video md:aspect-[4/3] object-cover bg-gray-100 rounded-2xl" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 pt-12 grow flex flex-col gap-2 bg-white rounded-2xl drop-shadow-md">
                        <h3 class="text-center text-lg font-bold text-blue-950">Banking, Financial and Insurance Service Industry (BFI)</h3>
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>

                {{-- Card --}}
                <div class="h-full flex flex-col relative text-center  w-full justify-center">
                    <img class="z-10 mx-auto translate-y-6 w-4/5 aspect-video md:aspect-[4/3] object-cover bg-gray-100 rounded-2xl" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 pt-12 grow flex flex-col gap-2 bg-white rounded-2xl drop-shadow-md">
                        <h3 class="text-center text-lg font-bold text-blue-950"> Healthcare, Property, Consumer (HPC)</h3>
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>

                {{-- Card --}}
                <div class="h-full flex flex-col relative text-center  w-full justify-center">
                    <img class="z-10 mx-auto translate-y-6 w-4/5 aspect-video md:aspect-[4/3] object-cover bg-gray-100 rounded-2xl" src="https://thumb.ac-illust.com/b1/b170870007dfa419295d949814474ab2_w.jpeg" alt="Image of a person working on a laptop">
                    <div class="p-6 pt-12 grow flex flex-col gap-2 bg-white rounded-2xl drop-shadow-md">
                        <h3 class="text-center text-lg font-bold text-blue-950">Automotive, Transportation, Logistics (ATL)</h3>
                        <p class="text-gray-800"> Lorem ipsum dolor sit amet consectetur tellus elit mattis </p>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    {{-- CTA --}}
    <section class="flex-col justify-center bg-white px-6 lg:px-0 py-12">
        <div class="mx-auto w-full justify-center text-center gap-2">
            <h2 class="text-center text-3xl font-bold text-blue-950 mb-6">Curious about our impact?</h2>
            <a href="/contact">
                <button class="inline-block bg-amber-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded">
                    Contact us
                </button>
            </a>
        </div>
    </section>

    <x-footer></x-footer>
</x-guest-layout>