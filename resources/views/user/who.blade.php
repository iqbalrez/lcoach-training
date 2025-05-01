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
                    <img class="md:w-3/4 mx-auto aspect-video object-cover rounded-2xl"
                        src="{{ $webConfig->hero_who_image != null ? asset('storage/web_config/' . $webConfig->hero_who_image) : 'https://placehold.jp/1920x1080.png' }}"
                        alt="Image of who we are">

                    <div
                        class="-translate-y-16 md:-translate-y-24 mx-auto px-8 pt-6 w-5/6 md:w-2/3 bg-white rounded-2xl flex flex-col gap-3">
                        <h2 class="text-2xl font-bold text-blue-950">{{ $webConfig->subheading_who }}</h2>
                        <div class="leading-relaxed">
                            <div class="text-justify">{!! $webConfig->who_copywriting !!}</div>
                            <div class="mt-4">
                                <div class="grid md:grid-cols-2 gap-6 md:pt-6">
                                    <div class="relative">
                                        <img class="w-full aspect-video object-cover rounded-xl"
                                            src="{{ $webConfig->who_image_1 != null ? asset('storage/web_config/' . $webConfig->who_image_1) : 'https://placehold.jp/1920x1080.png' }}"
                                            alt="Image of {{ $webConfig->who_caption_1 }}">
                                        <div
                                            class="md:absolute md:block hidden rounded-full w-fit isolate bottom-8 -left-1/2 px-4 py-4 bg-amber-500">
                                            <h2 class="text-xs md:text-sm text-white">{{ $webConfig->who_caption_1 }}
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <img class="w-full aspect-video object-cover rounded-xl"
                                            src="{{ $webConfig->who_image_2 != null ? asset('storage/web_config/' . $webConfig->who_image_2) : 'https://placehold.jp/1920x1080.png' }}"
                                            alt="Image of {{ $webConfig->who_caption_2 }}">
                                        <div
                                            class="md:absolute md:block hidden rounded-full w-fit isolate -top-8 -right-1/2 -translate-x-1/2 px-4 py-4 bg-amber-500">
                                            <h2 class="text-xs md:text-sm text-white">{{ $webConfig->who_caption_2 }}
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <img class="w-full aspect-video object-cover rounded-xl"
                                            src="{{ $webConfig->who_image_3 != null ? asset('storage/web_config/' . $webConfig->who_image_3) : 'https://placehold.jp/1920x1080.png' }}"
                                            alt="Image of {{ $webConfig->who_caption_3 }}">
                                        <div
                                            class="md:absolute md:block hidden rounded-full w-fit isolate  -bottom-8 -left-1/2 translate-x-1/2 px-4 py-4 bg-amber-500">
                                            <h2 class="text-xs md:text-sm text-white">{{ $webConfig->who_caption_3 }}
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <img class="w-full aspect-video object-cover rounded-xl"
                                            src="{{ $webConfig->who_image_4 != null ? asset('storage/web_config/' . $webConfig->who_image_4) : 'https://placehold.jp/1920x1080.png' }}"
                                            alt="Image of {{ $webConfig->who_caption_4 }}">
                                        <div
                                            class="md:absolute md:block hidden rounded-full w-fit isolate top-8 -right-1/2 px-4 py-4 bg-amber-500">
                                            <h2 class="text-xs md:text-sm text-white">{{ $webConfig->who_caption_4 }}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    {{-- Values --}}
    <section class="justify-center bg-gray-50 px-6 md:px-0 py-12 hidden md:flex">
        <div class="mx-auto md:w-5xl text-center gap-2">
            <h2 class="text-3xl font-bold text-blue-950 mb-6">Our values</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-screen px-6 md:px-0 md:w-3xl lg:w-4xl xl:w-5xl mx-auto items-stretch">
                @foreach ($values as $value)
                    <div class="grid grid-cols-5 md:flex md:flex-col rounded-2xl overflow-hidden text-center bg-white drop-shadow-md w-full h-full">
                        {{-- Gambar --}}
                        <div class="relative col-span-2 md:w-full h-auto md:h-48">
                            <div class="absolute inset-0 bg-gradient-to-tl from-blue-950/70 z-10"></div>
                            <img class="h-full w-full object-cover bg-gray-100"
                                src="{{ $value->image != null ? asset('storage/values/' . $value->image) : 'https://placehold.jp/1920x1080.png' }}"
                                alt="Image of {{ $value->title }}">
                        </div>

                        {{-- Konten --}}
                        <div class="col-span-3 p-4 md:p-6 flex flex-col justify-center md:w-full bg-white z-20 text-left">
                            <h3 class="text-lg font-bold text-blue-950">{{ $value->title }}</h3>
                            <p class="text-gray-800">{{ $value->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- CTA --}}
    <section class="flex-col justify-center bg-white px-6 md:px-0 py-12">
        <div class="mx-auto lg:w-5xl justify-center text-center gap-2">
            <h2 class="text-center text-3xl font-bold text-blue-950 mb-6">Want to learn more about us?</h2>
            <a href="/contact">
                <button
                    class="inline-block bg-amber-500 hover:bg-blue-950 text-white font-semibold px-6 py-3 rounded transition-colors">
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
