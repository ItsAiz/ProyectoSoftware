<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static paginate(int $int)
 */
class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'lastName',
        'documentType',
        'documentNumber',
        'phoneNumber',
        'address',
        'hiringDate',
        'salary',
        'idUser'
    ];
    public function user(){
        return $this->hasOne(User::class,'id');
    }

}
