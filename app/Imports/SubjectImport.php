<?php

namespace App\Imports;

use App\Models\GroupStudy;
use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $i => $row) {
            if ($i > 0) {
                // $checkgroub = GroupStudy::where('groupname', 'like', $row[3])->count();
                // if ($checkgroub == 0) {
                //     $groub = new GroupStudy;
                //     $groub->groupname = $row[3];
                //     $groub->save();
                // }

                // $getgroub = GroupStudy::where('groupname', 'like', $row[3])->first('groupID');
                $gsub = Subject::where('subjectCode', 'like', "%" . $row[0] . "%")->count();
                if ($gsub == 0) {
                    // $insert_data = [
                    //     'subjectCode' => $row[0],
                    //     'THsubject' => $row[1],
                    //     'ENsubject' => $row[2],
                    //     // 'group_idgroup' => $getgroub['groupID'],
                    //     'cradit' => $row[3],
                    //     'subNumber' => $row[4],
                    //     'create_date' => date('Y-m-d H:i:s')
                    // ];
                    // if (!empty($insert_data)) {
                    Subject::insert([
                        'subjectCode' => $row[0],
                        'THsubject' => $row[1],
                        'ENsubject' => $row[2],
                        // 'group_idgroup' => $getgroub['groupID'],
                        'cradit' => $row[3],
                        'subNumber' => $row[4],
                        'create_date' => date('Y-m-d H:i:s')
                    ]);
                    // }
                }
            }
        }
    }
}
