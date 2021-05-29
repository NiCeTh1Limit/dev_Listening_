<?php
    //int[] folderE = new int[5]; //隨機選擇5個欲測試的資料夾
    $Efolder = array();
    //int[,] picnoE = new int[5, 4]; //記錄每個欲測試資料夾裡的4個答案選項
    $Epicno = array();
    //String[,] Epath = new String[5, 4]; //記錄每個測試答案的實際路徑與檔名
    $Epath = array();
    //String[] EpathM = new String[5]; //記錄5個欲測試的聲音路徑
    $EpathM = array();
    //int[] scoreE = new int[5]; //回答後的答案記錄
    $Escore = array();

    //題型路徑: 有 E M H
    $path = "resource/Test1/E";
    //每個題型的數量: E->5 M->10 H->5 、 E->3 M->6 H->3
    $sub_count = $sub_count_E;

    $Efolder = random_folder($path, $sub_count);
    $Epicno = random_picno($path, $Efolder, $sub_count);
    $Epath = random_path($path, $Efolder, $Epicno);
    $EpathM = random_pathM($path, $Efolder);
    
    $path = "resource/Test1/M";
    $sub_count = $sub_count_M;
    $Mfolder = random_folder($path, $sub_count);
    $Mpicno = random_picno($path, $Mfolder, $sub_count);
    $Mpath = random_path($path, $Mfolder, $Mpicno);
    $MpathM = random_pathM($path, $Mfolder);

    $path = "resource/Test1/H";
    $sub_count = $sub_count_H;
    $Hfolder = random_folder($path, $sub_count);
    $Hpicno = random_picno($path, $Hfolder, $sub_count);
    $Hpath = random_path($path, $Hfolder, $Hpicno);
    $HpathM = random_pathM($path, $Hfolder);
    /*
    print_r($Efolder);
    print_r($EpathM);
    //*/

    //隨機EMH題目(共20題)
    //10-14, 20-29, 30-34 、 10-12, 20-25, 30-32
    //開頭為1代表E，2代表M，3代表H
    $test1 = random_subject();
    //紀錄test1中每題的題型(EMH)
    $EMH = test1EMH($test1);
    //記錄test1中每題的題型(EMH)的第幾題
    $EMH_num = test1EMH_num($test1);
    /*
    print_r($test1);
    //print_r($Epath);
    //print_r($Mpath);
    //print_r($EMH);
    //print_r($EMH_num);
    //*/
    

    // 紀錄每個欲測試的資料夾 20 、 15
    $folder = array();
    // 記錄每個欲測試資料夾裡的4個答案選項 20 0123 、 15 0123
    $picno = array();
    // 記錄每個測試答案的實際路徑與檔名 20 0123 、 15 0123
    $path = array();
    // 記錄每個欲測試的聲音路徑 20 、 15
    $pathM = array();

    $folder = combine_folder($Efolder, $Mfolder, $Hfolder, $EMH, $EMH_num);
    $picno = combine_picno($Epicno, $Mpicno, $Hpicno, $EMH, $EMH_num);
    $path = combine_path($Epath, $Mpath, $Hpath, $EMH, $EMH_num);
    $pathM = combine_pathM($EpathM, $MpathM, $HpathM, $EMH, $EMH_num);

    /*
    print_r($folder);
    print_r($picno);
    print_r($path);
    print_r($pathM);
    //*/

function combine_pathM($EpathM, $MpathM, $HpathM, $EMH, $EMH_num){
    global $sub_count_total;
    $arr = array();
    for ($k=0; $k<$sub_count_total; $k++){
        $num = $EMH_num[$k];
        switch ($EMH[$k]){
            case "E":
                $path = "resource/Test1/E";
                $arr[$k.$num] = $EpathM[$num];
                break;
            case "M":
                $path = "resource/Test1/M";
                $arr[$k.$num] = $MpathM[$num];
                break;
            case "H":
                $path = "resource/Test1/H";
                $arr[$k.$num] = $HpathM[$num];
                break;
        }
    }
    return $arr;
}
function combine_path($Epath, $Mpath, $Hpath, $EMH, $EMH_num){
    global $sub_count_total;
    $arr = array();
    for ($k=0; $k<$sub_count_total; $k++){
        $num = $EMH_num[$k];
        switch ($EMH[$k]){
            case "E":
                $path = "resource/Test1/E";
                for ($i=0; $i<4; $i++){
                    $arr[$k.$num.$i] = $Epath[$num.$i];
                }
                break;
            case "M":
                $path = "resource/Test1/M";
                for ($i=0; $i<4; $i++){
                    $arr[$k.$num.$i] = $Mpath[$num.$i];
                }
                break;
            case "H":
                $path = "resource/Test1/H";
                for ($i=0; $i<4; $i++){
                    $arr[$k.$num.$i] = $Hpath[$num.$i];
                }
                break;
        }
    }
    return $arr;
}
function combine_picno($Epicno, $Mpicno, $Hpicno, $EMH, $EMH_num){
    global $sub_count_total;
    $arr = array();
    for ($k=0; $k<$sub_count_total; $k++){
        $num = $EMH_num[$k];
        switch ($EMH[$k]){
            case "E":
                for ($i=0; $i<4; $i++){
                    $arr[$k.$num.$i] = $Epicno[$num.$i];
                }
                break;
            case "M":
                for ($i=0; $i<4; $i++){
                    $arr[$k.$num.$i] = $Mpicno[$num.$i];
                }
                break;
            case "H":
                for ($i=0; $i<4; $i++){
                    $arr[$k.$num.$i] = $Hpicno[$num.$i];
                }
                break;
        }
    }
    return $arr;
}
function combine_folder($Efolder, $Mfolder, $Hfolder, $EMH, $EMH_num){
    global $sub_count_total;
    $arr = array();
    for ($k=0; $k<$sub_count_total; $k++){
        $num = $EMH_num[$k];
        switch ($EMH[$k]){
            case "E":
                $arr[$k] = $Efolder[$num];
                break;
            case "M":
                $arr[$k] = $Mfolder[$num];
                break;
            case "H":
                $arr[$k] = $Hfolder[$num];
                break;
        }
    }
    return $arr;
}
function test1EMH_num($test1){
    global $sub_count_total;
    $arr = array($sub_count_total);
    for ($k=0; $k<$sub_count_total; $k++){
        if ($test1[$k] < 20)
            {
                $arr[$k] = ($test1[$k]-10);
            }
            else
                if ($test1[$k] < 30)
                {
                    $arr[$k] = ($test1[$k]-20);
                }
                else
                {
                    $arr[$k] = ($test1[$k]-30);
                }
    }
    return $arr;
}
function test1EMH($test1){
    global $sub_count_total;
    $arr = array($sub_count_total);
    for ($k=0; $k<$sub_count_total; $k++){
        if ($test1[$k] < 20)
            {
                $arr[$k] = "E";
            }
            else
                if ($test1[$k] < 30)
                {
                    $arr[$k] = "M";
                }
                else
                {
                    $arr[$k] = "H";
                }
    }
    return $arr;
}
//只需要10-14, 20-29, 30-34 、 10-12, 20-25, 30-32
//開頭為1代表E，2代表M，3代表H
function random_subject(){
    global $sub_count_total, $sub_count_E, $sub_count_M, $sub_count_H;
    $tmp;
    $i = 0;
    $arr = array($sub_count_total);

    while ($i < $sub_count_total)
    {
        $tmp = rand(10, (29 + $sub_count_H));
        if ($tmp > (9 + $sub_count_E) && $tmp < 20){
            continue;
        }else if ($tmp > (19 + $sub_count_M) && $tmp < 30){
            continue;
        }
        $arr[$i] = $tmp;
        $j = 0;
        while ($j < $i)
        {
            if ($arr[$j] == $arr[$i])
            {
                $tmp = rand(10, (29 + $sub_count_H));
                if ($tmp > (9 + $sub_count_E) && $tmp < 20){
                    continue;
                }else if ($tmp > (19 + $sub_count_M) && $tmp < 30){
                    continue;
                }
                $arr[$i] = $tmp;
                $j = 0;
            }
            else
                $j++;
        }
        $i++;
    }
    return $arr;
}
//根據隨機路徑取得mp3路徑
function random_pathM($path, $folder){
    for ($k = 0; $k < sizeof($folder); $k++){
        $pathM[$k] = $path . "/" . $folder[$k] . "/M" . $folder[$k] . ".mp3";
    }
    return $pathM;
}
//根據隨機路徑取得隨機排序之圖片(編號)
function random_picno($path, $folder, $sub_count){
    $picno = array();
    for ($k = 0; $k < $sub_count; $k++){
        
        /* 沒必要
        //計算folderE資料夾裡的檔案數
        $dirInfo = new DirectoryInfo($path + folderE[k].ToString() + "\\C" + folderE[k].ToString() + "\\");
        no = dirInfo.GetFiles("*.*").Length;
        */
        
        //資料夾(題目)內的圖片數量
        $img_count = sizeof(array_diff(scandir($path."/".$folder[$k]."/C".$folder[$k]), array('..', '.')));

        //隨機產生四個圖片編號 (通常為1~4)
        $no = non_repeat_arr(4, 4);
        
        for ($i = 0; $i < 4; $i++){
            $picno[$k.$i] = $no[$i];
        }
    }
    return $picno;
}
//隨機圖片路徑
function random_path($path, $folder, $picno){
    for ($k = 0; $k < sizeof($folder); $k++)
    {
        $data = array();
        for ($i = 0; $i < 4; $i++){
            $data[$i] = "/" . $folder[$k] . "/C" . $folder[$k] . "/" . $picno[$k.$i] . ".jpg";
        }
        $pic_path[$k."0"] = $path . $data[0];
        $pic_path[$k."1"] = $path . $data[1];
        $pic_path[$k."2"] = $path . $data[2];
        $pic_path[$k."3"] = $path . $data[3];
        //print_r($path.$data[0]."__".$path.$data[1]."__".$path.$data[2]."__".$path.$data[3])
    }
    return $pic_path;
}
//隨機產生N個資料夾(即N個題目) ($路徑, $N)
function random_folder($path, $N){
    $files = array_diff(scandir($path), array('..', '.'));
    $files_count = sizeof($files);
    $folder = non_repeat_arr($files_count, $N);
    return $folder;
}
//從一定範圍取不重複的數列(陣列)[1~MAX範圍] ($MAX範圍, $要取出的子集合大小)
function non_repeat_arr($files_count, $arr_size){
    $arr = array();
    $i = 0;
        while ($i < $arr_size)
            {
                $arr[$i] = rand(1,$files_count);
                $j = 0;
                while ($j < $i)
                {
                    if ($arr[$j] == $arr[$i])
                    {
                        $arr[$i] = rand(1,$files_count);
                        $j = 0;
                    }
                    else
                        $j++;
                }
                $i++;
            }
    return $arr;
}
?>