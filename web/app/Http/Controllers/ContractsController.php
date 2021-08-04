<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use App\Services\ContractService;
use App\User;

class ContractsController extends Controller
{
   //===== Local Parameter =====
   protected $Contracts_Service;

   //===== Construct Initial =====
   public function __construct()
   {
       $this->Contracts_Service = new ContractService();
   }
   // ---------------------------------------------------------------------------
   // 名稱   : GetAllContractInfomation
   // 說明   : Get All Contracts Detail information
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function GetAllContractInfomation()
   {
     $Data = $this->Contracts_Service->GetAll();
     return $Data;
   }
   // ---------------------------------------------------------------------------
   // 名稱   : AddNewContract
   // 說明   : Get All Contracts Detail information
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function AddNewContract(Request $request)
   {  
      $Dates = explode(",",$request->date);   
      $Start = date('Y/m/d',strtotime($Dates[0]));
      $End = date('Y/m/d',strtotime($Dates[1]));     
      $Detail = collect([]);
      $Detail->put("Name",$request->name);
      $Detail->put("Parties",$request->parties);
      $Detail->put("Start",$Start);
      $Detail->put("End",$End);
      $Detail->put("Status",$request->status);
      $Detail->put("Owner",$request->maintenanceStaff);
      $Contract_ID = $this->Contracts_Service->CreateContract($Detail);    
      $this->Contracts_Service->SaveMail($Contract_ID,'Contracts',$request);
      $this->Contracts_Service->SaveDocument($Contract_ID,'Contracts',$request);          
   }   
   // ---------------------------------------------------------------------------
   // 名稱   : GetMaintenanceMember
   // 說明   : Get Active Member
   // 輸出   : Member Info
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function GetMaintenanceMember()
   {
      $Maintenace = collect([]);      
      $Member = User::where('role','=','User')->get();
      foreach ($Member as $M)
      {
        $Maintenace->put($M->id,$M->name);
      }
      return $Maintenace;
   }
   // ---------------------------------------------------------------------------
   // 名稱   : GetContractInfomation
   // 說明   : Get All Contracts Detail information
   // 輸出   : Contract Infomation
   // 作者   : Matthew 
   // ---------------------------------------------------------------------------
   public function GetContractInfomation(Request $request,$id)
   {
     $Cont = $this->Contracts_Service->GetContract($id);
     return $Cont;            
   }  
}
