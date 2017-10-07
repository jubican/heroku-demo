<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/fonts/stylesheet.css" />
</head>
<body>
    <div class="header">
        <div class="heading">AWS + Salesforce Heroku Demo</div>
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
$db = pg_connect("host=ec2-54-163-230-219.compute-1.amazonaws.com port=5432 dbname=d4qutjb0l5o7tq user=rycnwatsutqwyy password=908a4fa5727438207db3a33386a26b0b40f0d0504b5c34bb256f8d6885141acd");

$rs = pg_query($db, "select sfid, name, coalesce(counter__c, 0), coalesce(description, '[Not provided]') from salesforce.account order by name");
while ($row = pg_fetch_row($rs)) {
    ?>
                <div class="table_row">
                    <div class="table_cell company_field"><?php echo $row[1] ?></div>
                    <div class="table_cell customer_field" label="<?php echo $row[3] ?>"><?php echo $row[3] ?></div>
                    <div class="table_cell counter_field"><?php echo $row[2] ?></div>
                    <div class="table_cell action_field">
                        <button class="action_button">Subscribe</button>
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
