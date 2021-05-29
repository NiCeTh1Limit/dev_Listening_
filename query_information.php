<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/controller/authority.php";

$db_access = require_once "$RootDir/controller/db_access_authority.php";
if (!$db_access){header("location: $RootDir/lobby.php");}

require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cUser.php";
$_cUser = new cUser();
$ret = $_cUser -> _get_data($_SESSION['account']);
//var_dump($ret['detail']);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    <!--<link rel="stylesheet" href="/DataTables/datatables.min.css">-->
</head>
<div class="container_query">
    <div class="row">
        <legend class="col-form-label title" id="title">
        帳號： <?php echo $_SESSION['account']?> 
        <p><a href="/lobby.php" style="text-align:center;">[ 返回 ]</a></p>
        </legend>
    </div>
    <div class="row">
        <table id="mytable" class="display nowrap" style="width:100%">
            <thead>
                <tr>                
                    <th>#</th>
                    <th>日期</th>
                    <th>姓名</th>
                    <th>出生年月日</th>
                    <th>教育程度</th>
                    <th>醫學診斷</th>
                    <th>語言病理學診斷</th>
                    <th>發病時長(年)</th>
                    <th>發病時長(月)</th>
                    <th>聽力狀況</th>
                    <th>不正常理由</th>
                    <th>到院GCS_E</th>
                    <th>到院GCS_M</th>
                    <th>到院GCS_V</th>
                    <th>目前GCS_E</th>
                    <th>目前GCS_M</th>
                    <th>目前GCS_V</th>
                    <th>MoCA-T</th>
                    <th>通過否</th>
                    <th>視覺</th>
                    <th>視覺矯正</th>
                    <th>肢體</th>
                    <th>肢體狀況</th>
                    <th>身心精礙</th>
                    <th>其他說明</th>
                    <th>其他復健</th>
                    <th>備註</th>
                    <?php
                    for ($i=1; $i<21; $i++){
                        echo "<th>隨機$i</th>";
                    }
                    for ($i=1; $i<21; $i++){
                        echo "<th>資料夾$i</th>";
                    }
                    for ($i=1; $i<21; $i++){
                        echo "<th>答案$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>題號$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>where$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>who$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>what$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>associate$i</th>";
                    }
                    ?>
                    <th>SCORE</th>
                    <th>E</th>
                    <th>M</th>
                    <th>H</th>
                    <th>EMH</th>
                    <th>_where</th>
                    <th>_who</th>
                    <th>_what</th>
                    <th>_associate</th>
                    <?php
                    for ($i=1; $i<11; $i++){
                        echo "<th>R$i</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                
                    <?php
                    for ($i=0; $i<sizeof($ret['detail']); $i++){
                        echo "<tr>";
                        $k = $i+1;
                        print <<< EOT
                        <td>{$k}</td>
                        <td>{$ret['detail'][$i]['日期']}</td>
                        <td>{$ret['detail'][$i]['姓名']}</td>
                        <td>{$ret['detail'][$i]['出生年月日']}</td>
                        <td>{$ret['detail'][$i]['教育程度']}</td>
                        <td>{$ret['detail'][$i]['醫學診斷']}</td>
                        <td>{$ret['detail'][$i]['語言病理學診斷']}</td>
                        <td>{$ret['detail'][$i]['發病時長(年)']}</td>
                        <td>{$ret['detail'][$i]['發病時長(月)']}</td>
                        <td>{$ret['detail'][$i]['聽力狀況']}</td>
                        <td>{$ret['detail'][$i]['不正常理由']}</td>
                        <td>{$ret['detail'][$i]['到院GCS_E']}</td>
                        <td>{$ret['detail'][$i]['到院GCS_M']}</td>
                        <td>{$ret['detail'][$i]['到院GCS_V']}</td>
                        <td>{$ret['detail'][$i]['目前GCS_E']}</td>
                        <td>{$ret['detail'][$i]['目前GCS_M']}</td>
                        <td>{$ret['detail'][$i]['目前GCS_V']}</td>
                        <td>{$ret['detail'][$i]['MoCA-T']}</td>
                        <td>{$ret['detail'][$i]['通過否']}</td>
                        <td>{$ret['detail'][$i]['視覺']}</td>
                        <td>{$ret['detail'][$i]['視覺矯正']}</td>
                        <td>{$ret['detail'][$i]['肢體']}</td>
                        <td>{$ret['detail'][$i]['肢體狀況']}</td>
                        <td>{$ret['detail'][$i]['身心精礙']}</td>
                        <td>{$ret['detail'][$i]['其他說明']}</td>
                        <td>{$ret['detail'][$i]['其他復健']}</td>
                        <td>{$ret['detail'][$i]['備註']}</td>
                        EOT;
                        for ($k=1; $k<21; $k++){
                            $str = '隨機'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        for ($k=1; $k<21; $k++){
                            $str = '資料夾'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        for ($k=1; $k<21; $k++){
                            $str = '答案'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        for ($k=1; $k<11; $k++){
                            $str = '題號'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        for ($k=1; $k<11; $k++){
                            $str = 'where'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        for ($k=1; $k<11; $k++){
                            $str = 'who'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        for ($k=1; $k<11; $k++){
                            $str = 'what'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        for ($k=1; $k<11; $k++){
                            $str = 'associate'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        echo "<td>{$ret['detail'][$i]['SCORE']}</td>";
                        echo "<td>{$ret['detail'][$i]['E']}</td>";
                        echo "<td>{$ret['detail'][$i]['M']}</td>";
                        echo "<td>{$ret['detail'][$i]['H']}</td>";
                        echo "<td>{$ret['detail'][$i]['EMH']}</td>";
                        echo "<td>{$ret['detail'][$i]['_where']}</td>";
                        echo "<td>{$ret['detail'][$i]['_who']}</td>";
                        echo "<td>{$ret['detail'][$i]['_what']}</td>";
                        echo "<td>{$ret['detail'][$i]['_associate']}</td>";
                        for ($k=1; $k<11; $k++){
                            $str = 'R'.$k;
                            echo "<td>{$ret['detail'][$i][$str]}</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
            </tbody>
            <tfoot>
                <tr>                
                    <th>#</th>
                    <th>日期</th>
                    <th>姓名</th>
                    <th>出生年月日</th>
                    <th>教育程度</th>
                    <th>醫學診斷</th>
                    <th>語言病理學診斷</th>
                    <th>發病時長(年)</th>
                    <th>發病時長(月)</th>
                    <th>聽力狀況</th>
                    <th>不正常理由</th>
                    <th>到院GCS_E</th>
                    <th>到院GCS_M</th>
                    <th>到院GCS_V</th>
                    <th>目前GCS_E</th>
                    <th>目前GCS_M</th>
                    <th>目前GCS_V</th>
                    <th>MoCA-T</th>
                    <th>通過否</th>
                    <th>視覺</th>
                    <th>視覺矯正</th>
                    <th>肢體</th>
                    <th>肢體狀況</th>
                    <th>身心精礙</th>
                    <th>其他說明</th>
                    <th>其他復健</th>
                    <th>備註</th>
                    <?php
                    for ($i=1; $i<21; $i++){
                        echo "<th>隨機$i</th>";
                    }
                    for ($i=1; $i<21; $i++){
                        echo "<th>資料夾$i</th>";
                    }
                    for ($i=1; $i<21; $i++){
                        echo "<th>答案$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>題號$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>where$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>who$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>what$i</th>";
                    }
                    for ($i=1; $i<11; $i++){
                        echo "<th>associate$i</th>";
                    }
                    ?>
                    <th>SCORE</th>
                    <th>E</th>
                    <th>M</th>
                    <th>H</th>
                    <th>EMH</th>
                    <th>_where</th>
                    <th>_who</th>
                    <th>_what</th>
                    <th>_associate</th>
                    <?php
                    for ($i=1; $i<11; $i++){
                        echo "<th>R$i</th>";
                    }
                    ?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<style type="text/css">
@import "/css/lobby.css";
div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>

<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!--<script type="text/javascript" src="/DataTables/datatables.min.js"></script>-->
<script type="text/javascript">
$(document).ready( function () {
    $('#mytable').DataTable({
        "info": false,
        "scrollX": true
    });
} );
</script>
</html>