<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\TouristSpot;

class City extends Model
{
  use HasFactory;

  protected $appends = ['tourist_spots_count'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name'
  ];

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'cities';

  private function state() {
    return $this->belongsTo(State::class);
  }

  public function getTouristSpotsCountAttribute() {
    return $this->touristSpots()->get()->count();
  }

  private function touristSpots() {
    return $this->hasMany(TouristSpot::class);
  }
}
