<div class="flex gap-x-2">
    <a href="{{ route('admin.services.edit', $data->id) }}" class="bg-red-300 rounded-lg px-4 py-2 text-white">
        Ubah
    </a>
    <button onclick="deleteData({{ $data->id }})" class="bg-amber-300 rounded-lg px-4 py-2 text-white">
        Hapus
    </button>
</div>