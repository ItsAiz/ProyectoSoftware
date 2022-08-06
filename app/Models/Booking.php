<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static paginate(int $int)
 */
class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'bookingDate',
        'bookingHour',
        'description',
        'restaurant_table_id',
        'status',
        'client_id'
    ];

    public function restaurantTable(): BelongsTo
    {
        return $this->belongsTo(RestaurantTable::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
