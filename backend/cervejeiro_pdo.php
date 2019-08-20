<?php

include 'conf.php';

if (isset($_POST['acao'])) $acao = $_POST['acao'];
else if (isset($_GET['acao'])) $acao = $_GET['acao'];
else $acao = '';

require_once "autoload.php";

#### Construção do objeto ##########################################################################

if (!$acao == '') {	
	echo "Ação: ".$acao."<br>";
	
	$cervejeiro = new Cervejeiro;
	if(isset($_POST['usuario'])) $cervejeiro->setusuario($_POST['usuario']);
	if(isset($_POST['senha'])) $cervejeiro->setSenha(sha1($_POST['senha']));
	if(isset($_POST['nome'])) $cervejeiro->setNome($_POST['nome']);
	if(isset($_POST['data_nascimento'])) $cervejeiro->setDataNascimento($_POST['data_nascimento']);
	if(isset($_POST['ultimo_login'])) $cervejeiro->setUltimoLogin($_POST['ultimo_login']);
	if(isset($_POST['email'])) $cervejeiro->setEmail($_POST['email']);
	echo $cervejeiro;
	//echo "Senha: ".$_POST['senha'];
}

#### PDO ###########################################################################################

$pdo = new PDO('mysql:host=localhost;dbname=prove_sistema_avaliacao',"root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
	switch ($acao) {
		case 'cadastrar':
			insertPDO_alun();
			break;
		case 'editar':
			updatePDO_alun();
			break;
		case 'deletar':
			deletePDO_alun();
			break;
	}	
} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
}

#### Funções ###############################################

function selectPDO_alun($criterio = 'Nome', $pesquisa = '') {
	try {
		$sql = "SELECT * FROM ".$GLOBALS['tb_cervejeiros']." WHERE ".$criterio." ";
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

function selectPDO_alun_table($registros) {
	# $registros deve ser o retorno da função selectPDO_alun()
	# ou seja, poderia-se chamar essa função assim: selectPDO_aluntable(selectPDO_alun());
	
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

function insertPDO_alun() {
	$stmt = $GLOBALS['pdo']->prepare("INSERT INTO ".$GLOBALS['tb_cervejeiros']." (usuario, Senha, Nome, Data_Nascimento, Ultimo_Login, Email) VALUES (:usuario, :Senha, :Nome, :Data_Nascimento, :Ultimo_Login, :Email)");

	$stmt->bindParam(':usuario', $usuario);
	$stmt->bindParam(':Senha', $senha);
	$stmt->bindParam(':Nome', $nome);
	$stmt->bindParam(':Data_Nascimento', $data_nascimento);
	$stmt->bindParam(':Ultimo_Login', $ultimo_login);
	$stmt->bindParam(':Email', $email);

	$usuario = $GLOBALS['cervejeiro']->getusuario();
	$senha = $GLOBALS['cervejeiro']->getSenha();
	$nome = $GLOBALS['cervejeiro']->getNome();
	$data_nascimento = $GLOBALS['cervejeiro']->getDataNascimento();
	$ultimo_login = $GLOBALS['cervejeiro']->getUltimoLogin();
	$email = $GLOBALS['cervejeiro']->getEmail();

	$stmt->execute();

	echo "Linhas afetadas: ".$stmt->rowCount();

	header("location:entrar.php");
}

function updatePDO_alun() {
	$stmt = GLOBALS['pdo']->prepare("UPDATE ".$GLOBALS['tb_cervejeiros']." SET usuario = :usuario, Senha = :Senha, Nome = :Nome, Data_Nascimento = :Data_Nascimento, Ultimo_Login = :Ultimo_Login, Email = :Email");

	$stmt->bindParam(':Usuario', $usuario);
	$stmt->bindParam(':Senha', $senha);
	$stmt->bindParam(':Nome', $nome);
	$stmt->bindParam(':Data_Nascimento', $data_nascimento);
	$stmt->bindParam(':Ultimo_Login', $ultimo_login);
	$stmt->bindParam(':Email', $email);

	$usuario = $GLOBALS['cervejeiro']->getUsuario();
	$senha = $GLOBALS['cervejeiro']->getSenha();
	$nome = $GLOBALS['cervejeiro']->getNome();
	$data_nascimento = $GLOBALS['cervejeiro']->getDataNascimento();
	$ultimo_login = $GLOBALS['cervejeiro']->getUltimoLogin();
	$email = $GLOBALS['cervejeiro']->getEmail();

	$stmt->execute();

	echo "Linhas afetadas: ".$stmt->rowCount();
}

function deletePDO_alun() {
	$stmt = $GLOBALS['pdo']->prepare("DELETE FROM ".$GLOBALS['tb_cervejeiros']." WHERE usuario = :usuario");

	$stmt->bindParam(':usuario', $usuario);

	$usuario = $GLOBALS['cervejeiro']->getusuario();

	$stmt->execute();

	echo "Linhas afetadas: ".$stmt->rowCount();
}

?>