<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\DailySlot;
use App\Models\Order;

class Appointment extends Component
{
    public $timeSlot = [];

    public $day;
    public $slot;
    public $name;
    public $age;
    public $phone_number;
    public $note;
    public $note_additional;

    protected $rules = [
        'day' => 'required|string',
        'slot' => 'required|exists:daily_slots,id',
        'name' => 'required|string|max:100',
        'age' => 'required|numeric|digits:2',
        'phone_number' => 'required|numeric',
        'note' => 'required|string',
        'note_additional' => 'nullable|string|max:200'
    ];

    public function render()
    {
        $days = [
            [
                'day' => Carbon::now()->addDays(1)->format('Y-m-d'),
                'label' => Carbon::now()->addDays(1)->format('l, d F Y')
            ],
            [
                'day' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'label' => Carbon::now()->addDays(2)->format('l, d F Y')
            ]
        ];
        return view('livewire.order.appointment', compact('days'));
    }

    public function getTimeSlot($value)
    {
        $getTimeSlot = DailySlot::withCount(['orders' => function($query) use($value) {
                $query->where('day', $value);
            }])->where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->get();
        $this->timeSlot = $getTimeSlot;
    }

    public function store()
    {
        $this->validate();

        try {
            $dailySlot = DailySlot::withCount(['orders' => function($query) {
                    $query->where('day', $this->day);
                }])
                ->where('id', $this->slot)
                ->first();
            if ($dailySlot->orders_count >= $dailySlot->quota) {
                $this->timeSlot = [];
                $this->day = '';
                $this->slot = '';

                return session()->flash('error', 'Kuota pasien telah mencapai batas maksimum');
            };

            $order = Order::create([
                'daily_slot_id' => $this->slot,
                'day' => $this->day,
                'name' => $this->name,
                'age' => $this->age,
                'phone_number' => $this->phone_number,
                'note' => $this->note . ' ' . $this->note_additional,
                'status' => 0
            ]);

            $this->timeSlot = [];
            $this->day = '';
            $this->slot = '';
            $this->name = '';
            $this->age = '';
            $this->phone_number = '';
            $this->note = '';
            $this->note_additional = '';

            return session()->flash('success', 'Nomor Antrian Anda Adalah: ' . $order->order_id);
        } catch (\Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
