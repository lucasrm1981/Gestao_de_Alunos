<?php

// Apaga todos os residuos de sessões criadas
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);

//redireciona para o index e adiciona via GET o texto Logout_Efetuado
echo "<script>";
echo "location.href='index.php?Logout_Efetuado'";
echo "</script>"
?>

