<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Statistik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 md:grid">
                    <form action="{{ route('admin.statistic.update', $statistic->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input id="icon" label="Nama" name="icon" required :value="$statistic->icon"/>
                        <x-input id="value" label="Value" name="value" :value="$statistic->value"/>
                        <x-input-file id="icon" name="icon" label="Ikon" required value="{{ $statistic->icon }}"
                        help="SVG. Maksimal 2MB" />
                        <button type="submit"
                            class="mt-4 bg-blue-950 text-white px-4 py-2 rounded-md hover:bg-gray-700">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            $(function() {
                @if ($statistic->image)
                    $('#image').parent().append(
                        `<a href="{{ asset('storage/statistics/' . $statistic->image) }}" target="_blank" class="hover:text-secondary-red block mt-2">
                            ` + `{{ $statistic->image }}` + `    
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
