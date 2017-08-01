<?php
//require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
require_once("../../core/include/include.php");
require_once(API_PATH."/example/example.php");

$rs = example();

?>

<HTML>
	<HEAD>
		<TITLE>EXAMPLE</TITLE>
	</HEAD>
	<BODY>
		<DIV>
			THIS IS EXAMPLE PAGE
		</DIV>
		<DIV>
			DB CONNECT EXAMPLE
			<table border="1">
			<?php
				for($i=0 ; $i<count($rs) ; $i++){
					echo "<TR>";
					echo "<TD>".$rs[$i]['username']."</TD>";
					echo "<TD>".$rs[$i]['email']."</TD>";
					echo "</TR>";
				}
			?>
			</table>
		</DIV>
	</BODY>
</HTML>