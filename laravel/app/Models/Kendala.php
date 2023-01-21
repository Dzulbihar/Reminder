<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kendala extends Model
{
    use HasFactory;
    protected $table = 'kendala';
    protected $fillable = 
            [
            'user_entry',
            'jenis_request',
            'kategori',
            'keterangan',
            'keterangan1',
            'target',
            'status',

            'file_pendukung_1',
            'file_pendukung_2',
            'file_pendukung_3',
            ];

    public function target()
    {
        return Carbon::parse($this->attributes['target'])
        ->translatedFormat('d F Y, H:i:s');
    }

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

//////////////////////////////////

    public function file_pendukung_1()
    {
        if(!$this->file_pendukung_1){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->file_pendukung_1);
    }

    public function file_pendukung_2()
    {
        if(!$this->file_pendukung_2){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->file_pendukung_2);
    }

    public function file_pendukung_3()
    {
        if(!$this->file_pendukung_3){
            return asset('images/default.jpg');
        }           
        return asset('images/' .$this->file_pendukung_3);
    }
 
//////////////////////////////////

     public function kendala_detail()
    {
        return $this->hasMany(Kendala_detail::class);
    }

}
