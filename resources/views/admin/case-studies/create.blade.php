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
                        <form action="{{ route('admin.case-studies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <x-input id="title" label="Judul" name="title" required />
                        <div class="mb-4 max-w-full">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-500">Konten</label>
                            <textarea id="content" rows="4" name="content"
                                class="p-2.5 max-w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                                placeholder=""></textarea>
                        </div>
                        <x-input-file id="image" name="image" label="Gambar" required
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
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#content'), {
                    removePlugins: ['AutoFormat']
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                    width: '100%'
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    @endpush
</x-app-layout>
