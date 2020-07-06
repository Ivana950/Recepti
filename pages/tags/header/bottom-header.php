
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
<?php  include ("../backend/includes/funkcije.inc.php"); 
  
  


?>

    <script
      src="https://kit.fontawesome.com/ad2a351d60.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <!--Header-->
    <header class="header">
      <div class="logo">
        <a href="index.php"><img src="../img/logo.png"/></a>
      </div>

      <form action="#" class="form" id="form">
        <input type="text" placeholder="Unesite recept" id="naziv-recepta" />
        <button class="btn"><i class="fas fa-search  search"></i></button>
      </form>

      <nav class="navigation">
        <ul class="nav-ul">
          <li class="user-list">
            <div class="acc-info">
              <i class="fas fa-user-circle user-icon"></i>
              <a href="#" class="user"><?php korisničko_ime(); ?>  </a>
              
            </div>
            <ul>
              
              <li>
                <a href="favorite.php"
                  ><i class="fas fa-heart"> Favoriti</i></a
                >
              </li>
              <li>
                <a href="../backend/login/logout.php"><i class="fas fa-sign-out-alt"> Odjava</i></a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--Header End-->

   