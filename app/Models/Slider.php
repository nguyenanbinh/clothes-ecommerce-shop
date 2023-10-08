<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(string $id)
 */
class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['banner', 'type', 'title', 'starting_price', 'btn_url', 'serial', 'status'];
    const UPLOAD_PATH = 'uploads/sliders';
}
