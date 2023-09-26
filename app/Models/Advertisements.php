<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    use HasFactory;

    protected $fillable =
    [
        
        'Business_Activity',
        'description',
        'image',
        'link',
        'company_id'
    ];


    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
}
