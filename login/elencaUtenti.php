<input type='hidden' id='userTEMP' name='userTEMP'/>
<input type='hidden' id='passwordTEMP' name='passwordTEMP'/>
<input type='hidden' id='admin' name='admin'/>

<table>
<tr><th>Username</th><th>Password</th><th>Privilegi</th></tr>
<?php
$utenti = file("users.txt");

foreach ($utenti as $user) {
	if ($user != "\n"){
		//echo "\"" . $user . "\"\n";
		$campo = explode('|', $user);
		$admin = trim(preg_replace('/\s+/', ' ', $campo[2]));
		echo "<tr><td>$campo[0]</td><td>$campo[1]</td><td>$campo[2]</td>
		<td><input type='button' value='Elimina' onclick='modificaUtente(\"$campo[0]\",\"$campo[1]\", 4);'/></td>
		<td><input type='button' value='Modifica' onclick='modificaUtente(\"$campo[0]\",\"$campo[1]\", 5, \"$admin\");'/></td>
		</tr>";
	}
}
?>
</table>
<input type='button' value='Crea nuovo utente' onclick="cambiaStato(6)"/><br><br>
<input type='button' value='Torna indietro' onclick="cambiaStato(1)"/>