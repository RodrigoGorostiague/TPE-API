{include file="header.tpl"}
{if isset($error)}
<div class="alert alert-danger" role="alert">{$error}
</div>
{/if}
  <div class="loginForm">
  <form action="newUser" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">UserName</label>
    <input type="text" class="form-control" id="email" name="userName" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Nombres</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="lastName" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="emailHelp" required>
    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Estas de acuerdo</label>
  </div>
  <button type="submit" class="btn btn-outline-warning">Crear usuario</button>
  <button type="button" class="btn btn-outline-warning"><a href="login">Ya estoy registrado</a></button>
  </form>
  </div>

{include file="footer.tpl"}
