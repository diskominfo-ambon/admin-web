<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const StatusDraft = 0;
    const StatusPublish = 1;

    protected $guarded = ['id'];
}
