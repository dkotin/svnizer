<?
    require('settings.php');
    require('routines.php');

    
    $repos=fetchRepoList();
    

    $patchedName=strtolower(trim(@$_REQUEST['repo']));


    if (strlen($patchedName)<1) die ('empty name');
    if (in_array($patchedName,$repos)) die('name already exists');
    
    $result=exec('cd '.REPOS_DIR.'; svnadmin create '.$patchedName.' --config-dir /etc/subversion 2>&1');
    $result.="\n";
    $result.=exec('cd '.REPOS_DIR.'; chmod -R 777 '.$patchedName.'/ 2>&1');
    echo(nl2br($result));
    if(strlen($result)<2){
        unlink(REPOS_DIR.'/'.$patchedName.'/conf/svnserve.conf');
        copy(dirname(__FILE__).'/svnsettings/svnserve.conf',REPOS_DIR.'/'.$patchedName.'/conf/svnserve.conf');
        echo("<script>location.reload();</script>");
    }

?>
