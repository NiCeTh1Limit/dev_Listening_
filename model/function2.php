<?php
    $path2 = "resource/Test2";
    $i0 = 0;
    $i1 = 1;
    $i2 = 2;
    $i3 = 3;
    //order[10,4]: 對M個題目裡的N個問題給予隨機順序
    $order2 = array();
    $order2 = random_order2();
    //隨機產生10個資料夾(即10個題目)
    $folder2 = array();
    $folder2 = random_folder2();
    //M個題目裡的聲音檔路徑
    $path2M = array();
    //M個題目裡的N種題型的4個隨機圖片編號
    $picno2 = array();
    //M個題目裡的N種題型的4個隨機圖片的路徑
    $T2path = array();
    //int k, s;
    //int no;
    for ($k = 0; $k < $sub_count_total2; $k++)
    {
        $path2M[$k] = $path2 . "/" . $folder2[$k] . "/M" . $folder2[$k] . ".mp3";
        //計算folder資料夾裡的檔案數
        for ($s = 0; $s < $sub_count_type; $s++)
        {
            $dirInfo = array_diff(scandir($path2."/".$folder2[$k]."/".($s+1)."/C".$folder2[$k].($s+1)), array('..', '.'));
            $files_count = sizeof($dirInfo);

            //隨機產生四個圖片編號
            $i = 0;
            while ($i < 4)
            {
                $picno2[$k.$s.$i] = rand(0, $files_count);
                $j = 0;
                while ($j < $i)
                {
                    if ($picno2[$k.$s.$j] == $picno2[$k.$s.$i])
                    {
                        $picno2[$k.$s.$i] = rand(0, $files_count);
                        $j = 0;
                    }
                    else
                        $j++;
                }
                $i++;
            }
            //確認是否有0，0即是解答的圖
            $not0 = 0;
            for ($i = 0; $i < 4; $i++){
                if ($picno2[$k.$s.$i] != 0){
                    $not0++;
                }                    
            }
            if ($not0 == 4)
            {
                $picno2[$k.$s.rand(0, 3)] = 0;
            }

            $data = array();
            for ($i = 0; $i < 4; $i++){
                if ($picno2[$k.$s.$i] == 0){
                    $data[$i] = "/A" . $folder2[$k] . ($s + 1) . ".jpg";
                }else{
                    $data[$i] = "/C" . $folder2[$k] . ($s + 1) . "/" . $picno2[$k.$s.$i] . ".jpg";
                }
            }
            $T2path[$k.$s.$i0] = $path2 . "/" . $folder2[$k] . "/" . ($s + 1) . $data[0];
            $T2path[$k.$s.$i1] = $path2 . "/" . $folder2[$k] . "/" . ($s + 1) . $data[1];
            $T2path[$k.$s.$i2] = $path2 . "/" . $folder2[$k] . "/" . ($s + 1) . $data[2];
            $T2path[$k.$s.$i3] = $path2 . "/" . $folder2[$k] . "/" . ($s + 1) . $data[3];
        }
    }
function random_folder2(){
    global $path2,$sub_count_total2;
    $files = array_diff(scandir($path2), array('..', '.'));
    $files_count = sizeof($files);
    $i = 0;    
    while ($i < $sub_count_total2)
    {
        $folder2[$i] = rand(1, $files_count - 1);
        $j = 0;
        while ($j < $i)
        {
            if ($folder2[$j] == $folder2[$i])
            {
                $folder2[$i] = rand(1, $files_count - 1);
                $j = 0;
            }
            else
                $j++;
        }
        $i++;
    }
    return $folder2;
}
function random_order2(){
    $order2 = array();
    global $i0;
    global $i1;
    global $i2;
    global $i3;
    global $sub_count_total2, $sub_count_type;
    for ($l = 0; $l < $sub_count_total2; $l++){
        $i = 0;
        while ($i < $sub_count_type)
        {
            $order2[$l.$i] = rand(1, $sub_count_type);
            $j = 0;
            while ($j < $i)
            {
                if ($order2[$l.$j] == $order2[$l.$i])
                {
                    $order2[$l.$i] = rand(1, $sub_count_type);
                    $j = 0;
                }
                else
                    $j++;
            }
            $i++;
        }
        if ($sub_count_type < 4){continue;}
        if ($order2[$l.$i0] == $sub_count_type)
        {
            //int t;
            $t = $order2[$l.$i0];
            $order2[$l.$i0] = $order2[$l.$i2];
            $order2[$l.$i2] = $t;
        }
        if ($order2[$l.$i1] == $sub_count_type)
        {
            //int t;
            $t = $order2[$l.$i1];
            $order2[$l.$i1] = $order2[$l.$i3];
            $order2[$l.$i3] = $t;
        }
    }
    return $order2;
}
?>