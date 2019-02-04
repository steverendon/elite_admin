<?php

if(isset($_GET['view']))
{
    if(file_exists('core/controllers/' . $_GET['view'] . 'Controller.php'))
    {
        require_once 'core/controllers/' . $_GET['view'] . 'Controller.php';
    }
    else
    {
        require_once 'core/controllers/errorController.php';
    }
}
else
{
    session_start();
    if(isset($_SESSION['id']))
    {
        require_once 'core/controllers/solicitudesController.php';
    }
    else
    {
        session_destroy();
        require_once 'core/controllers/indexController.php';
    }
}

?>
