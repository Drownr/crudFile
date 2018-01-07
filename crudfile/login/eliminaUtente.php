<?php
$utenti = file("users.txt");

$TEMP = fopen("TEMPusers.txt", "w") or die("Non riesco a creare il file TEMPusers.txt!");

foreach ($utenti as $user) {
	if ($user != "\n"){
		$campo = explode('|', $user);
		if(!(trim($_POST["userTEMP"]) == $campo[0] && trim($_POST["passwordTEMP"]) == $campo[1])){
			fwrite($TEMP, "$campo[0]|$campo[1]|$campo[2]");
		}
	}
}
unlink("users.txt");
fclose($TEMP);
rename("TEMPusers.txt", "users.txt"); 
?>
<<script>
	cambiaStato(3);
</script>