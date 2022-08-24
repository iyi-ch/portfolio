<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <script src="https://kit.fontawesome.com/c439e0ab09.js" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'ISOCTEUR';

        }

        /* 背景 1920 x 1080 */
        .background {
            background-image: url(./image/1.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* 背景圖片不會隨頁面滾動 */
            background-position: center;
            background-size: cover;
        }

        .background::after {
            /* position: relative; */
            content: '';
            display: block;
            position: fixed;
            width: 45%;
            height: 50%;
            /* 模糊大小 */
            top: 250px;
            left: 515px;
            /* 模糊位置 */
            z-index: -1;
            /* 向下一層 */
            box-shadow: 0 0 0 1px #ffffff3f inset, 0 8px 16px black;
            backdrop-filter: blur(10px);
            /* 毛玻璃 */

            /* background-repeat: repeat-x;
            background-color: azure;
            opacity:0.6;
            半透明 */
        }

        /* 按鈕 */
        .button-lastyear {
            font-size: 50px;
            display: block;
            position: fixed;
            margin: 420px;
            top: 45px;
            cursor: pointer;
            line-height: 40px;
            
        }

        .icon-a {
            color: #F0FFFF;
        }

        .button-lastmonth {
            font-size: 50px;
            display: block;
            float: left;
            cursor: pointer;
            position: fixed;
            margin: 550px;
            top: -90px;
        }

        .icon-b {
            color: lightpink;
        }

        .next-year {
            font-size: 50px;
            display: block;
            position: fixed;
            margin: 1420px;
            top: -950px;
            cursor: pointer;
            line-height: 40px;
        }

        .icon-c {
            color: #F0FFFF;
        }

        .next-month {
            font-size: 50px;
            display: block;
            float: left;
            cursor: pointer;
            position: fixed;
            margin: 1320px;
            top: -858px;
        }

        .icon-d {
            color: lightpink;
        }



        /* 年份日期 */
        .year {
            font-size: 27px;
            color: #F0FFFF;
            position: fixed;
            margin: 900px;
            top: -560px;
            left: 15px;
            border-bottom: 1px #F0FFFF solid;
            padding-bottom: 1px;
        }

        .month {
            font-size: 50px;
            color: #F0FFFF;
            position: fixed;
            margin: 830px;
            top: -550px;
            left: 105px;
        }

        table {
            font-size: 25px;
            position: fixed;
            margin: 850px;
            top: -450px;
            left: -60px;
        }

        table td {
            padding: 5px;
            text-align: center;
            color: #F0FFFF;
        }

        .weekend {
            color:lightpink;
        }
    </style>
</head>



<body class="background">
    <?php
    if (isset($_GET['month'])) {
        // isset 用來判斷變數是否存在
        $month = $_GET['month'];
        $year = $_GET['year'];
    } else {
        $month = date('n');
        $year = date("Y");
    }
    switch ($month) {
        case 1: //1月
            $prevMonth = 12;
            $prevYear = $Year - 1;
            $nextMonth = $Month + 1;
            $nextYear = $Year;
            break;

        case 12: //12月
            $prevMonth = $month - 1;
            $prevYear = $year;
            $nextMonth = 1;
            $nextYear = $year + 1;
            break;
        default:
            $prevMonth = $month - 1;
            $prevYear = $year;
            $nextMonth = $month + 1;
            $nextYear = $year;
    }
    ?>

    <!-- 轉換月分 按鍵-->
    <div class="button-lastyear">
        <a href="index.php?year=<?= $prevYear - 1; ?>&month=<?= $prevMonth + 1; ?>"><i class="fa-solid fa-angles-left icon-a"></i></a>
    </div>
    <div class="button-lastmonth">
        <a href="index.php?year=<?= $prevYear; ?>&month=<?= $prevMonth; ?>"><i class="fa-solid fa-angle-left icon-b"></i></a>
    </div>
    <div class="next-year">
        <a href="index.php?year=<?= $nextYear + 1; ?>&month=<?= $nextMonth - 1; ?>"><i class="fa-solid fa-angles-right icon-c"></i></a>
    </div>
    <div class="next-month">
        <a href="index.php?year=<?= $nextYear; ?>&month=<?= $nextMonth; ?>"><i class="fa-solid fa-angle-right icon-d"></i></a>
    </div>

    <?php
    $firstDay = $year . "-" . $month . "-1";
    $firstWeekday = date("w", strtotime($firstDay));
    $monthDays = date("t", strtotime($firstDay));
    $lastDay = $year . "-" . $month . "-" . $monthDays;
    $today = date("Y-m-d");
    $lastWeekday = date("w", strtotime($lastDay));
    $dateHouse = [];
    $sday = date("md", strtotime($today));

    for ($i = 0; $i < $firstWeekday; $i++) {
        $dateHouse[] = "";
    }
    for ($i = 0; $i < $monthDays; $i++) {
        $date = date("Y-m-d", strtotime("+$i days", strtotime($firstDay)));

        $dateHouse[] = $date;
    }
    for ($i = 0; $i < (6 - $lastWeekday); $i++) {
        $dateHouse[] = "";
    }
    ?>


    <div class="year">
        <?php
        echo $year . "";
        ?>
    </div>
    <div class="month">
        <?php
        echo $month . "";
        ?>
    </div>
    <table>
        <tr>
            <td>S</td>
            <td>M</td>
            <td>T</td>
            <td>W</td>
            <td>T</td>
            <td>F</td>
            <td>S</td>
        </tr>
        <?php
        $firstDay = date("Y-") . $month . "-1";
        $firstWeekday = date("w", strtotime($firstDay));
        $monthDays = date("t", strtotime($firstDay));
        $lastDay = date("Y-") . $month . "-" . $monthDays;
        $today = date("Y-m-d");


        for ($i = 0; $i < 6; $i++) {
            echo "<tr>";

            for ($j = 0; $j < 7; $j++) {
                $d = $i * 7 + ($j + 1) - $firstWeekday - 1;

                if ($d >= 0 && $d < $monthDays) {
                    $fs = strtotime($firstDay);
                    $shiftd = strtotime("+$d days", $fs);
                    $date = date("d", $shiftd);
                    $w = date("w", $shiftd);
                    $chktoday = "";
                    if (date("Y-m-d", $shiftd) == $today) {
                        $chktoday = 'today';
                    }
                    //$date=date("Y-m-d",strtotime("+$d days",strtotime($firstDay)));
                    if ($w == 0 || $w == 6) {
                        echo "<td class='weekend $chktoday' >";
                    } else {
                        echo "<td class='workday $chktoday'>";
                    }
                    echo $date;
                    echo "</td>";
                } else {
                    echo "<td></td>";
                }
            }

            echo "</tr>";
        }
        ?>
    </table>
    </article>
</body>

</html>