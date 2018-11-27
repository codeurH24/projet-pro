<?php

/*************************
*    GIT RESET HARD      *
*************************/

$out = shell_exec ("git reset --hard origin/master");
echo nl2br($out)."<br />";



 ?>
