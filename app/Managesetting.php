<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Managesetting extends Model
{
    use SoftDeletes, InteractsWithMedia, HasFactory;
    
    protected $table = 'manage_website_setting';
    
   protected $fillable = [
  'logo',
  'phone',
  'address',
  'email',
  'subs_plan_amt',
  'site_url',
  'pharmacy_email',
  'fb_url',
  'twitter_url',
  'instagram_url',
  'linkedin_url',

 ];
   
}