
  <?php include ('./tags/header/top-header.php') ?>

    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/favorite.css" />

    <?php include ('./tags/header/bottom-header.php') ?>
    <?php include ("funkcije.inc.php"); ?>
    
      <?php 
      $idsDB = array();
      array_push($idsDB,provjeri_id($konekcija));
      
      
    ?>
    
    
   

    <section  >
      
    <div class="container">
       
        <h2 class="head-2" id="fav-h">Vaši recepti</h2>
        
      </div>
    </section>

    <footer>
      Copyright &copy; 2020 Ivana Đukić
      
    </footer>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    

    <script src="../scripts/view.js"></script>
    <script src="../scripts/model.js"></script>
    <script src="../scripts/controller.js"></script>
    

    <script type="text/javascript" >
    


      const arrayFromPHP = (<?php echo json_encode($idsDB); ?>)[0].split(",");
       arrayFromPHP.forEach(id => {Ctrl.updateFavorite(id)});
       


       document.addEventListener("click", e=> {

            if(e.target.id === 'posterInfo'){
              
              const arrayFromPHP = (<?php echo json_encode($idsDB); ?>)[0].split(",");
          
              Ctrl.cardInfo(arrayFromPHP);

            }else if (e.target.classList.contains("unliked")) {

              //add liked class and update db
              e.target.classList = "liked";
              let infoID = View.loadinfoID();
            
              $.ajax({
                url:'receptId.php',
                method:'post',
                data:{favId:infoID},
                success: function(data){
                  console.log(data);
                }          
              });

              
            }else if (e.target.classList.contains("liked")) {
              //add unliked class and update db
              e.target.classList = "unliked";
              const infoID = View.loadinfoID();

             

              $.ajax({
                url:'delete.php',
                method:'post',
                data:{favId:infoID},
                success: function(data){
                  console.log(data);
                }          
              });

              document.location.reload(true);
          
        }
});

      
      
    </script>
   
  </body>
</html>


