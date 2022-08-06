<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static paginate(int $int)
 */
class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'lastName',
        'documentType',
        'documentNumber',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function domicileSale(): HasMany
    {
        return $this->hasMany(DomicileSale::class);
    }

    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

}
