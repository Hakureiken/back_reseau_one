<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'propale_id',
    // ];
}
