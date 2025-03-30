<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Partner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 md:grid">
                    <form action="{{ route('admin.partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input id="name" label="Nama" name="name" required :value="$partner->name"/>
                        <x-input id="link" label="Link" name="link" :value="$partner->link"/>
                        <x-input-file id="logo" name="logo" label="Logo" required value="{{ $partner->logo }}"
                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                        <button type="submit"
                            class="mt-4 bg-blue-950 text-white px-4 py-2 rounded-md hover:bg-gray-700">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js-internal')
        {{-- ckeditor --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script>
            const dataCategory = $caseStudies->category;
            const categorySelect = document.getElementById('category');

            // Set selected option
            categorySelect.value = dataCategory;
        </script>
        <script>
            $(function() {
                ClassicEditor
                    .create(document.querySelector('#content'))
                    .catch(error => {
                        console.error(error);
                    });
                $('#content').val(`{!! $caseStudies->content !!}`);
                
                @if ($caseStudies->image)
                    $('#image').parent().append(
                        `<a href="{{ asset('storage/case_studies/' . $caseStudies->image) }}" target="_blank" class="hover:text-secondary-red block mt-2">
                            ` + `{{ $caseStudies->image }}` + `    
                        </a>`
                    );
                @else
                    $('#image').parent().append(
                        `<span class="block mt-2">
                            Tidak ada file
                        </span>`
                    );
                @endif
            });
        </script>
    @endpush
</x-app-layout>
