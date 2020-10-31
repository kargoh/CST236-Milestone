<?php

require_once '../../header.php';
require_once '../../Autoloader.php';

?>

<head>
<link rel="stylesheet" type="text/css" href="../../css/form.css">
</head>
<body>
<h2>Generate a sales report:</h2>
<div class="centerHalf">
    <form class="inputForm" action="../handlers/processOrdersReport.php">
        <div class="form-group">
            <label for="startdate">Start Date:</label>
            <input class="form-control" name = "startdate" type="date">
        </div>
        <div class="form-group">
            <label for="enddate">End Date:</label>
            <input class="form-control" name="enddate" type="date">
        </div>

        <a class="btn btn-light" href="/milestone6">Cancel</a>
        <input class="btn btn-primary" type="submit" value="Generate Report">
    </form>
</div>

</body>