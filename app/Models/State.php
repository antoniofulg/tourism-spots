<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class State extends Model
{
  use HasFactory;

  protected $appends = ['cities_count'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'abbreviation'
  ];

  public function getCitiesCountAttribute() {
    return $this->cities()->get()->count();
  }

  private function cities() {
    return $this->hasMany(City::class);
  }
}
