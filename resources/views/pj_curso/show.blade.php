<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
</head>
<body>

<h2>Lista</h2>
<br/>
<h4><a href="/curso/novo">Novo</a></h4>
<br/>
<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Ação</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($objeto as $x) {
      
      echo "<tr>
        <td>$x->nome</td>
        <td><a href='/curso/editar/$x->id' target='_blank'>Visualizar<a/></td>
      </tr>";
    }
  ?>
  </tbody>
</table>

</body>
</html>
