<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kendala_detail extends Model
{
    use HasFactory;
    protected $table = 'kendala_detail';
    protected $fillable = 
            [
            'kendala_id',
            'parent',
            'user_entry',
            'komentar',
            'file_pendukung',
            ];

    public function created_at()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y - H:i:s');
    }

    public function updated_at()
    {
        return Carbon::parse($this->attributes['updated_at'])
        ->translatedFormat('l, d F Y - H:i:s');
    }

/////////////////////////////////////

    public function file_pendukung()
    {
        if(!$this->file_pendukung){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->file_pendukung);
    }

/////////////////////////////////////

    public function kendala()
    {
        return $this->belongsTo(Kendala::class);
    }

    public function childs()
    {
        return $this->hasMany(Kendala_detail::class,'parent');
    }


}
