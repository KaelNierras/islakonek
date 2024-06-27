<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    use HasFactory;

    protected $fillable = ['name','description', 'latitude', 'longitude', 'total_area', 'total_population', 'population_density'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    protected static function booted()
    {
        static::deleting(function ($island) {
            if ($island->contacts()->exists()) {
                // Prevent deletion and possibly return an error message
                return false; // Returning false from a deleting event will cancel the delete operation
            }
        });
    }

    public function safeDelete()
    {
        if ($this->contacts()->exists()) {
            // Handle the case where contacts exist, e.g., return an error message or throw an exception
            throw new \Exception("Cannot delete island because it has associated contacts.");
        } else {
            $this->delete();
        }
    }
}