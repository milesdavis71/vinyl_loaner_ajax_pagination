<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<title>Hanglemez kölcsönző lemezei</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico" />
    <link rel="stylesheet" href="assets/css/app.css">

    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>


            <div id="results"></div>

</div>


    <script type="text/javascript">
    function showRecords(perPageCount, pageNumber) {
        $.ajax({
            type: "GET",
            url: "getPageData.php",
            data: "pageNumber=" + pageNumber,
            cache: false,
            success: function(html) {
                $("#results").html(html);
                $('#loader').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecords(10, 1);
    });
</script>
    <script src="assets/js/app.js"></script>

</body>
</html>
