<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use DateTime;

function formatDateThai($strDate)
{
    $now = new DateTime();
    if ($strDate == '') {
        $strDate = $now->format('y-m-d');
    }
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม ");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}
function formatYearThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    return "$strYear";
}

function changeDateThai($strDate)
{
    $now = new DateTime();
    if ($strDate == '') {
        $strDate = $now->format('y-m-d');
    }
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม ");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai พ.ศ. $strYear";
}

function unique_multi_array($array, $key)
{
    $temp_array = array();
    $i = 0;
    $key_array = array();
    // $arr = json_decode(json_encode($array), true);
    foreach ($array as $val) {
        if (!in_array($val->$key, $key_array)) {
            //     print_r($val);
            //     print_r($key);
            $key_array[$i] = $val->$key;
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}

// function saveFile(Request $request)
// {
//     // echo $request->filetqf;
//     try {
//         if ($request->file('filetqf')->isValid()) {
//             $clientOriginalName = $request->photo->getClientOriginalName();
//             $newFileName = time() . $clientOriginalName;
//             $uploadedFile = $request->file('filetqf');
//             // Save File to local drive
//             Storage::putFileAs('fileTQF', $uploadedFile, $newFileName);
//             return $newFileName;
//         } else {
//             return 0;
//         }
//     } catch (\Throwable $th) {
//         echo $th->getMessage();
//     }
// }

// function cutText($input)
// {
//     $segment = new Segment();

//     $result = $segment->get_segment_array($input);

//     return implode('', $result);
// }

// function clean($str)
// {       
//     $str = utf8_decode($str);
//     $str = str_replace("&nbsp;", "", $str);
//     $str = preg_replace("/\s+/", " ", $str);
//     $str = trim($str);
//     return $str;
// }
