<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\ContractEntite as Contract;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Contract')->truncate();
        Contract::unguard();
        factory(Contract::class)->create([ 'name' => 'NDA',
        'part_name' => 'Oki Electric Industry Co., Lt',        
        'status' => '洽談中']);     

        factory(Contract::class)->create([ 'name' => 'Feasibility test and evaluation afreement',
        'part_name' => 'HP',
        'start_date' => '2021/4/8',
        'end_date' => '2022/4/8',        
        'status' => '洽談中']);        
        
        factory(Contract::class)->create([ 'name' => 'NDA',
        'part_name' => 'Heroc-Faith Medical Science',
        'status' => '洽談中']);  

        factory(Contract::class)->create([ 'name' => 'NDA',
        'part_name' => 'Crownmate technology ltd.',
        'start_date' => '2021/3/23',
        'end_date' => '2023/3/22',        
        'status' => '洽談中']);  
        
        factory(Contract::class)->create([ 'name' => '無人機開發與產線建置合約書',
        'part_name' => '鉑福系統整合有限公司',
        'start_date' => '2021/4/1',
        'end_date' => '2023/7/31',        
        'status' => '有效']);

        factory(Contract::class)->create([ 'name' => 'Supplement No.1 Software License Agreement - 8859-4, 8859-7 6*12字型',
        'part_name' => '文鼎科技開發股份有限公司',
        'start_date' => '2021/6/1',
        'end_date' => '2025/5/31',        
        'status' => '有效']);

        factory(Contract::class)->create([ 'name' => '補充協議一 - Vietnam, Thai, Arabic',
        'part_name' => '文鼎科技開發股份有限公司',
        'start_date' => '2021/4/23',
        'end_date' => '2026/4/22',        
        'status' => '有效']);

        factory(Contract::class)->create([ 'name' => '補充協議二 - 8859-2, 8859-9',
        'part_name' => '文鼎科技開發股份有限公司',
        'start_date' => '2021/7/11',
        'end_date' => '2026/7/10',        
        'status' => '有效']);

        factory(Contract::class)->create([ 'name' => '軟體授權合約-韓文BMP',
        'part_name' => '文鼎科技開發股份有限公司',
        'start_date' => '2021/2/1',
        'end_date' => '2025/1/31',        
        'status' => '有效']);


        factory(Contract::class)->create([ 'name' => 'NDA',
        'part_name' => 'Toshiba Tec Corporation',
        'start_date' => '2021/2/1',
        'end_date' => '2022/1/31',        
        'status' => '有效']);
        
        factory(Contract::class)->create([ 'name' => 'NDA',
        'part_name' => '數可科技股份有限公司',
        'start_date' => '2020/12/14',
        'end_date' => '2021/12/13',        
        'status' => '有效']);

        factory(Contract::class)->create([ 'name' => 'NDA',
        'part_name' => '德春股份有限公司',
        'start_date' => '2020/1/9',
        'end_date' => '2023/1/8',        
        'status' => '有效']);

        Contract::unguard();

    }
}
