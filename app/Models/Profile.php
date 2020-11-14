<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function profileImage(){


      if($this->image)
        return '/storage/' . $this->image;
      else
        return 'https://vistapointe.net/images/portrait-1.jpg';
  }
}
