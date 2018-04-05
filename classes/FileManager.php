<?php

class FileManager {
    
    const READONLY = 'r';
    const WRITE = 'w';

    private $path;
    public function __construct($path) {
        
          $this->path = $path;
        if(!$this->exists()){
            $this::createFile($this->path);
        } 
    }
    public function exists() {
        if(file_exists($this->path)){
            return TRUE;
        }
    }
    public function CSV2Array($delimiter = ',', $enclosure = '"') {
        $handle = fopen($this->path, 'r');
        $rows = [];
             while ($row = fgetcsv($handle, 0, $delimiter, $enclosure)){
//                echo $row[0]. '<br>';
                 $rows[] = $row;
          }
          return $rows;
    }
    public function array2CSV(array $rows, $delimiter = ',', $enclosure = '"') {
        $handle = fopen($this->path, 'w');
        foreach ($rows as $row) {
    fputcsv($handle, $row, $delimiter, $enclosure);
}

    }
    
    public function delete() {
        if(unlink($this->path)){
        $this->path = NULL;
        return TRUE;
        }
        return FALSE;
    }
  
    static public function getFiles($path, $extension) {
        $extString = (is_array($extension))? implode(',', $extension): $extension;
//        return glob($this->path. '*.{'.$extString.'}', GLOB_BRACE);
        $pattern = sprintf('%s*.{%s}', $path, $extString); //sprintf() doese save and prints.
        return glob($pattern, GLOB_BRACE);
        
//        glob('./path/*.{jpg, jpeg, png, gif}', GLOB_BRACE);// Curly brackets means or, or , or . we need to set it as GLOB_BRACE.
//        
        
//        return glob($this->path. '*.'.$extension);
        
    }
    
    
    public function openFile($mode) {
        return fopen($this->path, $mode);
    }
    
    static public function createFile($path) {
        $fop = fopen($path, FileManager::WRITE);
        fclose($fop);
    }
    
    static public function deleteFiles($folder, $ext) {
        $files = FileManager::getFiles($folder, $ext);
        foreach ($files as $file) {
            unlink($file);
        }
    }
}
