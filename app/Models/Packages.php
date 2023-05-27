<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    protected $table = 'trip_packages';
    protected $fillable = [
        'title', 'description', 'image', 'tour_highlights_title', 'tour_highlights_description', 'no_of_day', 'no_of_night', 'address', 'address_1', 'address_2', 'country', 'state', 'city', 'location', 'food', 'sightseeing_title', 'sightseeing_desc', 'sightseeing_img', 'other_desc', 'theme_id', 'type' ,'discount','hotel_type','actual_price','discounted_price','tour_journey','pay_and_hold','ecash','sub_discription','location','food','sightseeing_title',
        'sightseeing_desc','sightseeing_img','other_desc','theme_id','type','discount','hotel_type','actual_price','discounted_price','tour_journey','pay_and_hold','ecash','sub_discription'
    ];
}
