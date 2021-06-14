<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
</head>
<body>

<h2>instituicao</h2>

<form action="{{ route('registrar-instituicao')}}" method="POST">
  @csrf
  <label>Nome:</label><br/>
  <input type="text" name="nome" /><br/><br/>
  <button>Salvar</button>
</form> 
</body>
</html>
