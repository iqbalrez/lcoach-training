<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Values') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 md:grid">
                    <form action="{{ route('admin.values.update', $values->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input id="title" label="Nama" name="title" required :value="$values->title"/>
                        <x-input id="description" label="Deskripsi" name="description" :value="$values->description"/>
                        <x-input-file id="image" name="image" label="Gambar" value="{{ $values->image }}"
                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                        <button type="submit"
                            class="mt-4 bg-blue-950 text-white px-4 py-2 rounded-md hover:bg-gray-700">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
