<?php

namespace App\Models;

use App\Models\Propale;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    public function propales()
    {
        return $this-> hasMany(Propale::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'propale_id',
    ];
}
