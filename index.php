<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="assets/js/MooTools-Core-1.6.0.js"></script>
    <script type="text/javascript">
    function runme(id) {
        new Request({
            url: 'https://kzfj17nko5.execute-api.us-west-2.amazonaws.com/prod/?affiliateid='+id+'&email_address=kevin@amazonapp.cloud&page=events',
            method: 'get',
            onSuccess: function(response) {
                location.reload();
            }
        }).send();
    }
    </script>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/fonts/stylesheet.css" />
</head>
<body>
    <div class="header">
        <div class="heading">
            <img src="images/aws.png" style="height:40px;"> AWS + 
            <img src="images/salesforce-logo.png" style="height:50px;"> Salesforce
            Heroku Demo
        </div>
    </div>
    <div class="main_body">
        <div class="body_content">
            <div class="table">
                <div class="table_header">
                    <div class="table_cell company_field">Company</div>
                    <div class="table_cell customer_field">Description</div>
                    <div class="table_cell counter_field">Counter</div>
                    <div class="table_cell action_field">Action</div>
                    <div class="table_cell_end"></div>
                </div>
<?php

$db = pg_connect("host=ec2-54-243-47-252.compute-1.amazonaws.com port=5432 dbname=da0thfl5bgjkvo user=byuluzbbpuudzl password=6390576ca36347fb2f7e436e27544ce864ed7db5285c0dd3a9cb4cac2cdc2c3a");

$rs = pg_query($db, "select sfid, id, name, coalesce(counter__c, 0), coalesce(description, '&nbsp;') from salesforce.account order by name");
while ($row = pg_fetch_row($rs)) {
    ?>
                <div class="table_row">
                    <div class="table_cell company_field"><?php echo $row[2] ?></div>
                    <div class="table_cell customer_field"><?php echo $row[4] ?></div>
                    <div class="table_cell counter_field"><?php echo $row[3] ?></div>
                    <div class="table_cell action_field">
                        <button class="action_button" onclick="runme(<?php echo $row[1] ?>);">Click Me!</button>
                    </div>
                    <div class="table_cell_end"></div>
                </div>
    <?php
}

pg_close($db);
?>
            </div>
        </div>
    </div>
</body>
</html>
