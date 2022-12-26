<?php

namespace App\Models;

use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'user_id',
        'description',
        'scheduled_to',
    ];

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode(explode("\r\n", $value)),
        );
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function getDescriptionFormattedAttribute()
    {
        return implode("\r\n", $this->description);
    }

    public function getFormattedScheduledToAttribute()
    {
        return Carbon::parse($this->scheduled_to)->format('d/m/Y');
    }

}
