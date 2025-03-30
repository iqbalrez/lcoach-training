<x-guest-layout>
    {{-- Hero --}}
    <section class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 w-screen md:w-3xl lg:w-4xl xl:w-5xl h-fit items-center px-6 py-12 xl:px-0 md:py-12">
            <div class="flex items-center h-fit col-span-9">
                <div class="justifty-center text-center md:text-start w-full">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 md:pr-24"> {{ $webConfig->hero_contact_copywriting }} </h1>
                </div>
            </div>
            
            <div class="hidden md:block col-span-3 h-fit relative rounded-2xl overflow-hidden w-full">
                    <img class="w-full aspect-square object-cover rounded-2xl" src="{{ $webConfig->hero_contact_image != null ? asset('storage/web_config/' . $webConfig->hero_contact_image)  : 'https://placehold.jp/200x200.png' }}" alt="Contact illustration">
            </div>
        </div> 
    </section>

    {{--Calendar --}}
    <section class="flex-col justify-center bg-gray-50 py-6 px-6 xl:px-0">
        <div class="max-w-screen md:max-w-3xl lg:max-w-4xl xl:max-w-5xl rounded-2xl bg-white mx-auto p-6 md:p-12 shadow-md">
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