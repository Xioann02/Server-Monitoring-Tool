<?php
error_reporting(0);
if($_POST){
    $json = $_POST["jsonInput"];
    $jsonFunnel = $_POST["jsonFunnel"];
    $json_c2c = $_POST["json_c2c"];
    $json_api = $_POST["json_api"];
    
}

$jsonFunnel = json_decode($jsonFunnel);
$jsonObj = json_decode($json);
$json_c2c = json_decode($json_c2c);
$json_api = json_decode($json_api);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Server Details </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <div class='menu unselectable' style='width:100%;'>
        <div style='float:right;'>
            <span class='menu-button' id='theme'><i class="fa fa-tint"></i> <span id='theme-text'> THEME 1</span></span>
            <a href='index.php'>
                <span class='menu-button'> <i class="fa fa-server"></i> SERVERS</span>
            </a>
            <span class='menu-button' id='refresh'> <i class="fa fa-refresh"></i> REFRESH </span>
        </div>
    </div>
    <div id='server-monitoring'>
        <div id='server-monitoring-content'>
            <div id='serverInfo'>
                <div class='title unselectable'> SERVER MONITORING </div>
                <div class='sub-text unselectable'> Name: <?php  echo $jsonObj->name ?></div>
                <div class='sub-text unselectable'> Status: <span class='<?php echo $jsonObj->status ?>'>
                        <?php  echo $jsonObj->status ?></span></div>
                <div class='sub-text unselectable'> Last refresh: <?php  echo $jsonObj->lastRefresh ?></div>
            </div>
            <div class='container' id='boxes'>
                <div class='row'>
                    <button class="limiter col-lg-12 collapse-row" id='row-status' >- status</button>
                </div>

                <div class='row'>
                    <div class="limiter col-lg-4">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1">API Status
                                                        <button style='float:right; font-size:22px; color:white;'
                                                            id='box-apistatus'>-</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body js-pscroll" id='content-box-apistatus'
                                        style='max-height: 500px; padding:15px;'>
                                        <table>
                                            <tbody>
                                                <div class='conttainer'>

                                                    <div class='row'>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_api->apiStatus->pendingLeads ?></div>
                                                            <div class='box-title'>Pending Leads </div>
                                                        </div>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_api->apiStatus->duplicate ?></div>
                                                            <div class='box-title'>Duplicate</div>
                                                        </div>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_api->apiStatus->failedLeads ?></div>
                                                            <div class='box-title'>Failed Leads</div>
                                                        </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Executed Leads</div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>First Attempt:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_api->apiStatus->executedLeads->firstAttempt ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Telesales:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_api->apiStatus->executedLeads->telesales ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Total Leads</div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Today:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_api->apiStatus->totalLeads->today ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Last week:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_api->apiStatus->totalLeads->lastWeek ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="limiter col-lg-4">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1">Funnel Status

                                                        <button style='float:right; font-size:22px; color:white;'
                                                            id='box-funnelstatus'>-</button>

                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body js-pscroll" style=' max-height: 500px;padding:15px;'
                                        id='content-box-funnelstatus'>
                                        <table>
                                            <tbody>
                                                <div class='conttainer'>

                                                    <div class='row'>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $jsonFunnel->funnelStatus->pendingLeads ?>
                                                            </div>
                                                            <div class='box-title'>Pending Leads </div>
                                                        </div>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $jsonFunnel->funnelStatus->duplicate ?></div>
                                                            <div class='box-title'>Duplicate</div>
                                                        </div>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $jsonFunnel->funnelStatus->failedLeads ?></div>
                                                            <div class='box-title'>Failed Leads</div>
                                                        </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Executed Leads</div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>First Attempt:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $jsonFunnel->funnelStatus->executedLeads->firstAttempt ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Telesales:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $jsonFunnel->funnelStatus->executedLeads->telesales ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Total Leads</div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Today:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $jsonFunnel->funnelStatus->totalLeads->today ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Last week:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $jsonFunnel->funnelStatus->totalLeads->lastWeek ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="limiter col-lg-4">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1">C2C Status
                                                        <button style='float:right; font-size:22px; color:white;'
                                                            id='box-c2cstatus'>-</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body js-pscroll" style='max-height: 500px;padding:15px;'
                                        id='content-box-c2cstatus'>
                                        <table>
                                            <tbody>
                                                <div class='conttainer'>

                                                    <div class='row'>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_c2c->c2cStatus->pendingLeads ?>
                                                            </div>
                                                            <div class='box-title'>Pending Leads </div>
                                                        </div>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_c2c->c2cStatus->duplicate ?></div>
                                                            <div class='box-title'>Duplicate</div>
                                                        </div>
                                                        <div class='col-lg-4 box' style=' max-width: 25%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_c2c->c2cStatus->failedLeads ?></div>
                                                            <div class='box-title'>Failed Leads</div>
                                                        </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Executed Leads</div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>First Attempt:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_c2c->c2cStatus->executedLeads->firstAttempt ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Telesales:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_c2c->c2cStatus->executedLeads->telesales ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Total Leads</div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Today:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_c2c->c2cStatus->totalLeads->today ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px;'>
                                                                <div class='box-body-title'>Last week:</div>
                                                                <div class='box-body-value'>
                                                                    <?php  echo $json_c2c->c2cStatus->totalLeads->lastWeek ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <button class="limiter col-lg-12 collapse-row" id='row-record' >- record</button>

                <div class='row'>
                    <div class="limiter col-lg-4">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1">API Record
                                                        <button style='float:right; font-size:22px; color:white;'
                                                            id='box-apirecord'>-</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body js-pscroll" style='max-height: 500px;padding:15px;'
                                        id='content-box-apirecord'>
                                        <table>
                                            <tbody>
                                                <div class='conttainer'>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box' style=' max-width: 40%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_api->apiRecord->average ?></div>
                                                            <div class='box-title'>Average</div>
                                                        </div>
                                                        <div class='col-lg-5 box' style=' max-width: 40%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_api->apiRecord->percentage; if(!empty( $json_api->apiRecord->percentage)) echo'%';?></div>
                                                            <div class='box-title'>Percentage</div>
                                                        </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Record</div>
                                                            <div style='padding:20px;display: inline-block;
                                                    width: 50%;'>
                                                                <div class='box-body-title'>Min:</div>
                                                                <div class='box-body-value record-number'>
                                                                    <?php  echo $json_api->apiRecord->record->min ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px; display: inline-block;
                                                    width: 20%;'>
                                                                <div class='box-body-title'>Max:</div>
                                                                <div class='box-body-value record-number'>
                                                                    <?php  echo $json_api->apiRecord->record->max ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="limiter col-lg-4">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1">Funnel Record
                                                        <button style='float:right; font-size:22px; color:white;'
                                                            id='box-funnelrecord'>-</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body js-pscroll" style='max-height: 500px; padding:15px;'
                                        id='content-box-funnelrecord'>
                                        <table>
                                            <tbody>
                                                <div class='conttainer'>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box' style=' max-width: 40%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $jsonFunnel->funnelRecord->average ?></div>
                                                            <div class='box-title'>Average</div>
                                                        </div>
                                                        <div class='col-lg-5 box' style=' max-width: 40%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $jsonFunnel->funnelRecord->percentage ; if(!empty( $jsonFunnel->funnelRecord->percentage)) echo'%';?></div>
                                                            <div class='box-title'>Percentage</div>
                                                        </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Record</div>
                                                            <div style='padding:20px; display: inline-block;
                                                    width: 50%;'>
                                                                <div class='box-body-title'>Min:</div>
                                                                <div class='box-body-value record-number'>
                                                                    <?php  echo $jsonFunnel->funnelRecord->record->min ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px; display: inline-block;
                                                    width: 20%;'>
                                                                <div class='box-body-title'>Max:</div>
                                                                <div class='box-body-value record-number'>
                                                                    <?php  echo $jsonFunnel->funnelRecord->record->max ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="limiter col-lg-4">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1">C2C Record
                                                        <button style='float:right; font-size:22px; color:white;'
                                                            id='box-c2crecord'>-</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body js-pscroll" style='max-height: 500px;padding:15px;'
                                        id='content-box-c2crecord'>
                                        <table>
                                            <tbody>
                                                <div class='conttainer'>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box' style=' max-width: 40%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_c2c->c2cRecord->average ?></div>
                                                            <div class='box-title'>Average</div>
                                                        </div>
                                                        <div class='col-lg-5 box' style=' max-width: 40%;'>
                                                            <div class='box-value'>
                                                                <?php  echo $json_c2c->c2cRecord->percentage;  if(!empty($json_c2c->c2cRecord->percentage)) echo'%'; ?></div>
                                                            <div class='box-title'>Percentage</div>
                                                        </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-5 box '
                                                            style=' max-width: 40%; padding: 0px;'>
                                                            <div class='box-header'>Record</div>
                                                            <div style='padding:20px; display: inline-block;
                                                    width: 50%;'>
                                                                <div class='box-body-title'>Min:</div>
                                                                <div class='box-body-value record-number'>
                                                                    <?php  echo $json_c2c->c2cRecord->record->min ?>
                                                                </div>
                                                            </div>
                                                            <div style='padding:20px; display: inline-block;
                                                    width: 20%;'>
                                                                <div class='box-body-title'>Max:</div>
                                                                <div class='box-body-value record-number'>
                                                                    <?php  echo $json_c2c->c2cRecord->record->max ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class='container' id='boxes2'>
                <button class="limiter col-lg-12 collapse-row" id='row-log' >- log</button>
                <div class='row'>
                    <div class="limiter col-lg-6">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1 number" style='width:60px;'>#</th>
                                                    <th class="cell100 column1">Connector Console Log</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    <div class="table100-body js-pscroll" style='max-height: auto;'
                                        id='connectorconsole-log'>
                                        <table>
                                            <tbody>
                                                <?php
                                        $array = $jsonObj->connectorConsoleLog;
                                        for($i = 0; $i<sizeof($array); $i++)
                                        echo "
                                        <tr class='row100 body'>
                                            <td class='cell100 column1 number'>".($i + 1)."</td>
                                            <td class='cell100 column1'>".$array[$i]."</td>
                                        </tr>
                                        ";
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="limiter col-lg-6">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1 number" style='width:60px;'>#</th>
                                                    <th class="cell100 column1">PHP Error Log</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body js-pscroll" style='max-height: auto;' id='phperror-log'>
                                        <table>
                                            <tbody>
                                                <?php
                                        $array = $array = $jsonObj->phpErrorLog;
                                        
                                        for($i = 0; $i<sizeof($array); $i++)
                                        echo "
                                        <tr class='row100 body'>
                                            <td class='cell100 column1 number'>".($i + 1)."</td>
                                            <td class='cell100 column1'>".$array[$i]."</td>
                                        </tr>
                                        ";
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

    //refresh content
    $('#refresh').click(function() {
    });

    //collapse row 
    $(document).on("click", '[id^="row-"]', function() {
        var rowId = $(this).attr('id');
        var contentId = $(this).attr('id').slice(4, $(this).attr('id').length);
        if ($('#' + rowId).html() == "- " + contentId) {
            $('*[id*=' + contentId + ']:visible').css('display', 'none');
            $('#' + rowId).css('display', 'block');
            $('#' + rowId).html("+ " + contentId);
        } else {
            $('*[id*=' + contentId + ']').css('display', 'block');
            $('#' + rowId).html("- " + contentId);
            $('[id^="box"][id*="' + contentId + '"]').html('-');
        }
    });

    //collapse box
    $(document).on("click", '[id^="box-"]', function() {
        if ($(this).html() == '-') {
            $(this).html('+');
            $('#' + 'content-' + $(this).attr('id')).css('display', 'none');
        } else {
            $(this).html('-');
            $('#' + 'content-' + $(this).attr('id')).css('display', 'block');
        }
    });

    //set default theme
    var head = document.getElementsByTagName('HEAD')[0];
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = 'css/theme2.css';
    head.appendChild(link);

    // change theme
    $(document).on("click", '#theme', function() {
        var head = document.getElementsByTagName('HEAD')[0];
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.type = 'text/css';

        if ($('#theme-text').html() == ' THEME 1') {
            link.href = 'css/theme1.css';
            $('#theme-text').html(' THEME 2');
            $("LINK[href*='css/theme2.css']").remove();
        } else {
            link.href = 'css/theme2.css';
            $('#theme-text').html(' THEME 1');
            $("LINK[href*='css/theme1.css']").remove();
        }
        head.appendChild(link);
    });
    </script>

</body>

</html>