<?php // app/Models/Project.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'sector', 'results', 'cover_path'];
    protected $casts = ['results' => 'array'];
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}