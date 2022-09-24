<?php

namespace App\Models;

use App\Models\User;
use App\Models\Propale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public function user()
    {
        return $this-> belongsTo(User::class);
    }

    public function propales()
    {
        return $this->hasMany(Propale::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
    ];
}
