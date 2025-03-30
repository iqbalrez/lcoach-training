<x-guest-layout>
    {{-- Hero --}}
    <section class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 max-w-screen md:max-w-5xl h-fit items-center px-6 py-12 lg:px-0 md:py-24">
            <div class="flex items-center h-fit md:col-span-7">
                <div class="justify-center text-center md:text-start w-full">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 md:pr-24">{{ $webConfig->hero_landing_copywriting }}</h1>
                    <a href="#partner" class="transition-colors mt-8 inline-block bg-amber-500 hover:bg-blue-950 text-white font-semibold px-6 py-3 rounded">Learn more</a>
                </div>
            </div>
            
            <div class="col-span-1 md:col-span-5 w-full flex flex-col">
                <div id="imgContainer"
                    class="group relative flex flex-col overflow-hidden rounded-2xl flex-grow aspect-[4/3]">
                    <div id="sliderWrapper" class="flex transition-transform dration-1000 ease-in-out w-full">
                        @foreach ($caseStudies->take(1) as $caseStudy)
                        <div class="translate-x-0 z-0 object-center translate-y-0 absolute inset-0 w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" id="caseStudy-{{$caseStudy->id}}">
                            <div class="">
                                <div class="absolute inset-0 bg-gradient-to-tl from-black/60"></div>
                                <img class="w-full aspect-[4/3] object-cover" src="{{ $caseStudy->image != null ? asset('storage/case_studies/' . $caseStudy->image)  : 'https://placehold.jp/200x200.png' }}" alt="Image of a person working on a laptop">
                            </div>
                            <a href="{{route('user.landing.case-studies.detail', $caseStudy->id)}}" class="absolute isolate bottom-8 px-8 py-6 w-full bg-blend-darken bg-amber-700/80">
                                <div class="text-2xl font-bold text-white items-center inline-flex gap-2">
                                    <p class="max-w-[92%] line-clamp-2 hover:line-clamp-none">{{ $caseStudy->title }}</p>
                                    <svg class="w-6 h-6 fixed bottom-14 right-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                            </a>
                        </div>
                        @endforeach

                        @foreach ($caseStudies->skip(1) as $caseStudy)    
                        <div class="translate-x-full z-0 object-center translate-y-0 absolute inset-0 w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" id="caseStudy-{{$caseStudy->id}}">
                            <div class="">
                                <img class="w-full aspect-[4/3] object-cover" src="{{ $caseStudy->image != null ? asset('storage/case_studies/' . $caseStudy->image)  : 'https://placehold.jp/200x200.png' }}" titleImage of a person working on a laptop">
                            </div>
                            <a href="{{route('user.landing.case-studies.detail', $caseStudy->id)}}" class="absolute isolate bottom-8 px-8 py-6 w-full bg-blend-darken {{$caseStudy->id % 3 == 1 ? "bg-blue-700/80" : ($caseStudy->id % 3 == 2 ? "bg-purple-700/80" : "bg-amber-700/80")}}">
                                <div class="text-2xl font-bold text-white items-center inline-flex gap-2">
                                    <p class="max-w-[92%] line-clamp-2 hover:line-clamp-none">{{ $caseStudy->title }}</p>
                                    <svg class="w-6 h-6 fixed bottom-14 right-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 17L17 7M17 7H8M17 7V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- <div id="sliderWrapper" class="md:col-span-5 flex transition-transform dration-1000 ease-in-out w-full">
                
            </div> --}}
        </div> 
    </section>

    {{-- Horizontal Line --}}
    <div>
        <div class="md:mt-12 bg-gradient h-4 w-full  bg-gradient-to-l from-amber-500 to-blue-950">
    </div>

    {{-- Partners --}}
    <section id="partner" class="flex justify-center bg-gray-50 px-6 lg:px-0">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-6 w-5xl h-fit items-center py-6">
            <div class="flex items-center h-fit md:col-span-5">
                <div class="text-start">
                    <p class="text-sm text-blue-950 pr-24">{{ $webConfig->partner_copywriting }}</p>
                </div>
            </div>
            
            <div class="md:col-span-7 h-fit overflow-hidden flex gap-3">
                @foreach ($partners as $partner)
                    <img class="h-15 aspect-[4/3] object-center" src="{{ $partner->logo != null ? asset('storage/partners/' . $partner->logo) : 'https://placehold.jp/150x150.png' }}" alt="Image of a person working on a laptop">
                @endforeach
            </div>
        </div> 
    </section>

    {{-- Services --}}
    <section class="flex justify-center bg-white px-6 lg:px-0 py-6">
        <div class="lg:w-5xl">
            <h2 class="text-3xl font-bold text-blue-950 mb-6">Our services</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($services as $service)
                {{-- Card --}}
                <div class="hover:scale-105 transition-transform rounded-2xl overflow-hidden bg-white drop-shadow-md w-full flex flex-col gap-8 h-auto">
                    <div class="flex flex-row gap-2 items-center">
                        <img class="w-2/5 aspect-[4/3] object-cover bg-gray-100" src="{{ $service->image != null ? asset('storage/services/' . $service->image) : 'https://placehold.jp/150x150.png' }}" alt="{{ $service->title }} illustration">
                        <div class="px-6 py-3 flex flex-col gap-2">
                            <p class="text-lg font-semibold text-blue-950">{{ $service->title }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                
            <a href="{{route('user.landing.what.index')}}" class="flex justify-center">
                <button class="mt-8 inline-block transition-colors  bg-amber-500 hover:bg-blue-950 text-white font-semibold px-4 py-2 rounded">
                    Explore more →
                </button>
            </a>
        </div>
    </section>

    {{-- More about us --}}
    <section class="flex-col justify-center bg-gray-50 px-6 lg:px-0 py-6">
        <div class="mx-auto lg:w-5xl overflow-x-visible">
            <div class="flex items-center mb-6 md:mb-12">
                <h2 class="flex-shrink text-3xl font-bold text-blue-950 ml-auto mr-6 md:mr-24">More about us</h2>
                <div class="flex-grow bg-gradient h-4 rounded-full bg-gradient-to-l from-amber-500 to-blue-950"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-full h-fit items-center">
                <div class="md:col-span-6 flex items-center h-full md:pr-24">
                    <p class="text-gray-800 leading-relaxed">{{ $webConfig->about_landing_copywriting }}
                    </p>
                </div>
                <div class="md:col-span-6 h-fit order-last">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex flex-col gap-4 pt-24">
                            <img class="w-full aspect-[4/3] shadow-md object-cover rounded-xl bg-gray-100" src="{{ $webConfig->about_landing_image_1 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_1) : 'https://placehold.jp/150x150.png' }}" alt="Image of a person working on a laptop">
                            <img class="w-full aspect-[4/3] shadow-md object-cover rounded-xl bg-gray-100" src="{{ $webConfig->about_landing_image_2 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_2) : 'https://placehold.jp/150x150.png' }}" alt="Image of a person working on a laptop">
                        </div>
                        <div class="flex flex-col gap-4">
                            <img class="w-full aspect-[4/3] shadow-md object-cover rounded-xl bg-gray-100" src="{{ $webConfig->about_landing_image_3 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_3) : 'https://placehold.jp/150x150.png' }}" alt="Image of a person working on a laptop">
                            <img class="w-full aspect-[4/3] shadow-md object-cover rounded-xl bg-gray-100" src="{{ $webConfig->about_landing_image_4 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_4) : 'https://placehold.jp/150x150.png' }}" alt="Image of a person working on a laptop">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex-grow bg-gradient h-4 rounded-full bg-gradient-to-r from-amber-500 to-blue-950"></div>
                <div class="flex-shrink text-3xl font-bold text-blue-950 ml-auto mr-48 mt-24"></div>
            </div> 
        </div>
    </section>

    {{-- Video --}}
    <section class="relative flex items-center w-full h-fit bg-white">
        <div class="relative items-center w-full px-6 mx-auto md:px-12 lg:px-0 max-w-2xl py-6">
            @php
                parse_str(parse_url($webConfig->video_landing_link, PHP_URL_QUERY), $vars);
                $videoId = $vars['v'];
            @endphp

            <iframe class="w-full aspect-video max-w-full border border-gray-200 rounded-2xl"
                src="https://www.youtube-nocookie.com/embed/{{ $videoId }}?modestbranding=1"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </section>
    
    {{-- Why us? --}}
    <section class="flex-col justify-center bg-white px-6 lg:px-0 py-6 md:py-12">
        <div class="mx-auto lg:w-5xl">
            <h2 class="text-center text-3xl font-bold text-blue-950 mb-6">Why us</h2>
            <div class="grid md:grid-cols-3 gap-12 w-full h-fit items-center">
                @foreach ($statistics as $statistic)
                <div class="flex w-full items-center gap-6">
                    <div class="flex-shrink rounded-full p-2">
                        <img class="h-16" src="{{ $statistic->icon != null ? asset('storage/statistic/' . $statistic->icon) : 'https://placehold.jp/150x150.png' }}" alt="Image of a person working on a laptop">
                    </div>
                    <div class="flex-grow flex-col">
                        <p class="text-4xl text-amber-500 font-bold">{{ $statistic->value }}</p>
                        <p class="text-md text-blue-950">{{ $statistic->title }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{--Calendar --}}
    <section class="flex-col justify-center bg-gray-50 px-6 py-6">
        <div class="w-full lg:w-5xl rounded-2xl bg-white mx-auto p-6 md:p-12 shadow-md">
            <h2 class="text-3xl font-bold text-blue-950">Connect with us</h2>
            <div class="grid md:grid-cols-2 gap-6 w-full h-fit pt-3 md:pt-6">
                <div class="flex w-full items-start">
                    <p class="text-gray-800 leading-relaxed">{{ $webConfig->contact_copywriting }}</p>
                </div>

                <x-calendar></x-calendar>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</x-guest-layout>

<script>
        
        let currentImgIndex = 0;
        const totalSlides = document.querySelectorAll('#sliderWrapper img').length;

        const caseStudy = document.querySelectorAll('[id^="caseStudy-"]')

        function cycle() {
            setInterval(() => {
                // Determine the previous and next index
                const previousImgIndex = currentImgIndex;
                currentImgIndex = (currentImgIndex + 1) % totalSlides;
                const nextImgIndex = (currentImgIndex + 1) % totalSlides;

                // Slide out the previous iframe
                caseStudy[previousImgIndex].classList.remove('translate-x-0', 'z-10');
                caseStudy[previousImgIndex].classList.add('-translate-x-full', 'z-0');

                // Slide in the current iframe
                caseStudy[currentImgIndex].classList.remove('translate-x-full', 'z-0');
                caseStudy[currentImgIndex].classList.add('translate-x-0', 'z-10');

                // Prepare the next iframe to the right for the next cycle
                caseStudy[nextImgIndex].classList.remove('-translate-x-full', 'z-0');
                caseStudy[nextImgIndex].classList.add('translate-x-full', 'z-0');
            }, 3000);
        }

        cycle()

        @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    $('.rowTable').DataTable().ajax.reload();
                });
            @endif

            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: '{{ Session::get('error') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
</script>