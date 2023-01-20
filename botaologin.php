      <?php

    if(!isset($_SESSION['email'])) {
      
        ?>

        <div class="menu-item-login">
        <button onclick="myFunction();myFunction2();" href="#" class="header-menu-item-1"
          id="mostralogin">Login</button>
      </div>

        <?php
    }

 else {
  
    ?>

    <div class="menu-item-login">
        <button onclick="mostraPainel();" href="#" class="header-menu-item-1"
          id="mostralogin"> 
          <div class="texto-login"> 

          <div class="login-olaa" style="display: inline-block">
          <span > Olá,&nbsp;</span> 
          </div>

          <div class="login-nome" style="display: inline-block">
          <span > <?php print_r($_SESSION['nome']);; ?> <span>
          </div>

          </div>

        </button>
      </div>

      <?php
}
      ?>