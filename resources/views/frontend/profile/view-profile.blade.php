@extends('layouts.app')
@section('content')
    <x-content-title>Profie</x-content-title>
    <x-breadcrumbs></x-breadcrumbs>
    <div class="row">
        <div class="grid grid-cols-1 mb-5">
            <ul class="flex bg-gray-200 dark:bg-gray-900">
                <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="/matkul/edit-pertemuan">Profile</a></h5>
                </div>
                <div class="dark:border-gray-900 dark:bg-gray-900">
                    <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                            href="{{ route('mahasiswa.edit', $mahasiswa) }}">Edit
                            Profile</a></h5>
                </div>
            </ul>

            <div class="text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
                <ul class="grid w-full gap-2 mb-4 p-5">

                    <div class="mb-3 gap-4">
                        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Avatar</label>

                        <img class="h-auto w-28 rounded-lg dark:shadow-gray-800" src="" alt="image description">
                    </div>

                    <div class="mb-3 gap-4">
                        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>NIM/NIDN</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $mahasiswa->user->nim_mhs }}" disabled>
                    </div>
                    <div class="mb-3 gap-4">
                        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>Username</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $mahasiswa->user->username }}" disabled>
                    </div>
                    <div class="mb-3 gap-4">
                        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>Nama</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $mahasiswa->nama }}" disabled>
                    </div>

                    <div class="mb-3 gap-4">
                        <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>Prodi</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $mahasiswa->prodi->nama_prodi }}" disabled>
                    </div>
                </ul>

            </div>


        </div>


    </div>
@endsection

{{--
<div class="grid grid-cols-1 mb-5">
    <ul class="flex bg-gray-200 dark:bg-gray-900">
        <div class="bg-white border border-gray-200 border-b-0 rounded-t dark:border-gray-900 dark:bg-gray-800">
            <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a
                    href="/matkul/edit-pertemuan">Profile</a></h5>
        </div>
        <div class="dark:border-gray-900 dark:bg-gray-900">
            <h5 class="text-sm text-gray-900 dark:text-white py-2 px-4 font-bold"><a href="/matkul/edit-peserta">Edit
                    Profile</a></h5>
        </div>
    </ul>

    <div class="bg-white text-sm border border-gray-200 border-t-0 dark:border-gray-900 dark:bg-gray-800">
        <ul class="grid w-full gap-2 mb-4 p-5">
            <form>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white"><span>Pertemuan
                            1 : </span>Judul pertemuan</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="cth. Pengenalan Adobe Photoshop" required>
                </div>

                <div class="mb-6">

                    <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Deskripsi</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""></textarea>

                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Link
                        Youtube</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="cth. https://youtu.be/dQw4w9WgXcQ" required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Gambar</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
                        GIF
                        (MAX. 800x400px).</p>
                </div>


                <div class="mb-6">

                    <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Instruksi
                        untuk Mahasiswa</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="cth. Nonton video di sebelah lalu kerjakan tugas tertera..."></textarea>

                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-blue-600 dark:text-white">Upload
                        File</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">DOC, PPT, EXCEL.
                    </p>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </form>

        </ul>

    </div>


</div> --}}
