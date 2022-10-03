<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    public function formation()
    {
        return $this->BelongsTo(Formation::class);
    }

    use HasRichText;

    protected $guarded = [
        'code',
    ];

    protected $richTextFields = [
        'body',
        'notes',
    ];
}
