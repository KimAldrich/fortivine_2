<?php // app/Models/Testimonial.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['author', 'role', 'company', 'quote', 'project_id'];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}