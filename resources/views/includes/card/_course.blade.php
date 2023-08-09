<div class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 rounded-lg overflow-hidden">
    <img class="w-full h-48 object-cover border border-b dark:border-gray-800" src="{{ Storage::url($matkul->gambar) }}"
        alt="Course Image">
    <div class="flex flex-col flex-grow">
        <div class="content p-4 flex flex-col gap-2">
            <div class="card-category">
                <span
                    class="bg-blue-100 text-blue-800 text-xs font-medium font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $matkul->prodi->nama_prodi }}</span>
                <span
                    class="bg-orange-100 text-orange-800 text-xs font-medium font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-orang-900 dark:text-orange-800">{{ $matkul->semester->nama_semester }}</span>
                {{-- <span
                class="bg-yellow-100 text-yellow-800 text-xs font-medium font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $matkul->hari }}</span> --}}
            </div>
            <div class="card-title">
                <a href="#">
                    <p class="text-lg font-semibold text-gray-800 dark:text-white hover:text-blue-500">
                        {{ $matkul->nama_matkul }}</p>
                </a>
            </div>
            <div class="card-text">

                <p class="text-sm leading-normal text-gray-600 dark:text-gray-400">{{ $matkul->excerpt() }}</p>
            </div>
        </div>

        <div class="card-footer border-t dark:border-gray-700">
            <div class="flex p-2">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Storage::url($matkul->dosen->foto) }}"
                        alt="Instructor Avatar">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $matkul->dosen->nama }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $matkul->dosen->user->role->nama_role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 rounded-lg overflow-hidden">
    <img class="w-full h-48 object-cover" src="{{ Storage::url($matkul->gambar) }}" alt="Course Image">
    <div class="flex flex-col"> <!-- Use flex and flex-col to control height -->
        <div class="p-4 flex-grow"> <!-- Use flex-grow to make description area take available space -->
            <h2 class="text-md font-semibold text-gray-800 dark:text-white">{{ $matkul->nama_matkul }}</h2>
            <p class="text-sm leading-normal text-gray-600 dark:text-gray-400">{{ $matkul->excerpt() }}</p>
        </div>
        <div class="border-t dark:border-gray-700">
            <div class="flex p-2">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Storage::url($matkul->dosen->foto) }}"
                        alt="Instructor Avatar">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $matkul->dosen->nama }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $matkul->dosen->user->role->nama_role }}</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
