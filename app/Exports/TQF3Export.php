<?php

namespace App\Exports;

use App\Models\Branch;
use App\Models\GroupStudy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\Models\TQF3;
use App\Models\USER_TQF3;
use App\Models\Year;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Events\BeforeSheet;
use Illuminate\Support\Facades\DB;

class TQF3Export implements WithMultipleSheets
{

    use Exportable;

    private $term, $group;

    public function __construct($term, $date)
    {

        $this->term = $term;
        // $this->group = $group;
        $this->date = $date;
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     //
    // }
    public function sheets(): array
    {
        $branch = Branch::all();

        $sheets = [];

        foreach ($branch as $item) {
            if ($item->idBranch - 0 != 1 && $item->branchcode != '' && $item->branchcode != '-') {
                $sheets[] = new TQF3Sheet($this->term, $item, $this->date);
            }
        }
        // dd($sheets);
        return $sheets;
    }
}

class TQF3Sheet implements FromView, WithEvents, WithTitle, WithDrawings
{

    private $term, $branch;

    public function __construct($term, $branch, $date)
    {

        $this->term = $term;
        $this->branch = $branch;
        $this->date = $date;
    }

    public function view(): View
    {
        // printf($this->branch->branchcode);
        // join('subject', 'subject.idsubject', '=', 'subject_idSubject')
        //             ->join('user_tqf3', 'user_tqf3.tqf3ID', '=', 'tqf3.tqf3ID')
        //             ->join('users', 'users.userID', '=', 'user_tqf3.userID')->where('users.level_LevelID', 'like', 2)
        $t = TQF3::whereHas('group', function (Builder $query) {
            $query->where('groupname', 'like', '%' . $this->branch->branchcode . '%');
        })->whereHas('subuser', function (Builder $query) {
            $query->where('level_LevelID', 'like', 2);
        })
            ->whereHas('subuser')
            ->where('Year_idYear', 'like', $this->term)->get();

        $tUnique = $t->unique(['tqf3ID']);


        $year = Year::where('idYear', $this->term)->first();
        //         foreach ($u as $key => $value) {// ->where('users.branch_idBranch', 'like',  '%' . $this->branch->idBranch . '%')
        //         echo json_encode($value);
        //         }
        //        echo json_encode($tqf);
        // printf($tUnique);
        return view('report.tqf3', [
            'tqf' => $tUnique, 'branch' => $this->branch, 'year' => $year, 'date' => $this->date
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $default_font_style = [
                    'font' => ['name' => 'TH SarabunPSK', 'size' => 16]
                ];
                $default_font_style2 = [
                    'font' => ['name' => 'TH SarabunPSK', 'size' => 14]
                ];
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(6);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(14);
                // $strikethrough = [
                //     'font' => ['strikethrough' => true],
                // ];
                // // Get Worksheet
                // $drawing = new Drawing();
                // // $drawing->setName('Logo');
                // // $drawing->setDescription('This is my logo');
                // $drawing->setPath(public_path('assets/img/logo/logo-university.png'));
                // $drawing->setHeight(1);
                // $drawing->setCoordinates('A1');
                // $drawing->setWorksheet($event->sheet->getDelegate());
                // Apply Style Arrays
                // $event->sheet->getDelegate()->getStyle('A2:B6')->applyFromArray($default_font_style);
                // $event->sheet->getDelegate()->getStyle('H6:I6')->applyFromArray($default_font_style);
                // $event->sheet->getDelegate()->getStyle('H6:I6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                // $event->sheet->getDelegate()->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle('F6')->applyFromArray($default_font_style2);
                // $event->sheet->getDelegate()->getStyle('A6:B6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->applyFromArray($default_font_style);

                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getFont()->setName('TH SarabunPSK');
                $event->sheet->getDelegate()->getStyle('A2:A5')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A6:I6')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('F7:G7')->getFont()->setBold(true);


                // $event->sheet->getDelegate()->getStyle('A6')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            },
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        // $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/assets/img/logo/logo-excel.png'));
        $drawing->setHeight(80);
        $drawing->setCoordinates('A1');
        $drawing->setOffsetX(10);

        return $drawing;
    }

    public function title(): string
    {
        // echo  $this->group->groupname;
        return $this->branch->branchcode;
    }
}
