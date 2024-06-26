<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable=[
        
        'code',
        'name',
        'address',
    ];

    public function persons()
    {
        return $this->hasMany(Person::class);
    }
}
