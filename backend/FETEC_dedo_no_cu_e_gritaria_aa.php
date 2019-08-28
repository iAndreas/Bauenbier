<!DOCTYPE html>
<?php

    $OG = 0; // DENSIDADE ORIGINAL
    if (isset($_POST["OG"])) 
                $OG = $_POST["OG"];
                
                
    $FG = 0; // DENSIDADE FINAL
    if (isset($_POST["FG"])) 
				$FG = $_POST["FG"];
    // %ABV = 131,25 * (OG – FG)
    // %ABV = 131,25 * (1,065 – 1,0082)
    // %ABV = 7,455%   

    $ABV = 131.25 * ($OG - $FG);
			
				
?>

<html>
    <head>
	    <meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="../_css/estilo.css">
	    <title>Cálculo ABV</title>
    </head>
        <body>
        <form action="" method="post">
			OG (Densidade Original)<input type="number" name="OG" id="OG" step = "any" min="0.0000" max="2.9999" value="<?php echo $OG; ?>"><br/>
			FG (Densidade Final)<input type="number" step = "any" min="0.0000" max="2.9999" name="FG" id="FG" value="<?php echo $FG; ?>"><br/>
			<input type="submit" name="acao">
		</form>

        <?php
			if ($OG > $FG) { 
				echo "<br/> O teor alcoólico obtido foi de ".number_format(round($ABV, 1), 1, ',', '.')." % ABV"; // round arredonda a variável ($variavel, numero de casas decimais)
			} 

		?>