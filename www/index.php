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
			<h1><?php
			if (isset($_REQUEST["on"])){
				$file = "/sys/class/tacho-motor/motor0/speed_sp";
				die(file_put_contents($file, "500"));

				$file = "/sys/class/tacho-motor/motor0/command";
				die(file_put_contents($file, "run-forever"));

				echo exec('python /home/robot/projects/lego-nxt/motor.py 2>&1', $output);
				print_r($output);
			}
			elseif (isset($_REQUEST["off"])){
				echo exec('python /home/robot/projects/lego-nxt/motor.py');
			}
			?>
			</h1>
			<div id="button">
				<img id="img" src="off.png">
			</div>
		</div>
	</body>
</html>