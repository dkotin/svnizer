<?
    require('settings.php');
    require('routines.php');

    
    $repos=fetchRepoList();
    
?>
<html>
    <head>
        <script src="jquery.js"></script>
        <script src="loadHTML.js"></script>
    </head>
    <body>
        Available repos:<br>
        <?if(is_array($repos) && count($repos)): foreach($repos as $repo):?>
            <a href="passwords.php?repo=<?=$repo?>"><?=$repo?></a>
            
            <br>
        <?endforeach; endif;?>
        <br><br><br>
        <form onSubmit="createRepo(); return false;">
            <input type="text" name="repo" id="reponame">
            <input type="submit" name="submit" value="create">
            <br>
            Repository can't be renamed or deleted. Doublecheck what you are typing! Don't use any special characters. Keep it simple.<br>

        </form>
        <div id="formError"></div>
        <script>
            function createRepo(){
                $('#formError').html( loadHTMLPOST('create.php','repo='+$('#reponame').val()) )	;
            }
        </script>
    </body>
</html>