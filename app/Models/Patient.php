<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_number';
    public $incrementing = false;
    protected $keyType = 'string';
    

    protected $fillable = [
        'name',
        'cpf',
        'entry_date',
        'bed_number',
    ];

    protected $dates = ['entry_date'];
}
