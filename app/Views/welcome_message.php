<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

	
</header>

<!-- CONTENT -->

<section>

	<h1>Throttler System</h1>

	<p>Default Limit <span id="ltval" style="color: red;"><?=$defaultLimit?></span>.<button onclick="displayForm();">Edit</button></p>

	<div id="limtForm" style="display: none;">
		
		<input type="text" name="" id="lmtval">
		<button onclick="submitLimit();">Update</button>
		
	</div>

	<p><button onclick="checkSystem()">Check System</button></p>

<div id="jsonRes"></div>

</section>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->



<!-- SCRIPTS -->

<script>
	var url = 'http://localhost/fingent/public/';
function displayForm()
{

	
	$("#limtForm").css("display", "block");
}

	function submitLimit()
	{
			var lmtval = $('#lmtval').val();
			if(lmtval == '')
			{
			alert('Enter Limit');
			return false;
			}
		
			    $.ajax({
					url : '<?=BASEURL?>Home/updateLimit/'+ lmtval,
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
					
					$('#ltval').html(data.lmtval);
					$("#limtForm").css("display", "none");
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
					console.log(jqXHR);
					alert('Error get data from ajax');
					}
					});




	}

function checkSystem()
{
	   $.ajax({
					url : '<?=BASEURL?>Hotel/List/',
					type: "GET",
					dataType: "JSON",
					success: function(data)
					{
					
					$('#jsonRes').html(JSON.stringify(data));
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
					console.log(jqXHR);
					alert('Error get data from ajax');
					}
					});
}

</script>

<!-- -->

</body>
</html>
