<?php

require_once "../../header.php";
require_once "../../Autoloader.php";

?>
<div class="container">
  <h1>Create New User</h1>
  <form action="../handlers/process-new-user.php">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="role">Role</label>
      <select class="form-control" id="role" name ="role">
        <option selected>Open this select menu</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
</select>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
