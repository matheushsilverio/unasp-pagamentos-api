<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
</head>
<body>

<h2>Editar</h2>

<form action="{{ route('alterar-instituicao', ['id' => $objeto->id ]) }}" method="POST">
  @csrf
  <label>Id:</label><br/>
  <input type="text" name="id" value="{{ $objeto->id }}"  readonly /><br/><br/>
  <label>Nome:</label><br/>
  <input type="text" name="nome" value="{{ $objeto->nome }}" /><br/><br/>
  <button>Salvar</button>
</form> 
</body>
</html>
