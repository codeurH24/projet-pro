<?php
$query = "SELECT COUNT(*) FROM composant WHERE `id_cat` = $id_categorie";
if (!$mysqli->query($query)) {
  exit("Erreur creation composant.<br />$query<br />". mysqli_error($mysqli));
}
if ($result = $mysqli->query($query)) {
    $numberOfProcessors = $result->fetch_all(MYSQLI_NUM)[0][0];
    $result->free();
}

$numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

 ?><div class="row">
  <div class="col-4 ml-auto mr-auto">
    <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="/<?= $page ?>-1.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php for($i=1; $i< $numberSplits+1; $i++  ) { ?>
    <li class="page-item"><a class="page-link" href="/<?= $page ?>-<?= $i ?>.php"><?= $i ?></a></li>
    <?php } ?>
    <li class="page-item">
      <a class="page-link" href="/<?= $page ?>-<?= $numberSplits ?>.php" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
  </div>
</div>
