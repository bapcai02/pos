<?php

namespace Modules\Currency\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\FormatDates;

class Currency extends Model
{
    use HasFactory, FormatDates;

    protected $guarded = [];
    
    protected $table = 'currencies';

    protected $fillable = [
        'code',
        'currency_name',
        'symbol',
        'thousand_separator',
        'decimal_separator',
        'exchange_rate'
    ];
}
