<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Patient extends Model
{
    use SoftDeletes, InteractsWithMedia, HasFactory;
    
    protected $table = 'patient';
    
   protected $fillable = [
  'fname',
  'lname',
  'phone',
  'email',
  'gender',
  'month',
  'day',
  'year',
  'selector1',
  'selector2',
  'selector3',
  'selector4',
  'n_option4_textarea4',
  'selector5',
  'selector6',
  'n_option6_textarea6',
  'selector7',
  'selector8',
  'selector9',
  'selector10',
  'i_option10_textarea10',
  'selector12',
  'n_option12_textarea12',
  'selector13',
  'selector14',
  'selector15',
  'selector16',
  'n_option16_textarea16',
  'selector17',
  'selector18',
  'n_option18_textarea18',
  'selector19',
  'selector20',
  'selector21',
  'selector22',
  'selector23',
  'selector24',
  'selector25',
  'n_option25_textarea25',
  'selector26',
  'n_option26_textarea26',
  'selector27',
  'selector28',
  'selector29',
  'n_option29_textarea29',
  'selector30',
  'facePicture',
  'uploadId',	
 ];
   
}