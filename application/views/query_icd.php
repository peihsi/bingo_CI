<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Search ICD 重大傷病</title>	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
</head>
<body>
	<form id="query_icd">
		<label>重大傷病</label>
		<input name = "keywords" type = "text" />
		<input type="submit" value="查詢">
	</form>
</body>
<script>
$("#query_icd").submit(function(e) {
    var postData = $(this).serializeArray();
    $.ajax({
        url: "http://127.0.0.1:82/index.php/query_icd_controller/search",
        type: "POST",
        data: postData,
        success: function(data, textStatus, jqXHR) {
            //data: return data from server
            var result = JSON.parse(data);
            console.log(result);            
            alert(result.message);            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //if fails      
            alert(textStatus);
        }
    });
    e.preventDefault(); //STOP default action
    //e.unbind(); //unbind. to stop multiple form submit.
});

</script>
</html>