<?php

include 'conf.php';

if (isset($_POST['acao'])) $acao = $_POST['acao'];
else if (isset($_GET['acao'])) $acao = $_GET['acao'];
else $acao = '';

require_once "autoload.php";

#### Construção do objeto ##########################################################################

if (!$acao == '') {	
	echo "Ação: ".$acao."<br>";
	
	$usuario = new Usuario;
	if(isset($_POST['usuario'])) $usuario->setusuario($_POST['usuario']);
	if(isset($_POST['senha'])) $usuario->setSenha(sha1($_POST['senha']));
	if(isset($_POST['nome'])) $usuario->setNome($_POST['nome']);
	if(isset($_POST['data_nascimento'])) $usuario->setDataNascimento($_POST['data_nascimento']);
	if(isset($_POST['ultimo_login'])) $usuario->setUltimoLogin($_POST['ultimo_login']);
	if(isset($_POST['email'])) $usuario->setEmail($_POST['email']);
	echo $usuario;
	//echo "Senha: ".$_POST['senha'];
}

#### PDO ###########################################################################################

$pdo = new PDO('mysql:host=localhost;dbname=prove_sistema_avaliacao',"root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
	switch ($acao) {
		case 'cadastrar':
			insertPDO_usuario();
			break;
		case 'editar':
			updatePDO_usuario();
			break;
		case 'deletar':
			deletePDO_usuario();
			break;
	}	
} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
}

##### Funções ###############################################

function selectPDO_usuario($criterio = 'Nome', $pesquisa = '') {
	try {
		$sql = "SELECT * FROM ".$GLOBALS['tb_usuarios']." WHERE ".$criterio." ";
		if ($criterio == 'Nome' || $criterio = 'usuario') 
			$sql .= " like '%".$pesquisa."%'";
		else $sql .= ' = '.$pesquisa;
		$sql .= ";";
		//var_dump($sql); echo "<br>";

		$consulta = $GLOBALS['pdo']->query($sql);

		$registros = array();

		for ($i = 0; $linha = $consulta->fetch(PDO::FETCH_ASSOC); $i++) {
			$registros[$i] = array();
			array_push($registros[$i], $linha['usuario']);
			array_push($registros[$i], $linha['Senha']);
			array_push($registros[$i], $linha['Nome']);
			array_push($registros[$i], $linha['Data_Nascimento']);
			array_push($registros[$i], $linha['Ultimo_Login']);
			array_push($registros[$i], $linha['Email']);
		}

		return $registros;
	} catch (PDOException $e) {
		echo "Erro: ".$e->getMessage();
	}
}

function selectPDO_usuario_table($registros) {
	# $registros deve ser o retorno da função selectPDO_usuario()
	# ou seja, poderia-se chamar essa função assim: selectPDO_usuariotable(selectPDO_usuario());
	
	echo "<table class='highlight centered responsive-table'>
	<thead class='black white-text'>
	<tr>
		<th>Matrícula</th>
		<th>Senha</th>
		<th>Nome</th>
		<th>Data de nascimento</th>
		<th>Último login</th>
		<th>E-mail</th>
	</tr>
	</thead>
	<tdbody>";

	for ($i=0; $i < count($registros); $i++) {
		echo "<tr>";
		for ($j=0; $j < count($registros[$i]); $j++) { 
			echo "<td>".$registros[$i][$j]."</td>";
		}
		echo "<tr>";
	}
	echo "</tbody>
	</table>";

}

function insertPDO_usuario() {
	$stmt = $GLOBALS['pdo']->prepare("INSERT INTO ".$GLOBALS['tb_usuario']." (usuario, Senha, Nome, Data_Nascimento, Ultimo_Login, Email) VALUES (:usuario, :Senha, :Nome, :Data_Nascimento, :Ultimo_Login, :Email)");

	$stmt->bindParam(':usuario', $usuario);
	$stmt->bindParam(':Senha', $senha);
	$stmt->bindParam(':Nome', $nome);
	$stmt->bindParam(':Data_Nascimento', $data_nascimento);
	$stmt->bindParam(':Ultimo_Login', $ultimo_login);
	$stmt->bindParam(':Email', $email);

	$usuario = $GLOBALS['usuario']->getusuario();
	$senha = $GLOBALS['usuario']->getSenha();
	$nome = $GLOBALS['usuario']->getNome();
	$data_nascimento = $GLOBALS['usuario']->getDataNascimento();
	$ultimo_login = $GLOBALS['usuario']->getUltimoLogin();
	$email = $GLOBALS['usuario']->getEmail();

	$stmt->execute();

	echo "Linhas afetadas: ".$stmt->rowCount();

	header("location:entrar.php");
}

function updatePDO_usuario() {
	$stmt = GLOBALS['pdo']->prepare("UPDATE ".$GLOBALS['tb_usuarios']." SET usuario = :usuario, Senha = :Senha, Nome = :Nome, Data_Nascimento = :Data_Nascimento, Ultimo_Login = :Ultimo_Login, Email = :Email");

	$stmt->bindParam(':Usuario', $usuario);
	$stmt->bindParam(':Senha', $senha);
	$stmt->bindParam(':Nome', $nome);
	$stmt->bindParam(':Data_Nascimento', $data_nascimento);
	$stmt->bindParam(':Ultimo_Login', $ultimo_login);
	$stmt->bindParam(':Email', $email);

	$usuario = $GLOBALS['usuario']->getUsuario();
	$senha = $GLOBALS['usuario']->getSenha();
	$nome = $GLOBALS['usuario']->getNome();
	$data_nascimento = $GLOBALS['usuario']->getDataNascimento();
	$ultimo_login = $GLOBALS['usuario']->getUltimoLogin();
	$email = $GLOBALS['usuario']->getEmail();

	$stmt->execute();

	echo "Linhas afetadas: ".$stmt->rowCount();
}

function deletePDO_usuario() {
	$stmt = $GLOBALS['pdo']->prepare("DELETE FROM ".$GLOBALS['tb_usuarios']." WHERE usuario = :usuario");

	$stmt->bindParam(':usuario', $usuario);

	$usuario = $GLOBALS['usuario']->getusuario();

	$stmt->execute();

	echo "Linhas afetadas: ".$stmt->rowCount();
}

?>