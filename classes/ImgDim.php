<?php

class ImgDim {
    
    const FILENAME_ORIGIN = 1;
    const FILENAME_RANDOM = 2;
    const FILENAME_NUM = 3;
    const DIMENSION_AUTO = 0;
    private $srcPath = '';
    private $dstPath = '';
    private $srcFileName = '*';
    private $srcFileTypes = [];
    private $dstFileNameType = self::FILENAME_ORIGIN;
    private $dstFileNamePrefix;
    private $dstFileWidth;
    private $dstFileHeight;
    private $dstCompressionLevel;

//$srcPath, $dstPath, $srcFileName, $extension
    public function __construct(string $srcPath = ' ', string $dstPath = ' ', string $srcName = '*', array $srcFileTypes = [ ]) {
        $this->setSrcFolder($srcPath);
        $this->setDstFolder($dstPath);
        $this->setSrcFileNamePattern($srcName);
        $this->setSrcFileTypes($srcFileTypes);
    }
    
    public function setSrcFolder(string $srcPath) {
        $this->srcPath = $srcPath;
    }
    
    public function setSrcFileNamePattern(string $srcName) {
        $this->srcFileName = $srcName;
    }
    
    public function setSrcFileTypes(array $filetypes) {
//        $srcFileName = $this->srcFileTypes = $filetypes;
        $this->srcFileTypes = (is_array($filetypes)) ? implode(',', $filetypes): $filetypes;
//        return $fileName;
    }
    
    public function setDstFolder(string $dstPath) {
        $this->dstPath = $dstPath;
    }
    public function setDstFileName(int $type, string $prefix = '') {
        $this->dstFileNameType = $type;
        $this->dstFileNamePrefix = $prefix;
    }
    public function setDstDimensions(int $width , int $height) {
        $this->dstFileWidth = $width;
        $this->dstFileHeight = $height;
    }
    public function setDstCompressionLevel(int $level) {
        $this->dstCompressionLevel = ($level >= 0 && $level <= 100) ? $level: 75;
    }
    public function create($param) {
        
        
    }
    public function find() {
        
      $path = sprintf('%s%s.{%s}',$this->srcPath,$this->srcFileName,$this->srcFileTypes );
        return glob($path, GLOB_BRACE);
    }
    
}
 