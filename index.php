<?php
/*
	CRUD CON FILE
	© Alessandro Tasca
	
	DESCRIZIONE STATI:
	0	-	Stato base, viene presentata la form di log-in
	1	-	Viene mostrato il pannello amministratore
	2	-	Viene mostrato il pannello utente
	3	-	Viene mostrato l'elenco degli utenti
	4	-	Viene eseguita l'eliminazione dell'utente prec. selezionato
	5	-	Viene eseguita la modifica dell'utente prec. selezionato
	6	-	Viene mostrato il pannello per la creazione di un nuovo utente
*/


if (isset($_POST["stato"]))
	$stato = $_POST["stato"];
else
	$stato = 0;
?>
<html>
	<head>
		<title> Log In </title>
		
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="tabelle.css">
		
		<script>		
			function cambiaStato(stato){
				document.getElementById("stato").value = stato;
				document.form.submit();
			}
			
			function modificaUtente(username, password, stato, admin){
				admin = admin || "U";
				document.getElementById("userTEMP").value = username;
				document.getElementById("passwordTEMP").value = password;
				document.getElementById("admin").value = admin;
				cambiaStato(stato);
			}
		</script>
	</head>
	<body>		
		<form action="" method="post" name="form">
			<input type='hidden' id='stato' name='stato'/>
			
		<?php switch ($stato){ 
			case 0:
				include("login/formLogin.php");
				break;
			case 1:
				include("login/pannelloAdmin.php");
				break;
			case 2:
				include("login/pannelloUtente.php");
				break;
			case 3:
				include("login/elencaUtenti.php");
				break;
			case 4:
				include("login/eliminaUtente.php");
				break;
			case 5:
				include("login/modificaUtente.php");
				break;
			case 6:
				include("login/creaUtente.php");
				break;
		}?>
		</form>
	</body>
</html>