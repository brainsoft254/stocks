<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Stockspro;

class coy extends Model implements HasMedia
{
   use HasMediaTrait;

   public function registerMediaCollections()
   {
   $this->addMediaCollection('logo')
   ->useFallbackUrl(Stockspro::getRandomCat());
   }

   public function registerMediaConversions(Media $media = null)
   {
   $this->addMediaConversion('thumb')
   ->height(60)
   ->width(60)
   ->sharpen(10);

      $this->addMediaConversion('logo')
         ->fit('fill', 700, 700)
         ->background('F0F0F0')
         ->border(3, 'FFCE44', 'shrink')
         ->sharpen(10);
   }
}