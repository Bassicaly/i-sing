<?php
	$INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/inc/";
	$title = "Kerst Concert";
	$description = "Hier zijn de kaarten voor het kerstconcert te bestellen";
?>

<?php require($INC_DIR. "header.php"); ?>
		<section id="main_section">
			<div id="form">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $to = "kaartenbestellen@i-sing.nl";
                    $from = "webmaster@i-sing.nl";
                    $subj = "bestelling kerstconcert" . " " . $_POST["achternaam"];
                    $naam = $woonplaats = $email = $show = $aantal = $opmerking = "";
                    $naam = $_POST["voornaam"] . " ";
                    $naam .= $_POST["achternaam"];
					$woonplaats = $_POST["woonplaats"];
                    $email = $_POST["e-mail"];
                    $show = $_POST["show"];
                    $aantal = $_POST["aantal"];
                    $opmerking = $_POST["opmerking"];
                    $message = $naam . " uit " . $woonplaats . " wil graag " . $aantal . " kaarten bestellen voor de " . $show . " show\r\n";
                    $message .= "\r\nHet e-mail adres is: " . $email . "\r\n" ;
					$message .= "\r\nOpmerkingen:\r\n" . $opmerking . "\r\n";
                    $headers = array();
					$headers[] = "MIME-Version: 1.0";
					$headers[] = "Content-type: text/plain; charset=utf-8";
					$headers[] = "From: " . $from;
					$headers[] = "CC: " . $email;
					$headers[] = "Reply-To: " . $from;
                    if ( mail( $to, $subj, $message, implode("\r\n", $headers)) ) {
						print "<p><h2>Mail is verzonden</h2></p><p>Uw ontvangt op " . $email . " een copy en binnen afzienbare tijd een email met betalings instructies van onze administratie</p>";
					}
					else {
						print "<p><h2>Er is iets fout gegaan met het versturen. Probeer het straks nogmaals</h2><p>";
					}
				}
                ?>
				<h2>Kaarten bestellen</h2>
                <fieldset>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<table>
					<tr>
						<td><label for="achternaam">Achternaam:</label></td>
						<td><input type="text" name="achternaam" id="achternaam"/></td>
					</tr>
					<tr>
						<td><label for="voornaam">Voornaam:</label></td>
						<td><input type="text" name="voornaam" id="voornaam"/></td>
					</tr>
					<tr>
						<td><label for="woonplaats">Woonplaats:</label></td>
						<td><input type="text" name="woonplaats" id="woonplaats" /></td>
					</tr>
					<tr>
						<td><label for="e-mail">e-mailadres:</label></td>
						<td><input type="text" name="e-mail" id="e-mail" /></td>
					</tr>
					<tr>
						<td><label for="show">Middagvoorstelling:</label></td>
						<td><input type="radio" name="show" id="show" value="middag" checked /></td>
					</tr>
					<tr>
						<td><label for="show">Avondvoorstelling:</label></td>
						<td><input type="radio" name="show" id="show" value="avond" /></td>
					</tr>
					<tr>
						<td><label for="aantal">Aantal kaarten:</label></td>
						<td><input type="text" name="aantal" id="aantal" /></td>
					</tr>
					<tr>
						<td><label for="opmerking">Opmerkingen? (kinderen t/m 12 jaar of 65+?)</label></td>
						<td><textarea name="opmerking" id="opmerking" rows="5" cols="40"></textarea></td>
					</tr>
					<tr>
						<td></td><td><input type="submit" /></td>
					</tr>
				</table>
                </form>
                </fieldset>
			</div>
		</section>
		
		<aside id="side_news">
			<a href="http://www.sponsorkliks.com/winkels.php?club=3576" target="_blank"><img src="http://www.sponsorkliks.com/promotie/banners/sk_142_142.gif" alt=“SponsorKliks, gratis sponsoren!” title=“SponsorKliks, sponsor iSing gratis!” Border="0"></a> 
		</aside>
<?php require($INC_DIR. "footer.php"); ?>