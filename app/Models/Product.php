<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class Product extends Model
{
    use HasFactory;

    public $timestamps = false;/** huevadas  */

    protected $guarded = ['id'];/** Campos que no se van a permitir (por estar incrementable)*/

    protected $fillable = [ /** campos para que se permitan las inserciones en la bd
     , si llega un campo adicional no se admite*/
        'name',
        'description',
        'price',
        'stock',
        'min_stock',
        'reference',
        'iva',
        'image'
    ];

}
