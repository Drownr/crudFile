<?php
if (isset($_POST["username"]) || isset($_POST["password"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$utenti = file("users.txt");
			
	$success = false;
	$admin = false;
	foreach ($utenti as $user) {
		$campo = explode('|', $user);
	
		if (trim($campo[0]) == $username && trim($campo[1]) == $password) {
			$success = true;
			if (trim($campo[2]) == 'A')
				$admin = true;
			break;
		}
	}
	if ($success && $admin) {
		?>
		<script>
		cambiaStato(1);
		</script>
		<?php
	} else if ($success){
		?>
		<script>
		cambiaStato(2);
		</script>
		<?php
	} else{
		?>
		<script>
		cambiaStato(0);
		</script>
		<?php
	} 
} 
?>

<script>
function verificaForm(){
	if (document.forms["form"]["username"].value == "" || +
		document.forms["form"]["password"].value == "")
			alert("Inserisci qualcosa!");
	else
		cambiaStato(0);
}
</script>
<!-- Immissione dei dati -->
Username:<input name="username" type="text"><br>
Password:<input name="password" type="password"><br>
<input type="button" value="Log In" onclick="verificaForm();"/>
