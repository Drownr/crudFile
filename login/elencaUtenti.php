<input type='hidden' id='userTEMP' name='userTEMP'/>
<input type='hidden' id='passwordTEMP' name='passwordTEMP'/>
<input type='hidden' id='admin' name='admin'/>

<header>Elenco utenti</header><br>
<div align="center">
	<table class="container">
	<thead>
		<tr>
			<th><h1> Username </h1></th><th><h1> Password </h1></th><th><h1> Privilegi </h1></th>
		</tr>
	</thead>
	<?php
	$utenti = file("users.txt");

	foreach ($utenti as $user) {
		if ($user != "\n"){
			//echo "\"" . $user . "\"\n";
			$campo = explode('|', $user);
			$admin = trim(preg_replace('/\s+/', ' ', $campo[2]));
			echo "<tr><td>$campo[0]</td><td>$campo[1]</td><td>$campo[2]</td>
			<td><input type='button' id=\"go\" value='Elimina' onclick='modificaUtente(\"$campo[0]\",\"$campo[1]\", 4);'/></td>
			<td><input type='button' id=\"go\" value='Modifica' onclick='modificaUtente(\"$campo[0]\",\"$campo[1]\", 5, \"$admin\");'/></td>
			</tr>";
		}
	}
	?>
	</table>
</div><br><br>
<input type='button' id="go" value='Crea nuovo utente' onclick="cambiaStato(6)"/><br>
<input type='button' id="go" value='Torna indietro' onclick="cambiaStato(1)"/><br><br>