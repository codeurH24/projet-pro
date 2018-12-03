<div class="identity">
  <div class="endOfidentity"></div>
  <p>Compte de
  <?php
    if( isset($_SESSION['user']) ){
      echo $_SESSION['user']['pseudo']."<br />";
    }
  ?>
  </p>
</div>
