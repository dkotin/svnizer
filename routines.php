<?

    function fetchRepoList(){
        $repos=array();
        $dir=@opendir(REPOS_DIR);
        if(!($dir)) die('Invalid Repositories Directory');
        while($file=readdir($dir)){  
            if( $file!='.' && $file!='..' && is_dir(REPOS_DIR.'/'.$file) ){
                $repos[]=$file;
            }
        }
        return $repos;
    }


?>