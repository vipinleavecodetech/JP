<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PatientShippingAddress extends Model
{
   use SoftDeletes, InteractsWithMedia, HasFactory;
    
   protected $table = 'patient_shipping_address';
    
   protected $fillable = [
  'patient_id',
  'first_name',
  'last_name',
  'address_one',
  'address_two',
  'country',
  'city',
  'state',
  'zip_code',
 ];
   
}