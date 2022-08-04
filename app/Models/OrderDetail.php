<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'domicile_sale_id',
        'name',
        'price',
        'amount'
    ];

    public function domicileSale(): BelongsTo
    {
        return $this->belongsTo(DomicileSale::class);
    }

}
