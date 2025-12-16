<?php // app/Models/Event.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'start_at', 'end_at', 'location', 'summary', 'body', 'banner_path'];
    protected $dates = ['start_at', 'end_at'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}