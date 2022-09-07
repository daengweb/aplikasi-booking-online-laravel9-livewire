<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['order_id', 'status_label', 'status_label_admin'];

    public function getOrderIdAttribute()
    {
        return substr($this->phone_number, -4) . '-' . strtoupper($this->name[0] . $this->name[1]);
    }

    public function setPhoneNumberAttribute($value)
    {
        $value = $value[0] == 0 ? '62' . substr($value, 1):$value;
        $this->attributes['phone_number'] = $value;
    }

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="text-secondary"><small>Dalam Antrian</small></span>';
        } elseif ($this->status == 1) {
            return '<span class="text-primary"><small>Sedang Dilayani</small></span>';
        } elseif ($this->status == 2) {
            return '<span class="text-success"><small>Selesai</small></span>';
        }
        return '<span class="text-danger"><small>Ditangguhkan</small></span>';
    }

    public function getStatusLabelAdminAttribute()
    {
        if ($this->status == 0) {
            return '<span style="background-color: #7f8c8d; padding-left: 0.625rem; padding-right: 0.625rem; padding-bottom: 0.125rem; padding-top: 0.125rem; font-weight: 600;font-size: .75rem;line-height: 1rem;border-radius: 0.25rem; color: #ecf0f1">Dalam Antrian</span>';
        } elseif ($this->status == 1) {
            return '<span style="background-color: #2980b9; padding-left: 0.625rem; padding-right: 0.625rem; padding-bottom: 0.125rem; padding-top: 0.125rem; font-weight: 600;font-size: .75rem;line-height: 1rem;border-radius: 0.25rem; color: #ecf0f1">Sedang Dilayani</span>';
        } elseif ($this->status == 2) {
            return '<span style="background-color: #2ecc71; padding-left: 0.625rem; padding-right: 0.625rem; padding-bottom: 0.125rem; padding-top: 0.125rem; font-weight: 600;font-size: .75rem;line-height: 1rem;border-radius: 0.25rem; color: #ecf0f1">Selesai</span>';
        }
        return '<span style="background-color: #e74c3c; padding-left: 0.625rem; padding-right: 0.625rem; padding-bottom: 0.125rem; padding-top: 0.125rem; font-weight: 600;font-size: .75rem;line-height: 1rem;border-radius: 0.25rem; color: #ecf0f1">Ditangguhkan</span>';
    }

    public function daily_slot()
    {
        return $this->belongsTo(DailySlot::class);
    }
}
