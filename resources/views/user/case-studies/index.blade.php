<x-guest-layout>
    {{-- Hero --}}
    <section class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-screen md:w-3xl lg:w-4xl xl:w-5xl h-fit items-center px-6 py-12 lg:px-0 md:py-12">
            <div class="flex items-center h-fit col-span-9">
                <div class="justifty-center text-center md:text-start w-full">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 md:pr-24">{{ $webConfig->hero_case_studies_copywriting }}</h1>
                </div>
            </div>
            
            <div class="hidden md:block col-span-3 h-fit relative rounded-2xl overflow-hidden w-full">
                    <img class="w-full aspect-square object-cover rounded-2xl" src="{{ $webConfig->hero_case_studies_image != null ? asset('storage/web_config/' . $webConfig->hero_case_studies_image)  : 'https://placehold.jp/200x200.png' }}" alt="Case studies illustration">
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
                
                @foreach ($caseStudies as $caseStudy)    
                {{-- Card --}}
                <div class="hover:scale-105 transition-transform h-full flex flex-col relative text-center  w-full justify-center">
                    <img class="z-10 mx-auto translate-y-6 w-4/5 aspect-video md:aspect-[4/3] object-cover bg-gray-100 rounded-2xl" src="{{ $caseStudy->image != null ? asset('storage/case_studies/' . $caseStudy->image)  : 'https://placehold.jp/1920x1080.png' }}" alt="Image of a person working on a laptop">
                    <div class="p-6 pt-12 grow flex flex-col gap-2 bg-white rounded-2xl drop-shadow-md">
                        <h3 class="text-start text-lg font-bold text-blue-950">{{ $caseStudy->title }}</h3>
                        <div class="items-end justify-start h-full bg-transparent flex">
                            <a href="{{route('user.landing.case-studies.detail', $caseStudy->id)}}" class="flex gap-2 items-centergap-x-2 hover:text-amber-500 text-blue-950"><p>Read</p> <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div> 
        </div>
    </section>

    {{-- CTA --}}
    <section class="flex-col justify-center bg-white px-6 lg:px-0 py-12">
        <div class="mx-auto w-full justify-center text-center gap-2">
            <h2 class="text-center text-3xl font-bold text-blue-950 mb-6">Curious about our impact?</h2>
            <a href="/contact">
                <button class="inline-block bg-amber-500 hover:bg-blue-950 text-white font-semibold px-6 py-3 rounded transition-colors">
                    Contact us
                </button>
            </a>
        </div>
    </section>

    <x-footer></x-footer>

    <style>
        .table {
            text-align: center;
            margin-inline: auto;
        }

        table tr td {
            border: solid 1px #CCC;
            padding: 4px;
        }

        blockquote {
            font-style: italic;
            padding-left: 1em;
            margin: 0;
            border-left: 5px solid #ccc;
        }
    </style>
</x-guest-layout>