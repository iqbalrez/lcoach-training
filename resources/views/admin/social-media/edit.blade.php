<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Social Media') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 md:grid">
                    <form action="{{ route('admin.social-media.update', $socialMedia->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input id="app" label="App" name="app" required :value="$socialMedia->app"/>
                        <x-input id="name" label="Username" name="name" required :value="$socialMedia->name"/>
                        <x-input id="link" label="Link" name="link" required :value="$socialMedia->link"/>
                        <x-input-file id="icon" name="icon" label="Ikon" value="{{ $socialMedia->icon }}"
                        help="SVG. Maksimal 2MB" />
                        <button type="submit"
                            class="mt-4 bg-blue-950 text-white px-4 py-2 rounded-md hover:bg-gray-700">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
