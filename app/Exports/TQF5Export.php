<?php

namespace App\Exports;

use App\Models\Branch;
use App\Models\Course;
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
use App\Models\TQF5;
use App\Models\Year;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Events\BeforeSheet;

class TQF5Export implements WithMultipleSheets
{

    use Exportable;

    private $term, $group;

    public function __construct($term)
    {

        $this->term = $term;
        // $this->group = $group;
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

        $sheets = [];
        $course = Course::all();
        $group = GroupStudy::has('group_course')->get();
        $branch = Branch::where('branchName', 'NOT LIKE', '%สำนักงาน%')->orderBy('branchcode', 'ASC')->get();

        foreach ($branch as $key => $value) {
            if ($value->branchcode != '') {
                $group = GroupStudy::orderBy('groupname', 'DESC')->has('group_course')
                    ->where('groupname', 'like', '%' . $value->branchcode . '%')->get();

                foreach ($group as $key => $val) {
                    $int_year = explode($value->branchcode, $val->groupname);
                    $sheets[] = new TQF5Sheet($val->group_course, $this->term, $val, $value->branchName, intval(isset($int_year[1][0]) ? $int_year[1][0] : 0), isset($int_year[1][1]) ? $int_year[1][1] : "");
                    // echo json_encode($value->branchcode . $val->groupname);
                }
            }
        }
        // whereHas('subsubject.group', function (Builder $query) {
        //     $query->where('groupname', 'like', '%' . $this->branch->branchcode . '%');
        // })

        // foreach ($group as $item_group) {
        //     foreach ($course as $item_course) {
        //         # code...
        //         // $tqf= TQF5::join('subject', 'subject.idsubject', '=', 'subject_idSubject')
        //         // ->where('subject.group_idgroup', $value->groupID)->get();->count() > 0
        //         $count = GroupStudy::join('course', 'course.c_id', '=', 'course_id')
        //                 ->where('course_id', $item_course->c_id)
        //                 ->where('groupID', $item_group->groupID)
        //                 ->first();

        //         $branchIn = Branch::all();
        //         foreach ($branchIn as $item) {
        //             $sim = similar_text($item_group->groupname, $item->branchcode, $perc);
        //             // echo $item_group->groupname.$perc.'<br>';
        //             if ($item->branchcode != "") {
        //                 if (strpos($item_group->groupname, $item->branchcode) !== false) {
        //                     $b = Branch::where('branchcode', 'like', $item->branchcode)->first();
        //                     $int_year = explode($item->branchcode, $item_group->groupname);
        //                     // echo $b;
        //                     if ($count) {
        //                         // $tqf = TQF5::where('course_id', 'like', $item->c_id)
        //                         //     ->join('subject', 'subject.idsubject', '=', 'subject_idSubject')
        //                         //     ->where('subject.group_idgroup', $value->groupID)
        //                         //     ->get();
        //                         // $data1[] = $tqf;
        //                         $sheets[] = new TQF5Sheet($item_course, $this->term, $count, $b->branchName, intval($int_year[1][0]));
        //                         // $data[] = $count;
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // print_r($data);
        // foreach ($group as $item) {
        //     $sheets[] = new TQF5Sheet($this->term, $item);
        // }

        return $sheets;
    }
}

class TQF5Sheet implements FromView, WithEvents, WithTitle, WithDrawings
{

    private $term, $group, $course;

    public function __construct($course, $term, $group, $branch, $number_year, $type)
    {

        $this->term = $term;
        $this->group = $group;
        $this->course = $course;
        $this->branch = $branch;
        $this->number_year = $number_year;
        $this->type = $type;
    }

    public function view(): View
    {
        // $branchIn = Branch::all();
        // foreach ($branchIn as $item) {
        //     $sim = similar_text($this->group->groupname, $item->branchcode, $perc);
        //     // echo "similarity: $sim ($perc %)\n";
        //     if ($perc + 0 >= 75 && $this->branch == "") {
        //         $b = Branch::where('branchcode', 'like', $item->branchcode)->first();
        //         $this->branch = $b->branchName;
        //         $int_year = explode($item->branchcode, $this->group->groupname);
        //         $this->number_year = $int_year[1][0];
        //         // print_r($int_year[1][0]) ;
        //         // echo  $this->number_year;
        //     }
        // }
        // echo $this->$groupOut;

        // $tqf = TQF5::where('tqf5.Year_idYear', 'like', $this->term)
        //     ->join('subject', 'subject.idsubject', '=', 'tqf5.subject_idSubject')
        //     ->join('groupstudy', 'groupstudy.groupID', '=', 'subject.group_idgroup')
        //     ->where('groupstudy.course_id', 'like', $this->course->c_id)
        //     ->where('subject.group_idgroup', 'like', $this->group->groupID)
        //     ->get();
        $tqf = TQF5::where('tqf5.Year_idYear', 'like', $this->term)
            ->where('tqf5.group_sub', 'like', $this->group->groupID)
            ->whereHas('group', function (Builder $query) {
                $query->where('course_id', 'like', $this->course->c_id);
            })->get();

        $year = Year::where('idYear', $this->term)->first();

        // echo $this->number_year;
        return view('report.tqf5', [
            'tqf' => $tqf, 'course' => $this->course, 'branch' => $this->branch, 'year' => $year,
            'number_year' => $this->number_year, 'type' => $this->type
        ]);
    }

    // {
    //     // if ($this->term == '') {
    //     //     return view('report.tqf5', [
    //     //         'tqf' => TQF5::join('subject', 'subject.idsubject', '=', 'subject_idSubject')
    //     //             ->where('subject.group_idgroup', $this->group->groupID)->get(),
    //     //     ]);
    //     // }
    //     // if ($this->group == '') {
    //     //     return view('report.tqf5', [
    //     //         'tqf' => TQF5::where('Year_idYear', $this->term)->get(),->where('subject.group_idgroup', $this->group->groupID)
    //     //     ]);
    //     // }
    //     return view('report.tqf5', [
    //         'tqf' => TQF5::join('subject', 'subject.idsubject', '=', 'subject_idSubject')
    //             ->join('course', 'course.c_id', '=', 'course_id')
    //             ->where('subject.group_idgroup', $this->group->groupID)
    //             ->where('Year_idYear', $this->term)->get(),
    //     ]);
    // }

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
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(6);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(9);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(19);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(5);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(12);
                $event->sheet->getDelegate()->getColumnDimension('O')->setWidth(10);

                // $strikethrough = [
                //     'font' => ['strikethrough' => true],
                // ];
                // Get Worksheet
                // Apply Style Arrays
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->applyFromArray($default_font_style);
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getParent()->getDefaultStyle()->getFont()->setName('TH SarabunPSK');
                $event->sheet->getDelegate()->getStyle('A1:O7')->applyFromArray($default_font_style);
                $event->sheet->getDelegate()->getStyle('A1:A4')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A6:F6')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('M6:O6')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:O7')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
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
        return $this->group->groupname;
    }
}
