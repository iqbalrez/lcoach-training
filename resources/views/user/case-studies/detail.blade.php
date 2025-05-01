<x-guest-layout> 
    {{-- Hero --}}
    <section class="flex justify-center bg-white">
        <div class="grid grid-cols-1 gap-6 max-w-screen md:max-w-6xl h-fit items-center px-6 pt-12 md:px-0">
            
            {{-- Judul --}}
            <div class="flex items-center h-fit">
                <div class="text-center w-full">
                    <h1 class="text-2xl md:text-4xl font-bold text-gray-800">
                        {{ $caseStudy->title }}
                    </h1>
                </div>
            </div>

            {{-- Gambar dan Konten --}}
            <div class="relative h-fit rounded-2xl">
                <div class="flex flex-col justify-center">
                    <img
                        class="md:w-3/4 mx-auto aspect-video object-cover rounded-2xl"
                        src="{{ $caseStudy->image != null ? asset('storage/case_studies/' . $caseStudy->image) : 'https://placehold.jp/1920x1080.png'}}"
                        alt="Image of who we are"
                    >

                    <div class="-translate-y-10 md:-translate-y-24 mx-auto px-8 py-6 w-11/12 md:w-2/3 bg-white rounded-2xl flex flex-col gap-3 shadow-md">
                        <div class="ck-content leading-relaxed text-justify">
                            {!! $caseStudy->content !!}
                        </div>
                    </div>
                </div>
            </div>

        </div> 
    </section>

    {{-- CTA --}}
    <section class="flex flex-col items-center bg-white px-6 md:px-0 py-12">
        <div class="mx-auto lg:w-5xl justify-center text-center gap-2">
            <h2 class="text-3xl font-bold text-blue-950 mb-6">Want to learn more about us?</h2>
            <a href="/contact">
                <button class="bg-amber-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded">
                    Contact us
                </button>
            </a>
        </div>
    </section>

    <x-footer></x-footer>

    {{-- CKEditor Styles --}}
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

        .ck-content > h2,
        .ck-content > h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 1rem;
            -webkit-text-fill-color: #162456;
        }
    </style>
</x-guest-layout>
