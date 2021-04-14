<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Vergi Daireleri Scripti</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="main">
		<div id="header">
			<h1>PHP ve JQuery Ajax <br> Türkiye Vergi Daireleri Scripti</h1>
		</div>
		<div id="content">
			<form method="">

				<label>Şehir : </label>
				<select id="country">
					<option value="">Şehir Seçiniz</option>
				</select>

				<br><br>

				<label>Vergi Daireleri : </label>
				<select id="state" style="width: 300px;">
					<option value=""></option>
				</select>
				
			</form>
		</div>
	</div>

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			function loadData(type, category_id) {
				$.ajax({
					url: "ajax.php",
					type: "POST",
					data: {
						type: type,
						id: category_id
					},
					success: function(data) {
						if (type == "stateData") {
							$("#state").html(data);
						} else {
							$("#country").append(data);
						}

					}
				});
			}

			loadData();

			$("#country").on("change", function() {
				var country = $("#country").val();

				if (country != "") {
					loadData("stateData", country);
				} else {
					$("#state").html("");
				}


			})
		});
	</script>
</body>

</html>