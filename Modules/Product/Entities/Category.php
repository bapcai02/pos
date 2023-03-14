<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\FormatDates;

class Category extends Model
{
    use HasFactory, FormatDates;

    protected $table = 'categories';

    protected $fillable = [
        'category_code',
        'category_name',
        'customer_phone',
    ];

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
