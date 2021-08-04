<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('User')->truncate();
        User::unguard();
        factory(User::class)->create(['name'=>'Matthew_Chang','email'=>'Matthew_Chang@tecoimage.com.tw','role'=>"Admin"]);
        factory(User::class)->create(['name'=>'Zoe_Huang','email'=>'zoe_huang@tecoimage.com.tw','role'=>"User"]);
        factory(User::class)->create(['name'=>'Annie_Wang','email'=>'annie_wang@tecoimage.com.tw','role'=>"User"]);
        factory(User::class)->create(['name'=>'Dives_Chen','email'=>'dives_chen@tecoimage.com.tw','role'=>"User"]);
        User::unguard();
        
    }
}
