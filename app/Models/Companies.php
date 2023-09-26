<?php

namespace App\Models;

use App\Models\attached;
use App\Models\Advertisements;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable =
    [
    'Company_code',
    'Company_name',
    'Person_Name',
    'Email',
    'Position',
    'Phone',
    'companytype_id',
    'Company_Logo',
    'Company_website',
    'Company_Address',
    'Business_Activity',
   // 'managesku_id',

];

    protected $table = 'companies';


    public function advertisements()
    {
        return $this->hasMany(Advertisements::class);
    }

    public function inventoryco()
    {
        return $this->hasMany(inventory::class);
    }

    public function Comtype()
    {

        return $this->belongsTo(companytype::class, 'companytype_id', 'id');
    }


    public function Useree()
    {
        return $this->hasMany(User::class);
    }

    public function attach(){

        return $this->hasMany(attached::class);
    }
    public function Categ()
    {
        return $this->hasMany(Categories::class);
    }
    public function notifi()//notifications table
{
    return $this->hasMany(notification::class);
}

}
