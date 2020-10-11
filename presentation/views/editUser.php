<?php

require_once "../../header.php";
require_once "../../Autoloader.php";

echo "<pre>";


$id = $_GET['id'];

$bs = new UserBusinessService();

$user = $bs->findbyID($id);

?>
<div class="container">
  <h1>Edit User</h1>
  <form action="../handlers/process-update-user.php">
  
    <div class="form-group">
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user->getId() ?>">
    </div>
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user->getFirst_name() ?>">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user->getLast_name() ?>">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->getUsername() ?>">
    </div>
    <div class="form-group">
      <label for="role">Role</label>
      <select class="form-control" id="role" name ="role">
        <option selected>Open this select menu</option>
        <option <?php if($user->getRole() == 1) { echo "selected='selected'"; } ?>>1</option>
        <option <?php if($user->getRole() == 2) { echo "selected='selected'"; } ?>>2</option>
        <option <?php if($user->getRole() == 3) { echo "selected='selected'"; } ?>>3</option>
        <option <?php if($user->getRole() == 4) { echo "selected='selected'"; } ?>>4</option>
</select>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user->getPassword() ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>