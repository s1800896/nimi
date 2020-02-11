<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
	<title>Onko kivaa?</title>
	<link rel="icon" 
      type="image/png" 
      href="omakuva1.png">
</head>
<body>
<div>
<h1>Olenko oikealla alalla? <br> - t e k o ä l y s o v e l l u s d e m o </h1>
<h3>( 10.7.2019 )</h3>

<?php // Tämä osa käynnistyy vasta kun luvut on annettu
if (isset($_POST['nro1']) and isset($_POST['nro2']))
{ 	//log(p/1-p) = -5,6 + Y1.6.*0,362 + P2.8.*0,164 + I3.6.*0,532 + I3.12.*0,30
		function laske_ennuste($x1=1, $x2=1, $x3=1, $x4=1) // oletuksena 1
		{  
			$ennuste=-5.6+$x1*0.362+$x2*0.164+$x3*0.532+$x4*0.30;
			// echo "ennuste: " .$ennuste;
			$ennuste_p= exp($ennuste)/(1 + exp($ennuste));
			$ennuste_p=number_format($ennuste_p,2);
			return $ennuste_p; // palauttaa funktiosta arvon 
		} // funktion määritys loppuu tähän
	 	
	$eka=($_POST['nro1']);$toka=($_POST['nro2']);$kolm=($_POST['nro3']);$nelj=($_POST['nro4']);	
	print "<br> <h1> Todennäköisyys, että olet oikealla alalla on <br>";
	print "(" . laske_ennuste($eka,$toka,$kolm,$nelj) . ") = "; // palautusarvo	
	print "  " . laske_ennuste($eka,$toka,$kolm,$nelj)*100 . " prosenttia! </h1> <br><br><br>"; // palautusarvo	
	print "<br> <a href=alalla.php > Takaisin antamaan uudet tuntemukset!</a>"; 		
    print "<br><br> Logistinen regressiomalli (estimoitu N=694) <br> log(p/1-p) = -5,6 + Y1.6.*0,362 + P2.8.*0,164 + I3.6.*0,532 + I3.12.*0,30";
    print "<br><br><br> Ennusteen on laatinut <br> Otto Burman v. 2018.";
    print "<br><br> <a href=alalla.pdf > Lue kuinka tämä tehtiin klikkaamalla tästä! </a>" ;
	exit;// exit koodin suorituksen lopettaa tähän
} // ehto päättyy tähän
?>
<?php // alalla.php
	print '<form action="alalla.php" method="post">';

	print '	<p>Vastaa seuraaviin kysymyksiin '; // lomake 
	print '	miltä tuntuu työpaikalla /töissä /opiskelupaikassa!  </p>'; // lomake 
	print '</p> <input type="submit" name="submit" 
	value="JA PAINA TÄSTÄ" />';

	print '	<p>1: Y1.6. Tiedän mitä osaan ja, jos en vielä, niin opettelen.';  
	print ' <br> 
		<input type="radio" name="nro1" value="0"> 0= Ei siis koskaan 
		<input type="radio" name="nro1" value="1"> 1= Tosi harvoin  
		<input type="radio" name="nro1" value="2"> 2= Joskus
		<input type="radio" name="nro1" value="3" checked> 3= Ei-joo-ehkä?  
		<input type="radio" name="nro1" value="4"> 4= Useinkin 
		<input type="radio" name="nro1" value="5"> 5= Melkein aina 
		<input type="radio" name="nro1" value="6"> 6= AINA! <br><br>';
  
	// .'<br> <input type="text" name="nro1" size="3" value=6 </></p> ';
	print '	<p>2: P2.8. Kivaa on olla suunnittelemassa itselleen hommia 
	ja toteuttaa sitten ne. Minulla on tunne, että tekee 
	niin kuin itseään varten, itselleen.';
	print ' <br> 	
		<input type="radio" name="nro2" value="0"> 0= Ei siis koskaan 
		<input type="radio" name="nro2" value="1"> 1= Tosi harvoin  
		<input type="radio" name="nro2" value="2"> 2= Joskus
		<input type="radio" name="nro2" value="3" checked> 3= Ei-joo-ehkä?  
		<input type="radio" name="nro2" value="4"> 4= Useinkin 
		<input type="radio" name="nro2" value="5"> 5= Melkein aina 
		<input type="radio" name="nro2" value="6"> 6= AINA! <br><br>';

//	.'<br> <input type="text" name="nro2" size="3" value=4 </></p>';
	print '	<p>3: Tunnen että osallistumisesta ja tehtävien tekemisestä 
	tulee hyviä fiiliksiä minulle ja muille.' ;
	print ' <br> 	
		<input type="radio" name="nro3" value="0"> 0= Ei siis koskaan 
		<input type="radio" name="nro3" value="1"> 1= Tosi harvoin  
		<input type="radio" name="nro3" value="2"> 2= Joskus
		<input type="radio" name="nro3" value="3" checked> 3= Ei-joo-ehkä?  
		<input type="radio" name="nro3" value="4"> 4= Useinkin 
		<input type="radio" name="nro3" value="5"> 5= Melkein aina 
		<input type="radio" name="nro3" value="6"> 6= AINA! <br><br>';

	//	.'<br> <input type="text" name="nro3" size="3" value=4 </></p>';
	print '	<p>4: I3.12. Minulla on tunne, että osaan usein löytää hyviä keinoja 
	tehdä sovitut oppimistehtävät. Tunnen tyytyväisyyttä osaamisestani.' ;
	print ' <br> 	
		<input type="radio" name="nro4" value="0"> 0= Ei siis koskaan 
		<input type="radio" name="nro4" value="1"> 1= Tosi harvoin  
		<input type="radio" name="nro4" value="2"> 2= Joskus
		<input type="radio" name="nro4" value="3" checked> 3= Ei-joo-ehkä?  
		<input type="radio" name="nro4" value="4"> 4= Useinkin 
		<input type="radio" name="nro4" value="5"> 5= Melkein aina 
		<input type="radio" name="nro4" value="6"> 6= AINA! <br>';

	//	.'<br> <input type="text" name="nro4" size="3" value=3 </></p>';	
	print '	<p> *-----* </p> ';
	print '</p> <input type="submit" name="submit" 
	value="PAINA TÄSTÄ: Saat ennusteen oletko oikealla alalla" />';
	print '</form>';
?>
</div>
</body>
</html>
