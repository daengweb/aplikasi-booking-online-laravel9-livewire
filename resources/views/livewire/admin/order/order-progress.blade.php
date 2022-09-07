<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Antrian Online
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="grid grid-rows-2 grid-flow-col py-3">
                    <div class="row-span-full bg-green-100 block mb-3 p-6 max-w-lg bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-1xl tracking-tight text-gray-900 dark:text-white">Sedang Dilayani</h5>
                        @foreach ($onProgress as $row)
                        <h1 class="text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-400">{{ $row->order_id }}</h1>
                        @endforeach
                    </div>
                    <div class="row-span-full bg-gray-100 block mb-3 p-6 max-w-lg bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-1xl tracking-tight text-gray-900 dark:text-white">Antrian Selanjutnya</h5>
                        @foreach ($next as $row)
                        <h1 class="text-3xl font-bold tracking-tight text-gray-700 dark:text-gray-400">- {{ $row->order_id }}</h1>
                        @endforeach
                    </div>
                </div>
                <button type="button" wire:loading.attr="disabled" wire:click="updateProgress" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Antrian Berikutnya</button>
                <button type="button" wire:loading.attr="disabled" wire:click="cancelProgress" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Tidak Datang</button>
                
                @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    {{ session('error') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
