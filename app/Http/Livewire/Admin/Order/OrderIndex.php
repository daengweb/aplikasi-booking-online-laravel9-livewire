<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\DailySlot;
use Carbon\Carbon;

class OrderIndex extends Component
{
    use WithPagination;

    public $dailySlot = [];
    
    public $filterStatus;
    public $filterSlot;

    public function mount()
    {
        $this->dailySlot = DailySlot::orderBy('id', 'ASC')->get();
    }

    public function render()
    {
        $orders = Order::with(['daily_slot'])
            ->when($this->filterStatus != '', function($query) {
                $query->where('status', $this->filterStatus);
            })
            ->when($this->filterSlot != '', function($query) {
                $query->where('daily_slot_id', $this->filterSlot);
            })
            ->orderBy('created_at', 'DESC')->paginate(10);

        $totalOrder = Order::where('day', Carbon::now()->format('Y-m-d'))->whereIn('status', [0, 1, 2, 3])->count();
        $onProgress = Order::where('day', Carbon::now()->format('Y-m-d'))->whereIn('status', [0, 1])->count();
        $complete = Order::where('day', Carbon::now()->format('Y-m-d'))->whereIn('status', [2])->count();
        return view('livewire.admin.order.order_index', compact('orders', 'totalOrder', 'onProgress', 'complete'))->layout('layouts.app');
    }
}
