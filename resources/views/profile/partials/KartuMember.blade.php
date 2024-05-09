<ection>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Kartu Member
        </h2>
    </header>
    {{-- /<p class="mt-1 block w-full text-white"> {{ $member->name }}</p> <!-- Menggunakan relasi 'user' daripada 'Member' --> --}}
    @if ($member)
        <div class="flex mb-2">
            <div class="flex-auto w-14 text">

                <p class="text-white ">Nama : {{ $member->name }}</p>
                <p class="text-white ">Alamat : {{ $member->address }}</p>
            </div>
            <div class=" flex-auto w-64 barcode">
                <p class="text-white mx-3">{!! DNS2D::getBarcodeHtml("$member->member_code", 'QRCODE', 8, 8, 'white') !!} Member code : {{ $member->member_code }}
                </p>
            </div>
        </div>
    @else
        <p class="text-white"> Anda belum mendaftar sebagai member</p>
    @endif




</ection>
