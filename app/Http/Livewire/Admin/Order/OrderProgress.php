<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;
use DB;

class OrderProgress extends Component
{
    public $day;

    public function mount()
    {
        $this->day = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $onProgress = Order::where('status', 1)->where('day', $this->day)->take(2)->get();
        $next = Order::where('status', 0)
            ->where('day', $this->day)
            ->orderBy('daily_slot_id', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->take(3)->get();
        return view('livewire.admin.order.order-progress', compact('onProgress', 'next'))->layout('layouts.app');
    }

    public function updateProgress()
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $order = Order::where('status', 1)->where('day', $this->day)
                ->orderBy('daily_slot_id', 'ASC')
                ->orderBy('created_at', 'DESC')
                ->first();
            if ($order) {
                $order->update(['status' => 2, 'user_id' => $user->id]);
                $this->nextOrder();
                DB::commit();
                return session()->flash('success', 'Antrian: ' . $order->order_id . ' Selesai');
            }

            $available = $this->waitingList();
            if ($available > 0) {
                $this->nextOrder();
                DB::commit();
                return session()->flash('success', 'Antrian Sedang Dilayani');
            }

            return session()->flash('error', 'Tidak ada antrian yang sedang dilayani');
        } catch (\Exception $e) {
            DB::rollback();
            return session()->flash('error', $e->getMessage());
        }
    }

    private function nextOrder()
    {
        $nextOrder = Order::where('status', 0)->where('day', $this->day)
            ->orderBy('daily_slot_id', 'ASC')->orderBy('created_at', 'ASC')->first();
        if ($nextOrder) {
            $nextOrder->update(['status' => 1]);
        }
    }

    private function waitingList()
    {
        $available = Order::where('status', 0)->where('day', $this->day)
            ->orderBy('daily_slot_id', 'ASC')->orderBy('created_at', 'DESC')->count();
        return $available;    
    }

    public function cancelProgress()
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $order = Order::where('status', 1)->where('day', $this->day)
                ->orderBy('daily_slot_id', 'ASC')
                ->orderBy('created_at', 'DESC')
                ->first();
            if ($order) {
                $order->update(['status' => 3, 'user_id' => $user->id]);
                $this->nextOrder();
                DB::commit();
                return session()->flash('success', 'Antrian: ' . $order->order_id . ' Dibatalkan');
            }

            return session()->flash('error', 'Tidak ada antrian yang sedang dilayani');
        } catch (\Exception $e) {
            DB::rollback();
            return session()->flash('error', $e->getMessage());
        }
    }
}
