<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Statistik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:pr-6">
                        <form action="{{ route('admin.statistic.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input id="title" label="Judul" name="title" required />
                        <x-input id="value" label="Value" name="value" />
                        <x-input-file id="icon" name="icon" label="Ikon" required
                        help="SVG. Maksimal 2MB" />
                        <button type="submit"
                            class="mt-4 bg-blue-950 text-white px-4 py-2 rounded-md hover:bg-gray-700">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js-internal')
    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'uploadImage', 'bulletedList', 'numberedList', 'blockQuote'],
            width: '100%'
        })
        .catch(error => {
            console.error(error);
        });
    </script>
    @endpush
</x-app-layout>
