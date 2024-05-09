@extends('layouts.navIndex')
@section('content')
    <div class="border-b border-gray-900/10 pb-12 mx-auto max-w-2xl  sm:py-48 lg:py-56">
        @if (Auth::check())
            <h2 class="text-base font-semibold leading-7 text-white">Data Diri</h2>
            <p class="mt-1 text-sm leading-6 text-white">isi data diri anda</p>

            <form action="/post" method="POST">
                @csrf
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-white">Nama Lengkap</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-white">Alamat</label>
                        <div class="mt-2">
                            <input type="text" name="address" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-white">No hp</label>
                        <div class="mt-2">
                            <input id="email" name="no_hp" type="number" autocomplete="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <button type="submit"
                        class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                    </div>
            </form>
    </div>
@else
    @endif
@endsection
