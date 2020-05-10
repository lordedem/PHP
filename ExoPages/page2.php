<form method="post" action="">
<p>
    Entrez votre age: <input type="int" name="age"/>
    <input type="submit" value="ENVOYER" />
</p>
<?php 
if (isset($_POST['ENVOYER']))
{
echo $_POST['age'];
}
else {
    $message = '';
}
?>
</form>
 