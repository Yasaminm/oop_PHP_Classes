<?php

class FileManager {
    
    private $path;
    public function __construct($path) {
        $this->path = $path;
    }
    public function exists() {
        if(file_exists($this->path)){
            return TRUE;
        }else{
            echo 'The file doese not exists.';
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
//        if(unlink($this->path)){
        $this->path = NULL;
//        return TRUE;
//        }
//        return FALSE;
    }
    
}
