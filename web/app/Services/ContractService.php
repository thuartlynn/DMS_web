<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ContractRepo as Contract;
use App\Entites\DocumentEntite as Document;
use App\Entites\MaintenanceEntite as Maintenance;
use App\User;

class ContractService
{

   //===== Local Parameter =====
   protected $Contract_repo;
    
   //===== Construct Initial =====
   public function __construct()
   {
       $this->Contract_repo = new Contract();
   }    
   // ---------------------------------------------------------------------------
   // 名稱   : GetAll
   // 說明   : Return All Contracts Detail information
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function GetAll()
   {
      $Info = $this->Contract_repo->AllInformation('start_date');  
      $Contracts = collect([]);
      foreach($Info as $s)
      {
          $Contract = collect([]);
          $Contract->put("number",$s->contract_id);
          $Contract->put("name",$s->name);
          $Contract->put("parties",$s->part_name);
          $Contract->put("fromDate",$s->start_date);
          $Contract->put("toDate",$s->end_date);
          $Contract->put("status",$s->status);
          $Contract->put("updateDate",$s->updated_at->format('Y/m/d') );          
          $User= User::find($s->owner);
          $Contract->put("maintenanceStaff",$User->name);
          $Contracts->push($Contract);
      }
      return $Contracts;
   }   
   // ---------------------------------------------------------------------------
   // 名稱   : CreateContract
   // 說明   : Add new Contract information and save document 
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function CreateContract($Info)
   {    
       return $this->Contract_repo->NewContract($Info);
   }     
   // ---------------------------------------------------------------------------
   // 名稱   : SaveDocument
   // 說明   : Add new Contract information and save document 
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function SaveDocument($id,$type,Request $request)
   {          
       if($request->hasfile('files'))
       {         
        foreach($request->file('files') as $file)
        {
         $doc = new Document();
         $doc->name = $file->getClientOriginalName();
         $doc->type = $type;
         $doc->key = $id;
         $doc->version= 1;
         $doc->path = $file->hashName();
         Storage::put($type.'/'.$id,$file);
         $doc->save();
        }
       }    
   }    
   // ---------------------------------------------------------------------------
   // 名稱   : GetContract
   // 說明   : Return Contracts Detail information
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------       
   public function GetContract($id)
   {
    $Info = $this->Contract_repo->GetOne($id);      
    $Contracts = collect([]);
    foreach($Info as $s)
    {
        $Contract = collect([]);
        $Contract->put("number",$s->contract_id);
        $Contract->put("name",$s->name);
        $Contract->put("parties",$s->part_name);
        $Contract->put("fromDate",$s->start_date);
        $Contract->put("toDate",$s->end_date);
        $Contract->put("status",$s->status);
        $Contract->put("updateDate",$s->updated_at->format('Y/m/d') );                
        $User= User::find($s->owner);        
        $Contract->put("Owner",$User->name); 
        $Contract->put("Owner_ID",$User->id); 
        $MailList = Maintenance::where(['type'=>'Contracts','key'=>$s->id])->get();
        $Email='';
        foreach ($MailList as $Mail)
        {
            if($Email == '')
            {
               $Email = $Mail->email;     
            }
            else
            {
               $Email = $Email.",".$Mail->email;     
            }            
        }    
        $Contract->put("Mails",$Email);  
        $doc = Document::where(['type'=>'Contracts','key'=>$s->id])->get();
        $file = collect([]);
        foreach($doc as $d)
        {
            $file->push($d->name);
        }     
        $Contract->put("Files",$file);  
        $Contracts->push($Contract);
    }
    return $Contracts;
    

   }   
   // ---------------------------------------------------------------------------
   // 名稱   : SaveMail
   // 說明   : Add Mail list for Contract
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function SaveMail($ID,$Type,Request $request)
   {
      $MailList = explode(",",$request->persons);  
      $Dates = explode(",",$request->date);   
      $Start = date('Y/m/d',strtotime($Dates[0]));
      $End = date('Y/m/d',strtotime($Dates[1]));   
      foreach ($MailList as $Mail)
      {
        $M = new Maintenance();
        $M->type = $Type;
        $M->key = $ID;
        $M->inform_date = date("Y/m/d", strtotime($End."-5 day"));
        $M->email = $Mail;
        $M->save();
      }
   }
}




