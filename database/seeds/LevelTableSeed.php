<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
            [
                'levelName' => 'เจ้าหน้าที่'
            ],
            [
                'levelName' => 'อาจารย์'
            ],
        ]);
        DB::table('factory')->insert([
            [
                'factoryName' => 'วิศวกรรมศาสตร์'
            ],
        ]);
        DB::table('branch')->insert([
            [
                'factory_idfactory' => 1,
                'branchName' => 'สำนักงานคณะวิศวกรรมศาสตร์',
                'branchcode' => ''
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมคอมพิวเตอร์',
                'branchcode' => 'ECP'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมไฟฟ้า',
                'branchcode' => 'EEP'
            ], [
                'factory_idfactory' => 1,
                'branchName' => ' วิศวกรรมโยธา',
                'branchcode' => 'ECE'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม',
                'branchcode' => 'ENE'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมเมคคาทรอนิกส์',
                'branchcode' => 'EMC'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมเครื่องกล',
                'branchcode' => 'EME'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมเครื่องจักรกลเกษตร',
                'branchcode' => 'EAE'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมอาหารและชีวภาพ',
                'branchcode' => 'EPE'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมอุตสาหการ',
                'branchcode' => 'EIE'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิศวกรรมโลหการ',
                'branchcode' => 'EMT'
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิชาเคมี',
                'branchcode' => ''
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิชาคณิตศาสตร์',
                'branchcode' => ''
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิชาฟิสิกส์ประยุกต์',
                'branchcode' => ''
            ], [
                'factory_idfactory' => 1,
                'branchName' => 'วิชาสถิติประยุกต์',
                'branchcode' => ''
            ]
        ]);
    }
}
