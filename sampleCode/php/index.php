<!DOCTYPE html>
<?php
include('./view/topbar.php');
?>

<center style="padding-top: 150px">
  <h1>YMIC 掲示板</h1>
  <div class="demo-card-wide mdl-card mdl-shadow--2dp">
    <div class="mdl-card__title">
      <h1 class="mdl-card__title-text">Welcome</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h4><?php if(isset($_GET['msg']))echo $_GET['msg'];?></h4>
    <form action="./controller/login.php" method="POST">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="userName" id="userName" required>
        <label class="mdl-textfield__label" for="sample1">User Name</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" name="passwd" id="passwd" required>
        <label class="mdl-textfield__label" for="sample1">Pass Word</label>
      </div>


    </div>
    <button type='submit' name='action' value='login'>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        LogIn
      </a>
    </div>
  </button>
    <button type='submit' name='action' value='create'>
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        Create New Account
        </a>
      </div></button>  </form>

  </div>
</center>



  <!-- <div class="container">
    <h1 class="mdc-typography--display1">Hello, World!</h1>
    <button type="button" class="mdc-button mdc-button--raised mdc-button--primary">
      Press Me
    </button>
  </div> -->
  </body>
</html>


<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
width: 512px;
}
.demo-card-wide > .mdl-card__title {
color: #fff;
height: 176px;
background: url('') center / cover;
}
.demo-card-wide > .mdl-card__menu {
color: #fff;
}
button{
        background-color: transparent;
        border: none;
        cursor: pointer;
        outline: none;
        padding: 0;
        appearance: none;
}
</style>
