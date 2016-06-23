<?
    require('settings.php');
    require('routines.php');

    $patchedName=strtolower(trim(@$_REQUEST['repo']));

    if (strlen(@$_REQUEST['passwords'])>5){
        file_put_contents(REPOS_DIR.'/'.$patchedName.'/conf/passwd',@$_REQUEST['passwords']);
        header('Location: index.php');
    }


    $pass=file_get_contents(REPOS_DIR.'/'.$patchedName.'/conf/passwd');

    

?>
<html>
    <head></head>
    <body>
        <a href="index.php">back</a> &nbsp;&nbsp;&nbsp;&nbsp; Updating <?=$patchedName?> access file.... <br>
        <form method="post">
            <textarea style="width: 700px; height: 400px;" name="passwords"><?=htmlspecialchars($pass)?></textarea><br>
            <input type="submit" value="update">
        </form>
    </body>
</html>