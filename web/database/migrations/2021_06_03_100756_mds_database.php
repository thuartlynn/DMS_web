<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MdsDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("User",function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->text("name");
            $table->text("email");
            $table->text("role");
            $table->text("password");
            $table->timestamps();
        });
        Schema::create("Contract",function (Blueprint $table){
            $table->bigIncrements("id");
            $table->text("contract_id");
            $table->text("name");
            $table->text("part_name");
            $table->text("start_date")->nullable();
            $table->text("end_date")->nullable();
            $table->text("status");
            $table->bigInteger("owner");
            $table->timestamps();
            
        });
        Schema::create("SoftWare",function (Blueprint $table){
            $table->bigIncrements("id");
            $table->text("software_id");
            $table->text("name");
            $table->text("department");
            $table->text("start_date")->nullable();
            $table->text("end_date")->nullable();  
            $table->text("status");
            $table->timestamps();  
        });
        Schema::create("Document",function (Blueprint $table){
            $table->bigIncrements("id");
            $table->text("name");
            $table->text("type");
            $table->text("key");
            $table->integer("version"); 
            $table->text("path");
            $table->timestamps();   
        });        
        Schema::create("Maintenance",function (Blueprint $table){
            $table->bigIncrements("id");
            $table->text("type");
            $table->text("key");
            $table->date("inform_date");
            $table->text("email");
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("User");
        Schema::dropIfExists("Contract");
        Schema::dropIfExists("SoftWare");
        Schema::dropIfExists("Document");
        Schema::dropIfExists("Maintenacne");
    }
}
