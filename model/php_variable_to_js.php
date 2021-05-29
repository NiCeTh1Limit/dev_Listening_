<?php
print <<<EOT
<script type="text/javascript">
//var test1 = [];
//var test1_folder = [];
var picno = [];
var EMH = [];
var order2 = [];
var picno2 = [];
var sub_count_total = $sub_count_total;
var sub_count_total2 = $sub_count_total2;
var sub_count_type = $sub_count_type;
EOT;
for ($i=0; $i<$sub_count_total; $i++){
    //echo "test1[$k] = ".$test1[$i];
    //echo "test1_folder[$i] = ".$folder[$i];
    echo "EMH[$i] = \"".$EMH[$i]."\";";
    echo "picno[$i] = [];";
    for ($k=0; $k<4; $k++){
        echo "picno[$i][$k] = ".$picno[$i.$EMH_num[$i].$k].";";
    }
}
for ($i=0; $i<$sub_count_total2; $i++){
    echo "order2[$i] = [];";
    echo "picno2[$i] = [];";
    for ($k=0; $k<$sub_count_type; $k++){
        echo "order2[$i][$k] = " . $order2[$i.$k] . "-1" . ";";
        echo "picno2[$i][$k] = [];";
        for ($j=0; $j<4; $j++){
            echo "picno2[$i][$k][$j] = " . $picno2[$i.$k.$j] . ";";
        }
    }
}
echo "</script>";
?>