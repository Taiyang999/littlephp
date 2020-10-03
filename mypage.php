<!DOCTYPE html>
<html lang="fr">
<body>

<h1>My page</h1>

<?php

require "db.php";

function getVisitTimes()
{
    $statement = "SELECT visit FROM count_table";
    $db = database::getSharedInstance();
    return $db->select($statement, []);
}

echo "Visited times : ".getVisitTimes()

?>
</body>
</html>
