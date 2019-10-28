<?php

function geraSelect($valor1,$valor2,$valor3,$valor4,$valor5){
	echo $valor2."<br/>";

	$id=0;
			$sql = 'SELECT * FROM '.$valor1;
			echo $sql."<br/>";

			$result = mysqli_query($GLOBALS['conexao'],$sql);
			?>
		<select name="<?php echo $valor5; ?>">
			<?php
			while ($row = mysqli_fetch_array($result)) {
				
			?>
			<option value="<?php echo $row[$valor3]; ?>"
							<?php if ($row[$valor3]==$valor2){ 
								echo " selected"; } ?>>
							<?php echo $row[$valor4];?>
								
							</option>
        	<?php } ?>
		</select>
	
<?php
}

function codigoUsuario($nome){
	$sql = "SELECT codigo FROM usuario WHERE usuario = '".$nome."'";
	$result = mysqli_query($GLOBALS['conexao'],$sql);
	while ($row = mysqli_fetch_array($result)) {
		return $row['codigo'];
	}	
}


function Query1paraN($tabela,$codigo,$coluna,$campoimprimir) {
		$sql = 'select * from '. $tabela.' where '. $coluna.' = '. $codigo;
		//echo $sql;
		$resultadoB = mysqli_query($GLOBALS['conexao'], $sql);
		while ($row = mysqli_fetch_array($resultadoB)) {
			echo $row[$campoimprimir];
		}
    }
    

?>