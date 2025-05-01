<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.dashboard.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    
                    <div class="p-6 text-gray-900 md:grid grid-cols-2">
                        <div class="flex flex-col md:pr-6">
                            <h2 class="text-lg font-bold mb-2">Konfigurasi Halaman Landing</h2>
                            <x-input label="Judul Landing" name="hero_landing_copywriting" required :value="$webConfig->hero_landing_copywriting" />
                            <x-input label="Deskripsi bagian Partner" name="partner_copywriting" required
                                :value="$webConfig->partner_copywriting" />
                            <x-input label="Deskripsi bagian About Us" name="about_landing_copywriting" required
                                :value="$webConfig->about_landing_copywriting" />
                            <x-input label="Tautan Youtube Video" name="video_landing_link" required
                                :value="$webConfig->video_landing_link" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->about_landing_image_1 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_1) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="about_landing_image_1" name="about_landing_image_1"
                                        label="Gambar About 1" value="{{ $webConfig->about_landing_image_1 }}"
                                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->about_landing_image_2 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_2) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="about_landing_image_2" name="about_landing_image_2"
                                        label="Gambar About 2" value="{{ $webConfig->about_landing_image_2 }}"
                                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->about_landing_image_3 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_3) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="about_landing_image_3" name="about_landing_image_3"
                                        label="Gambar About 3" value="{{ $webConfig->about_landing_image_3 }}"
                                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->about_landing_image_4 != null ? asset('storage/web_config/' . $webConfig->about_landing_image_4) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="about_landing_image_4" name="about_landing_image_4"
                                        label="Gambar About 4" value="{{ $webConfig->about_landing_image_4 }}"
                                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>

                            
                            <h2 class="text-lg font-bold mt-2 mb-2">Konfigurasi Halaman What</h2>
                            <x-input label="Judul Halaman What" name="hero_what_copywriting" :value="$webConfig->hero_what_copywriting" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->hero_what_image != null ? asset('storage/web_config/' . $webConfig->hero_what_image) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="hero_what_image" name="hero_what_image" label="Gambar Hero What"
                                        value="{{ $webConfig->hero_what_image }}"
                                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>

                            <h2 class="text-lg font-bold mt-2 mb-2">Konfigurasi Halaman Case Studies</h2>
                            <x-input label="Judul Halaman Case Studies" name="hero_case_studies_copywriting"
                                :value="$webConfig->hero_case_studies_copywriting" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->hero_case_studies_image != null ? asset('storage/web_config/' . $webConfig->hero_case_studies_image) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="hero_case_studies_image" name="hero_case_studies_image"
                                        label="Gambar Hero Case Studies"
                                        value="{{ $webConfig->hero_case_studies_image }}"
                                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>

                            <h2 class="text-lg font-bold mt-2 mb-2">Konfigurasi Halaman Contact</h2>
                            <x-input label="Judul Halaman Contact" name="hero_contact_copywriting"
                                :value="$webConfig->hero_contact_copywriting" />
                            <x-input label="Deskripsi bagian Contact Us" name="contact_copywriting"
                                :value="$webConfig->contact_copywriting" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->hero_contact_image != null ? asset('storage/web_config/' . $webConfig->hero_contact_image) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="hero_contact_image" name="hero_contact_image" label="Gambar Hero Contact"
                                        help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>  
                        </div>
                        <div class="flex flex-col md:border-l-2 md:border-gray-200 md:pl-6">
                            
                            <h2 class="text-lg font-bold mt-2 md:mt-0 mb-2">Konfigurasi Halaman Who</h2>
                            <x-input label="Judul Halaman Who" name="hero_who_copywriting" :value="$webConfig->hero_who_copywriting" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->hero_who_image != null ? asset('storage/web_config/' . $webConfig->hero_who_image) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="hero_who_image" name="hero_who_image" label="Gambar Hero Who"
                                        value="{{ $webConfig->hero_who_image }}" help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>
                            <x-input label="Subheading Halaman Who" name="subheading_who"
                                :value="$webConfig->subheading_who" />
                            
                                <div class="mb-4 max-w-full">
                                    <label for="who_copywriting"
                                    class="block mb-2 text-sm font-medium text-gray-500">Subjudul</label>
                                    <textarea id="who_copywriting" rows="4" name="who_copywriting" :value="$webConfig->who_copywriting"
                                        class="p-2.5 max-w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                                        placeholder=""></textarea>
                                    </div>
                            
                            <x-input label="Caption Gambar Who 1" name="who_caption_1" :value="$webConfig->who_caption_1" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->who_image_1 != null ? asset('storage/web_config/' . $webConfig->who_image_1) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="who_image_1" name="who_image_1" label="Gambar Who 1"
                                        value="{{ $webConfig->who_image_1 }}" help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>

                            <x-input label="Caption Gambar Who 2" name="who_caption_2" :value="$webConfig->who_caption_2" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->who_image_2 != null ? asset('storage/web_config/' . $webConfig->who_image_2) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="who_image_2" name="who_image_2" label="Gambar Who 2"
                                        value="{{ $webConfig->who_image_2 }}" help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>

                            <x-input label="Caption Gambar Who 3" name="who_caption_3" :value="$webConfig->who_caption_3" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->who_image_3 != null ? asset('storage/web_config/' . $webConfig->who_image_3) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="who_image_3" name="who_image_3" label="Gambar Who 3"
                                        value="{{ $webConfig->who_image_3 }}" help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>

                            <x-input label="Caption Gambar Who 4" name="who_caption_4" :value="$webConfig->who_caption_4" />
                            <div class="grid grid-cols-7 gap-4 mb-1">
                                <img class="aspect-square w-full object-cover rounded-lg"
                                    src="{{ $webConfig->who_image_4 != null ? asset('storage/web_config/' . $webConfig->who_image_4) : 'https://placehold.jp/150x150.png' }}"
                                    alt="">
                                <div class="col-span-6">
                                    <x-input-file id="who_image_4" name="who_image_4" label="Gambar Who 4"
                                        value="{{ $webConfig->who_image_4 }}" help="JPG, JPEG, PNG. Maksimal 2MB" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 flex justify-center">
                            <button type="submit"
                                class="w-fit mt-4 bg-blue-950 text-white px-20 py-2 rounded-md hover:bg-gray-700">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('js-internal')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        $(function() {
        ClassicEditor
            .create(document.querySelector('#who_copywriting'))
            .catch(error => {
                console.error(error);
            });
        $('#who_copywriting').val(`{!! $webConfig->who_copywriting !!}`);
        });
    </script>
    
@endpush
</x-app-layout>
