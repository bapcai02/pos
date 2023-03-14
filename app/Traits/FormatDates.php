<?php 

namespace App\Traits;
use Illuminate\Support\Carbon;

trait FormatDates
{
    protected $newDateFormat = 'Y-m-d H:i:s';

    public function getUpdatedAtAttribute($value) {
       return Carbon::parse($value)->format($this->newDateFormat);
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format($this->newDateFormat);
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format($this->newDateFormat);
    }
}