<?php
if (isset($_POST["nuovoNome"]) && isset($_POST["nuovaPassword"])){
	
	$username = trim($_POST["nuovoNome"]);
	$password = trim($_POST["nuovaPassword"]);
	
	//Controllo che non si stia tentando di inserire un utente già esistente.
	$procedi = true;
	$utenti = file("users.txt");
	foreach ($utenti as $user) {
		if ($user != "\n"){
			$campo = explode('|', $user);
			if ($campo[0] == $username)
				$procedi = false;
		}
	}
	if ($procedi){
		$utenti = fopen("users.txt", "a") or die("Non riesco ad aprire il file!");
		$record = "$username|$password|";
		if ($_POST["admin"])
			$record = $record . "A";
		else
			$record = $record . "U";

		fwrite($utenti, "\n" . $record);
	?>
	<script>
		cambiaStato(3);
	</script>
	<?php
	}
	else
		echo "Utente gia' esistente!";
} ?>
<script>
function verifica(){
	if (document.forms["form"]["nuovoNome"].value == "" || +
		document.forms["form"]["nuovaPassword"].value == "")
		alert("Inserisci qualcosa!");
	else
		cambiaStato(6);
}
</script>
<table>
	<tr><th>Username</th><th>Password</th><th>Admin</th></tr>
	<tr>
		<td><input type="text" id="nuovoNome" name="nuovoNome"/></td>
		<td><input type="text" id="nuovaPassword" name="nuovaPassword"/></td>
		<td><input type="checkbox" id="admin" name="admin"/></td>
	</tr>
</table>
<input type="button" value="Crea!" onclick="verifica();"/><br><br>
<input type='button' value='Torna indietro' onclick="cambiaStato(3)"/>