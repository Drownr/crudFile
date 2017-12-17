<?php
if ($_POST["admin"] == "A")
	$check = "checked";
else
	$check = "";

if (isset($_POST["nuovoNome"]) && isset($_POST["nuovaPassword"])){
	$username = trim($_POST["vecchioNome"]);
	$password = trim($_POST["vecchiaPassword"]);
	$nusername = trim($_POST["nuovoNome"]);
	$npassword = trim($_POST["nuovaPassword"]);
	
	$utenti = file("users.txt");
	$TEMP = fopen("TEMPusers.txt", "w") or die("Non riesco a creare il file TEMPusers.txt!");
	
	foreach ($utenti as $user) {
		if ($user != "\n"){
			$campo = explode('|', $user);
			if($username != $campo[0] && $password != $campo[1]){
				fwrite($TEMP, "$campo[0]|$campo[1]|$campo[2]");
			}
			else{
				$record = "$nusername|$npassword|";
				if ($_POST["admin"])
					$record = $record . "A\n";
				else
					$record = $record . "U\n";
				fwrite($TEMP, "\n" . $record);
			}
		}
	}
	unlink("users.txt");
	fclose($TEMP);
	rename("TEMPusers.txt", "users.txt"); ?>
	<script>
		cambiaStato(3);
	</script>
	<?php  } ?>
<script>
function verifica(){
	if (document.forms["form"]["nuovoNome"].value == "" || +
		document.forms["form"]["nuovaPassword"].value == "")
		alert("Non e' stata apportata alcuna modifica!");
	else
		cambiaStato(5);
}
</script>

<input type="hidden" name="vecchioNome" value="<?php echo $_POST["userTEMP"] ?>"/>
<input type="hidden" name="vecchiaPassword" value="<?php echo $_POST["passwordTEMP"] ?>"/>
<table>
	<tr><th>Username</th><th>Password</th><th>Admin</th></tr>
	<tr>
		<td><input type="text" id="nuovoNome" name="nuovoNome" value="<?php echo $_POST["userTEMP"] ?>"/></td>
		<td><input type="text" id="nuovaPassword" name="nuovaPassword" value="<?php echo $_POST["passwordTEMP"] ?>"/></td>
		<td><input type="checkbox" id="admin" name="admin" <?php echo $check ?>/></td>
	</tr>
</table>
<input type="button" value="Modifica!" onclick="verifica();"/><br><br>
<input type='button' value='Torna indietro' onclick="cambiaStato(3)"/>