<!DOCTYPE html>
<html>
<head>
	<title>Tela de Cadastro</title>
	<link rel="stylesheet" href="estcadastro.css">
</head>
<body>
    

	<header>
		<a href="" class="logo">DevsUnited</a>
		
		<ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="sobre_nos.php">Sobre Nos</a></li>
            <li><a href="sobre_Jogo.php">Sobre Nosso Jogo</a></li>
            <li><a href="dowjogo.php">Baixar o Jogo Aqui</a></li>
            <li><a href="cadastrar.php">Faça seu cadastro</a></li>
            
        </ul>
	</header>
	
	

<div  id="conteiner">
	<form method="post">
	
        
		<label for="codigo">Codigo:</label>
		<input type="password" id="codigo" name="codigo" required>

		<label for="name">Nome:</label>
		<input type="text" id="name" name="name" required>

		<label for="sobrename">Sobrenome:</label>
		<input type="text" id="sobrename" name="sobrename" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>


		<label for="gender">Sexo:</label>
		<select id="gender" name="gender" required>
			<option value="">Selecione uma opção</option>
			<option value="male">Masculino</option>
			<option value="female">Feminino</option>
			<option value="other">Outro</option>
		</select>

		<label for="age">Idade:</label>
		<input type="number" id="age" name="age" required>

		<input type="submit" name="submit" value="Cadastrar">
	</form>
</div>
	
    
    <?php

// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "cadastro";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
  
  // Recebe os dados do formulário
  $codigo = $_POST['codigo'];
  $name = $_POST['name'];
  $sobrename = $_POST['sobrename'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  
  // Inserir os dados no banco de dados
  $sql = "INSERT INTO usuarios (codigo, nome, sobrenome, email, genero, idade) 
          VALUES ('$codigo','$name', '$sobrename', $email', '$gender', '$age')";

  if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
  } else {
    echo "Erro ao inserir dados: " . $conn->error;
  }
  
  // Fecha a conexão com o banco de dados
  $conn->close();
}

?>
</body>
</html>
