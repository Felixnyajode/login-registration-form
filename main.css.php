<?php
session_start();
header('Content-Type: text/css; charset=UTF-8');
?>
* {
	padding: 0px;
	margin: 10px;
	font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
}
body {
	width: 800px;
	margin: 0px auto;
}
		#container {
			width: 600px;
			text-align: center;
			margin: 20px auto;
			color: RGB(102, 116, 142);
			background-color: RGB(242, 242, 242);
			border: 2px solid RGB(102, 116, 142);
			box-shadow: 0 0 .3em RGB(102, 116, 142);
		}
			.quote-post {
				text-align: justify;
			}
			#notification {
				width: 500px;
				margin: 0px auto;
<?php
if(isset($_SESSION['pass-fail'])){
	if($_SESSION['pass-fail']==TRUE){
?>
				background-color: RGB(169, 222, 202);
<?php
} 
	else {
?>
				background-color: RGB(255, 165, 156);
<?php
	}
}
?>
			}
				table {
					margin: 0px auto;
				}
					.button {
						height: 40px;
						width: 90px;
						background-color: RGB(101, 101, 101);
						color: white;
						border-radius: 1em;
					}
						submit {
							height: 40px;
							width: 100px;
						}
							td.right {
								text-align: right;
							}	
							input[type=text] {
								height: 30px;
								width: 200px;
								border-radius: .5em;
							}
							input[type=textarea] {
								vertical-align: top;
								text-align: left;
								height: 100px;
								width: 200px;
								border-radius: .5em;
							}