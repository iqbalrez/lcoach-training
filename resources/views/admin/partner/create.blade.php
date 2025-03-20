<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Case Study') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:pr-6">
                        <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input id="name" label="Nama" name="name" required />
                        <x-input id="link" label="Link" name="link" />
                        <x-input-file id="logo" name="logo" label="Logo" required
                        help="JPG, JPEG, PNG. Maksimal 2MB" />
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
