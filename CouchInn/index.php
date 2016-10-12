<!doctype html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("includes.php"); ?>

	<script>
	$(document).ready(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1920:2016',

			onSelect: function (date) {
				var dob = new Date(date);
				var today = new Date();

				if (dob.getFullYear() + 18 > today.getFullYear())
				{
					alert(" Debes ser mayor de 18 para poder registrarte! ");
					$('#datepicker').datepicker('setDate', null);

				}
			}

		});
		$("#datepicker").datepicker("option","dateformat","dd-mm-yy");
	});
	/*$(document).ready(function()
	{
	$(window).bind("beforeunload", function() {
	return confirm("Do you really want to close?");
});
}); */
</script>

<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
<script src="js/modernizr.js"></script> <!-- Modernizr -->
<link rel="stylesheet" href="css/mystyle.css">

<title>¡Bienvenidos a CouchInn!</title>

<style>
/* Remove the navbar's default rounded borders and increase the bottom margin */
.navbar {
	margin-bottom: 50px;
	border-radius: 0;
}

/* Remove the jumbotron's default bottom margin */
.jumbotron {
	margin-bottom: 0;
	padding-top: 15px;
	padding-bottom: 15px;

}
.jumbotron .container {
	max-width: 45%;
}
body {
	font-size: 100%;
	font-family: "Open Sans", sans-serif;
}

/* Add a gray background color and some padding to the footer */
footer {
	background-color: #f2f2f2;
	padding: 25px;
}
.fitImage {
	max-width:85%;
	max-height: 85%;
}
.vertical-center {
	height:100%;
	width:100%;

	text-align: center;  /* align the inline(-block) elements horizontally */
	font: 0/0 a;         /* remove the gap between inline(-block) elements */
}

.vertical-center:before {    /* create a full-height inline block pseudo=element */
	content: " ";
	display: inline-block;
	vertical-align: middle;    /* vertical alignment of the inline element */
	height: 100%;
}

.vertical-center > .container {
	max-width: 100%;

	display: inline-block;
	vertical-align: middle;  /* vertical alignment of the inline element */
	/* reset the font property */
	font: 16px/1 "Helvetica Neue", Helvetica, Arial, sans-serif;
}
</style>
</head>
<?php include("random_background.php"); ?>
<body background="<?php echo $bg[array_rand($bg)]; ?>">

	<header >
		<div class="jumbotron">
			<div class="container text-center">
				<img src="./img/f0d2b89.png" class="fitImage">
			</div>
		</div>


		<?php include("./navbar2.php") ?>
	</header>
	<?php if (isset($_GET['msg'])) { ?>
		<div id="alert" role="alert" class="col-md-offset-1 col-md-10 alert <?php echo($_GET['class']) ?>">
			<?php echo($_GET['msg'])?>
		</div>
		<?php } ?>
		<script src="js/validaciones.js"></script>

		<div class="container">

		</div>
		<?php include("./modal.php") ?>
	</body>
	</html>
