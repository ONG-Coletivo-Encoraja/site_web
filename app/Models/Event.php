<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'date', 
        'time', 
        'modality', 
        'status',           
        'type', 
        'target_audience', 
        'vacancies', 
        'social_vacancies', 
        'regular_vacancies',    
        'material', 
        'interest_area', 
        'price'
    ];
    // relacionamentos
    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }
    public function reviews(){
        return $this->hasMany(Reviews::class);
    }
    public function relates_events(){
        return $this->hasMany(RelatesEvent::class);
    }

    // métodos
    public function search_event_by_name($search){
        if($search){
            $events = Event::where([
                ['name','like', '%'.$search.'%']
            ])->get();

        }else {
            $events = Event::all();
        }
        return $events;
    }
}