<!DOCTYPE html>
<html lang="en">

<head>
    <title>Server Monitoring Tool</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <div class='title unselectable'> SERVER MONITORING </div>
    <div class="limiter " style='width:100%;'>
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <div class="table100-head">
                        <form id="myForm" action="details.php" method="post">
                            <input type='hidden' name='jsonInput' id='jsonInput' value='' />
                            <input type='hidden' name='jsonFunnel' id='jsonFunnel' value='' />
                            <input type='hidden' name='json_c2c' id='json_c2c' value='' />
                            <input type='hidden' name='json_api' id='json_api' value='' />
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1 number">#</th>
                                        <th class="cell100 column1">SERVER NAME</th>
                                        <th class="cell100 column1">STATUS</th>
                                        <th class="cell100 column1">UPTIME</th>
                                        <th class="cell100 column1">LAST REFRESH</th>
                                        <th onClick="window.location.href=window.location.href" class="cell100 column1">
                                            <div class='refresh-button'>
                                                <i class="fa fa-refresh"
                                                    style='font-size:14px;padding-right:6px; color:#707070;'
                                                    aria-hidden="true"></i> Refresh
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                    </div>
                    <div id='table-body'>
                        <div class="table100-body js-pscroll">
                            <table>
                                <tbody>
                                    <?php   

                        $json_funnel = file_get_contents("text/funnel.txt");
                        $json_c2c = file_get_contents("text/c2c.txt");
                        $json_api = file_get_contents("text/api.txt");
                        $json = file_get_contents("text/json.txt");
                        $jsonObj = json_decode($json);

                        for ($i =0; $i<sizeof($jsonObj);  $i++) {  
                            if(isset($jsonObj[$i]->name)) $servername = $jsonObj[$i]->name;
                            else  $servername ='';
                            if(isset($jsonObj[$i]->status)) $status = $jsonObj[$i]->status;
                            else  $status ='';
                            if(isset($jsonObj[$i]->lastRefresh)) $lastRefresh=$jsonObj[$i]->lastRefresh;
                            else $lastRefresh ='';

                            if(isset($jsonObj[$i]->status)){
                            if($jsonObj[$i]->status == 'Offline'){
                                $uptime =0;
                                $class= 'offline';
                            }
                               
                            else {
                                $class = 'online';
                                $now = time();
                                if(isset($jsonObj[$i]->lastRefresh))
                                $date = strtotime($jsonObj[$i]->lastRefresh);
                                else  $date =  $now;
                                $datediff = $now - $date;
                                $uptime =  round($datediff / (60 * 60 * 24));
                            }}

                        echo "<tr class='row100 body'>
                         <td class='cell100 column1 number'>".($i + 1)."</td>
                         <td class='cell100 column1' value='".$servername."'  id='server-name-".$i."'>
                         ".$servername."
                         </td>
                         <td class='cell100 column1'>
                            <div class='".$class."'>".$status."</div>
                         </td>
                         <td class='cell100 column1'>". $uptime." days</td>
                         <td class='cell100 column1'>".$lastRefresh."</td>
                         <td class='cell100 column1'><div id='server-clicked-".$i."' style='color:blue; cursor:pointer;'>More Details</div></td>
                         </tr>";} 
                         ?>
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
    //set scrollbar
    $('.js-pscroll').each(function() {
        var ps = new PerfectScrollbar(this);
        $(window).on('resize', function() {
            ps.update();
        })
    });

    $(document).on("click", '[id^="server-clicked"]', function() {
        var serverNumber = $(this).attr('id').slice('15', $(this).attr('id').length);
        var ar = <?php echo $json ?>;
        var ar2 = <?php echo $json_funnel ?>;
        var ar3 = <?php echo $json_c2c ?>;
        var ar4 = <?php echo $json_api ?>;

        var data = JSON.stringify(ar[serverNumber]);
        var data2 = JSON.stringify(ar2[serverNumber]);
        var data3 = JSON.stringify(ar3[serverNumber]);
        var data4 = JSON.stringify(ar4[serverNumber]);

        $('#jsonInput').val(data);
        $('#jsonFunnel').val(data2);
        $('#json_c2c').val(data3);
        $('#json_api').val(data4);

        document.getElementById('myForm').submit();
    });
    </script>
</body>

</html>