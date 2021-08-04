<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\ContractEntite as ContractEntite;

class ContractRepo extends Model
{
   //===== Local Parameter =====
   protected $contract_entity;
    
   //===== Construct Initial =====
   public function __construct()
   {
       $this->contract_entity = new ContractEntite();
   }    
    /*================================== 
    * @brief: Get Contract
    * @paeam_in: $filer 
                 $order 
    * @return: Assessment information
    ===================================*/   
    public function GetOne($id)
    {
       return $this->contract_entity->where('contract_id',$id)->get();
    }
   /*================================== 
    * @brief: Get All Analysis 
    * @paeam_in: $filer 
                 $order 
    * @return: Assessment information
    ===================================*/   
    public function AllInformation($order)
    {
       return $this->contract_entity->orderby($order)->get();
    }
    /*================================== 
    * @brief: NewContract
    * @paeam_in: $filer 
                 $order 
    * @return: Assessment information
    ===================================*/   
    public function NewContract($info)
    {
       $NewID =count($this->contract_entity->all())+1;              
       $contract = new ContractEntite();
       $contract->contract_id = "Con-".sprintf("%04d", $NewID);  
       $contract->name = $info->get("Name");
       $contract->part_name = $info->get("Parties");
       $contract->start_date = $info->get("Start");
       $contract->end_date = $info->get("End");
       $contract->status = $info->get("Status");
       $contract->owner = $info->get("Owner");
       $contract->save();
       return $contract->id;
    }      
}
