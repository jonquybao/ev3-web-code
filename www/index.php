<?php
if (isset($_REQUEST["on"]))
	echo exec('python /home/robot/projects/lego-nxt/motor.py');
elseif (isset($_REQUEST["off"]))
	echo exec('python /home/robot/projects/lego-nxt/motor.py');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="reset.css" />
		<style>
			.wrapper {
				height: 100%; width: 100%;
				background-color: #304a52;
			}
			#button {
				position: absolute;
				top: 50%; left: 50%;
				transform: translate(-50%, -50%);
			}
		</style>
		<script src="jquery-2.1.1.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#img").click(function() {
					if ($("#img").attr("src") == "off.png") {
						$("#img").attr("src", "on.png");
						$.ajax("/?on")
					} else {
						$("#img").attr("src", "off.png");
						$.ajax("/?off")
					}
				});
			});
		</script>
	</head>
	<body>
		<div class="wrapper">
			<div id="button">
				<img id="img" src="off.png">
			</div>
		</div>
	</body>
</html>