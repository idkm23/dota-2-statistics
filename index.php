<?php
//echo phpinfo();
/**
 * Simple example of extending the SQLite3 class and changing the __construct
 * parameters, then using the open method to initialize the DB.
 */
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('main.db');
    }
}

$db = new MyDB();

$result = $db->query('SELECT skypename FROM Accounts WHERE id=1');
echo $result->fetchArray()["skypename"];

?>