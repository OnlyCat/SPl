<?php
  $path ='d:\\';
  $directoryIterator = new RecursiveDirectoryIterator($path);
  $recursiveIterator = new RecursiveIteratorIterator($directoryIterator,RecursiveIteratorIterator::SELF_FIRST);
 foreach($recursiveIterator as $file){
    echo str_repeat("\t",$recursiveIterator->getDepth());
    if($file->getBaseName() == '.' || $file->getBaseName() == '..'){
        continue;
    }
    //fileΪsplFileInfo�����ĵ���ַ��
    //http://php.net/manual/en/class.splfileinfo.php

    if($file->isFile()){
        //print_r($file->getPath());
        echo $file->getBaseName() . "." .$file->getExtension(); 
    }else if($file->isLink()){
        echo "(symlink)";
    }elseif($file->isDir()){
        echo DIRECTORY_SEPARATOR . $file->getBaseName();
    }
    
    echo PHP_EOL;


}