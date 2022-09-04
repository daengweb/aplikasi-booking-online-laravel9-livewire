<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Order;

class Summary extends Component
{
    public $modalTitle;
    public $ordersData = [];

    public function render()
    {
        $totalToday = Order::where('day', Carbon::now()->format('Y-m-d'))->count();
        $onQueue = Order::where('day', Carbon::now()->format('Y-m-d'))->whereIn('status', [0, 1])->count();
        $complete = Order::where('day', Carbon::now()->format('Y-m-d'))->where('status', 2)->count();
        $total = Order::whereIn('status', [2,3])->count();

        return view('livewire.order.summary', compact('totalToday', 'onQueue', 'complete', 'total'));
    }

    public function openModal($title, $modalType)
    {
        $this->modalTitle = $title;

        //CODE: 1: TOTAL PASIEN HARI INI, 2: ANTRIAN HARI INI, 3: TERTANGANI HARI INI, 4: TOTAL PASIEN
        if ($modalType == 4) {
            $ordersData = Order::with(['daily_slot'])->whereIn('status', [2, 3])->orderBy('created_at', 'DESC')->get();
        } else {
            $ordersData = Order::with(['daily_slot'])->where('day', Carbon::now()->format('Y-m-d'))
                ->when($modalType, function($query) use($modalType) {
                    if ($modalType == 2) {
                        $query->whereIn('status', [0, 1]);
                    } elseif ($modalType == 3) {
                        $query->where('status', 2);
                    }
                })
                ->orderBy('daily_slot_id', 'ASC')
                ->orderBy('created_at', 'ASC')
                ->get();
        }
        
        $this->ordersData = $ordersData;
    }
}
