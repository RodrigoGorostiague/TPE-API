{include file="header.tpl"}
{if isset($error)}
<div class="alert alert-danger" role="alert">{$error}
</div>
{/if}
  <div class="loginForm">
  <form action="userValidate" method="post">
  <div class="mb-3">
    <label for="userName" class="form-label">UserName</label>
    <input type="text" class="form-control" id="userName" name="userName" required>
    <div id="userName" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-outline-danger">Login</button>
  <button type="button" class="btn btn-outline-danger"><a href="signin">Aun no estoy registrado</a></button>
  </form>
  </div>

{include file="footer.tpl"}
