<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 items-center flex">
            {{ __('Social Media') }}
            <a href="{{ route('admin.social-media.create') }}"
            class="ml-2 text-white bg-blue-950 items-center px-4 rounded-full hover:bg-gray-700">
            +
            </a> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="rowTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>App</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Icon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            function deleteData(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.social-media.destroy', ':id') }}".replace(':id', id),
                        type: 'DELETE',
                        data: {
                            '_token': "{{ csrf_token() }}"
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                $('.rowTable').DataTable().ajax.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Data gagal dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
            }
            $(document).ready(function() {
                $('.rowTable').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    autoWidth: false,
                    ajax: "{{ route('admin.social-media.index') }}",
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'app',
                            name: 'app'
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                        {
                            data: 'link',
                            name: 'link',
                        },
                        {
                            data: 'icon',
                            name: 'icon'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>
