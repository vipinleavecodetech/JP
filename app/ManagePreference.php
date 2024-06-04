<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/*use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;*/

class ManagePreference extends Model
{
    // use SoftDeletes, InteractsWithMedia, HasFactory;
    
    protected $table = 'manage_preference';
    
      protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
   protected $fillable = [
  'medication_name',
  'price',
  'as_low_as_price',
  'popularity',
  'image',
  'status'
 ];
   
}

