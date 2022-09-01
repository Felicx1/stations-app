<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Station extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];
    protected $table = 'recordings';

    public function toSearchableArray()
    {
        return [
            'station_name' => $this->station_name,
            'station_code' => $this->station_code,
            'processed' => $this->processed,
            'country' => $this->country,
            'stationdate' => $this->stationdate,
           

            
        ];

    }
}


