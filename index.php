<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="jqueryui/css/custom-theme/jquery-ui-1.9.0.custom.css">
		<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="jqueryui/js/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="jqueryui/js/jquery-ui-1.9.0.custom.js"></script>
		<style>
			html {
				font-family: 'Muli', sans-serif;
			}
			#rater span {
			/*	FOR VERTICAL SLIDERS
				height: 120px;
				float: left;
				margin: 15px; */
			/* FOR HORIZONTAL SLIDERS */
				width: 120px;
				margin: 15px 0 0px 15px;
				display: block;
			}
 
			.ui-slider-handle {
				font-size: .8em;
				padding: 1px;
				text-align: center;
				text-decoration: none;
			}

			span#talent .ui-state-default, .ui-slider-range {
				background: #E6E6E6;
			}

			label {
				margin: 2px 0 15px 15px;
				font-size: .8em;
			}

			input {
				display: block;
				margin: 15px;
			}

		</style>

		<script>
			$(document).ready(function(){
				
				$("#rater > span").each(function(){	
					var value = parseInt( $(this).text());
					$(this).empty().slider({
						value: value,
						range: "min",
						min: 0,
						max: 10,
						animate: true,
						orientation: "horizontal",
						create: function(event,ui) {
							$(this).attr("value",value);
							$(this).find('.ui-slider-handle').html(value);
							console.log(value);
						},
						slide: function(event,ui) {
							$(this).attr("value",ui.value);
							$(this).find('.ui-slider-handle').html(ui.value);
							console.log(ui.value);
						}
					});
				});
				
				$("#rate").click(function(event){
					
					var talentScore = $("#talent").val();
					var presenceScore = $("#presence").val();
					var presentationScore = $("#presentation").val();
					var energyScore = $("#energy").val();
					var funScore = $("#fun").val();
					
					$.ajax({
						type: "POST",
						url: "rate.php",
						data: {talent : talentScore, presence : presenceScore, presentation : presentationScore, energy : energyScore, fun : funScore},
						cache: false,
						success: function(data){
							console.log(data);						}
					})
					
				});
			});
		</script>
	</head>
	<body>
		<div id="rater">
			<span id="talent">8</span>
			<label for="talent">talent</label>
		    <span id="presence">7</span>
		    <label for="presence">presence</label>
		    <span id="presentation">5</span>
		    <label for="presentation">presentation</label>
		    <span id="energy">3</span>
		    <label for="energy">energy</label>
		    <span id="fun">4</span>
		    <label for="fun">fun</label>
		   	<input type="button" id="rate" value="rate!" />
		</div> 
	</body>
</html>