<div>
    @livewire('order.progress')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="fas fa-users"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $totalToday }}" data-purecounter-duration="1" class="purecounter">{{ $totalToday }}</span>
                    <p>Pasien (Hari Ini)</p>
                    <button type="button" wire:click="openModal('Data Pasien (Hari Ini)', 1)" data-bs-toggle="modal" data-bs-target="#modalDataPasien" class="btn btn-primary btn-sm mt-2">Lihat Data</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                    <i class="far fa-hospital"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $onQueue }}" data-purecounter-duration="1" class="purecounter">{{ $onQueue }}</span>
                    <p>Antrian (Hari Ini)</p>
                    <button type="button" wire:click="openModal('Data Antrian (Hari Ini)', 2)" data-bs-toggle="modal" data-bs-target="#modalDataPasien" class="btn btn-primary btn-sm mt-2">Lihat Antrian</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="fas fa-flask"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $complete }}" data-purecounter-duration="1" class="purecounter">{{ $complete }}</span>
                    <p>Tertangani (Hari Ini)</p>
                    <button type="button" wire:click="openModal('Data Tertangani (Hari Ini)', 3)" data-bs-toggle="modal" data-bs-target="#modalDataPasien" class="btn btn-primary btn-sm mt-2">Lihat Data</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="fas fa-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $total }}" data-purecounter-duration="1" class="purecounter">{{ $total }}</span>
                    <p>Total Pasien</p>
                    <button type="button" wire:click="openModal('Data Total Pasien', 4)" data-bs-toggle="modal" data-bs-target="#modalDataPasien" class="btn btn-primary btn-sm mt-2">Lihat Data</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDataPasien" tabindex="-1" role="dialog" aria-labelledby="modalPasien" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPasien">{{ $modalTitle }}</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table responsive">
                            <table class="table table-hover table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Antrian</th>
                                        <th>Slot Waktu</th>
                                        <th>Status Antrian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ordersData as $key => $row)
                                    <tr class="{{ $row->status == 1 ? 'bg-warning':'' }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->order_id }}</td>
                                        <td>{{ $row->daily_slot->name }}</td>
                                        <td>{!! $row->status_label !!}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada pasien</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
      </div>
</div>
