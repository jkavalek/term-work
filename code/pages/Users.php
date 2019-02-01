<h1>Users</h1>
<?php

include(dirname(__DIR__).'/db/UserRepository.php');
include(dirname(__DIR__).'/db/Connection.php');
include(dirname(__DIR__).'/db/DataTable.php');

    echo "<h2>All users</h2>";
    $userDao = new UserRepository(Connection::getPdoInstance());
    $allUsersResult = $userDao->getAllUsers();

    $datatable = new DataTable($allUsersResult);
    $datatable->addColumn("id", "ID");
    $datatable->addColumn("username", "Uživatelský jméno");
    $datatable->addColumn("email", "E-mail");
    $datatable->addColumn("create_time", "Vytvořeno");
    $datatable->addColumn("admin", "admin");
    $datatable->render();

?>