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
    
    private function generateDstFileName($nameType, $namePrefix = ' ', $srcPath = ' ', $index = ' ') {
        $n = ' ';
        switch ($nameType) {
            case 1://original name
                $n = $namePrefix.pathinfo($srcPath)['filename'];

                break;
            case 2: //Random
                $n = ImgDim::getRandName($namePrefix);

                break;

            case 3://index/Zahl
                $n = $namePrefix.$index;

                break;
            default:
                $n = $namePrefix.pathinfo($srcPath)['filename'];
        }
        return $n;
    }
    public function setDstFileName(int $type, string $prefix = '') {
        $this->dstFileNameType = $type;
        $this->dstFileNamePrefix = $prefix;
    }
    public function setDstDimensions(int $width = 0 , int $height = 0) {
        $this->dstFileWidth = $width;
        $this->dstFileHeight = $height;
    }
    private function calcDstDimensions(int $w, int $h, string $path) {
        $info = getimagesize($path);//Breite: $info[0] Höhe: $info[1]
        if($w > 0 && $h > 0){
        $this->dstFileWidth = $w;
        $this->dstFileHeight = $h;
        }elseif ($w === 0 && $h === 0 ) {
            $this->dstFileWidth = $info[0];
            $this->dstFileHeight = $info[1];
        }elseif($w > 0 && $h === 0){
            $this->dstFileWidth = $w;
            $this->dstFileHeight = $this->calcDimension($info[0], $info[1], $w);
        } else {
            $this->dstFileWidth = $this->calcDimension($info[1], $info[0], $h);
            $this->dstFileHeight = $h;
        }
    }
    private function calcDimension($x1,$y1,$x2){
    $y2 = $y1 * $x2 / $x1;
    return $y2;
}

    public function setDstCompressionLevel(int $level) {
        $this->dstCompressionLevel = ($level >= 0 && $level <= 100) ? $level: 75;
    }
    
    private function getRandName($prefix = ''){
   
    return str_replace('.','_',uniqid($prefix, true));
}

    public function excute() {
        
        $srcPaths = $this->find();
        foreach ($srcPaths as $index => $srcPath) {
            $srcType = $this->getImageFileType($srcPath);
//            echo $srcType . '<br>';
            $this->calcDstDimensions($this->dstFileWidth, $this->dstFileHeight, $srcPath);
            $this->generateDstFileName($this->dstFileNameType, $this->dstFileNamePrefix, $srcPath, $index);
        }
    }
    public function find() {
        
      $path = sprintf('%s%s.{%s}',$this->srcPath,$this->srcFileName,$this->srcFileTypes );
        return glob($path, GLOB_BRACE);
    }
    
    private function getImageFileType($path) {
    $types = ['', 'gif', 'jpeg', 'png'];
    $type = getimagesize($path)[2];
    if ($type > 0 && $type < 4) {
        return $types[$type];
    }
    return false;
}
    
}
 