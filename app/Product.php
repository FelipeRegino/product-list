<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Http\Request;

class Product extends Model implements HasMedia
{

  use HasMediaTrait;

  public $fillable = [
    'name', 'resume', 'description', 'reference', 'quantity', 'price', 'active', 'category_id'
  ];

  public function Category()
  {
      return $this->belongsTo(Category::class);
  }

  public function setRequestImage($image) : self
  {
      $this->clearMediaCollection();
      $this->addMedia($image)->toMediaCollection();
      return $this;
  }
}
