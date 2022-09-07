<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Pasien
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-rows-3 grid-flow-col py-3">
                <div class="row-span-3 bg-gray-100 block mb-3 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-1xl tracking-tight text-gray-900 dark:text-white">Pasien Hari Ini</h5>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-400">{{ $totalOrder }}</h1>
                </div>
                <div class="row-span-3 bg-blue-100 block mb-3 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-1xl tracking-tight text-gray-900 dark:text-white">Antrian Hari Ini</h5>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-400">{{ $onProgress }}</h1>
                </div>
                <div class="row-span-3 bg-green-100 block mb-3 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-1xl tracking-tight text-gray-900 dark:text-white">Selesai Ditangani</h5>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-400">{{ $complete }}</h1>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="grid grid-rows-4 grid-flow-col py-3">
                    <div class="row-span-4">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Filter Status</label>
                        <select id="status" wire:model="filterStatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih</option>
                            <option value="0">Dalam Antrian</option>
                            <option value="1">Dilayani</option>
                            <option value="2">Selesai</option>
                            <option value="3">Ditangguhkan</option>
                        </select>
                    </div>
                    <div class="row-span-4 px-2">
                        <label for="slot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Filter Slot</label>
                        <select id="slot" wire:model="filterSlot" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih</option>
                            @foreach ($dailySlot as $slot)
                            <option value="{{ $slot->id }}">{{ $slot->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row-span-4"></div>
                    <div class="row-span-4"></div>
                </div>
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">ID</th>
                                <th scope="col" class="py-3 px-6">Hari/Tanggal</th>
                                <th scope="col" class="py-3 px-6">Slot Waktu</th>
                                <th scope="col" class="py-3 px-6">Nama</th>
                                <th scope="col" class="py-3 px-6">Whatsapp</th>
                                <th scope="col" class="py-3 px-6">Catatan</th>
                                <th scope="col" class="py-3 px-6">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $row)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6">{{ $row->order_id }}</td>
                                <td class="py-4 px-6">{{ \Carbon\Carbon::parse($row->day)->format('l, d-m-Y') }}</td>
                                <td class="py-4 px-6">{{ $row->daily_slot->name }}</td>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $row->name }} <small>({{ $row->age }} thn)</small>
                                </th>
                                <td class="py-4 px-6">
                                    <a href="https://wa.me/{{ $row->phone_number }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">Kirim Pesan</a>
                                </td>
                                <td class="py-4 px-6">
                                    {{ $row->note }}
                                </td>
                                <td class="py-4 px-6">
                                    {!! $row->status_label_admin !!}
                                </td>
                            </tr>
                            @empty
                            <tr class="py-4 px-6">
                                <td colspan="7">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div class="px-3 py-3">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
