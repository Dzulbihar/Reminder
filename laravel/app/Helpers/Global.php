<?php 

use App\Models\Kendala;
use Illuminate\Support\Facades\DB;

////////////////////////////////////

function TotalKendala()
{
  return 
  Kendala::count();
}

function TargetKendala()
{
  return 
  Kendala::where('status',"Proses Pengajuan")->count();
}

function BelumSelesaiKendala()
{
  return 
  Kendala::where('status',"0")->count();
}

function SelesaiKendala()
{
  return 
  Kendala::where('status',"1")->count();
}



?>