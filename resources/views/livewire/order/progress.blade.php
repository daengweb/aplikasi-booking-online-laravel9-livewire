<div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="count-box bg-success">
                    <i class="fas fa-stethoscope"></i>
                    <h4 class="text-white">Sedang Dilayani</h4>
                    <hr>

                    @foreach ($onProgress as $row)
                    <h1 class="text-white">{{ $row->order_id }}</h1>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="count-box" style="background: #AABEC6">
                    <i class="fas fa-user-md"></i>
                    <h4>Antrian Selanjutnya</h4>
                    <hr>

                    @foreach ($next as $val)
                    <h5>{{ $val->order_id }}</h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
