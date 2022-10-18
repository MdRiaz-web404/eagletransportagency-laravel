<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffInfromation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function realtionwithrole(){
        return $this->hasOne(Role::class, 'id','role');
    }
}
