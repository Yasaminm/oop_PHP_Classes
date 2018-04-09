<?php 
require_once './classes/Product.php';
require_once './classes/Katze.php';
require_once './classes/FileManager.php';
require_once './classes/ImgDim.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 01 BASIC</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <?php 
            $p1 = new Product();
            $p2 = new Product();
            
//            $p1->name = 'Tomaten'; //Setyen einer Eigenschaft
//            echo $p1->getPrice();
//            echo $p1->name;
            
//            $p2->name = 'Gurke';
//            echo $p2->name;
//          $p2->setPrice('22.30');
//          $p2Price = $p2->getPrice();
//            echo gettype($p2Price);
            
//            echo $p2->getSum(2);
            ?>
            
            <?php 
//            $animal1 = new Katze('mew');
//            $animal1->eate();
//            $animal1->eate();
//            $animal1->eate();
//            $animal1->run();
//            $animal1->walke();
//            $animal1->eate();
//            echo $animal1->getWeight() . ' Kg';
////            echo $animal1->getAge();
            ?>
            
               <?php 
//            $file = new FileManager('./import/cities.csv');
//            $check = $file->exists();
//            $data = $file->CSV2Array();
////            print_r($data);
////            $file->delete();
////            var_dump($file);
//            
//            $file1 = new FileManager('./export/cities.csv');
//            $file1->array2CSV($data, '|');
            ?>
            
            <?php 
//            $imagespath = new FileManager('');
////            $allFiles = $imagesphat->getFiles('./assets/originals/', jpg');
//            $allFiles = $imagespath->getFiles('./assets/originals/', ['jpg', 'jpeg', 'png']);
//            $files = FileManager::getFiles('./assets/originals/', ['jpg', 'jpeg', 'png', 'csv']);
//            
            ?>
            
            <?php 
//            $f = new FileManager('./assets/originals/cities.csv');
//            $handle = $f->openFile(FileManager::READONLY);
//            FileManager::createFile('./export/test2.txt');
            ?>
            
            <?php 
//            $f = new FileManager('./export/test6.txt');
//            FileManager::deleteFiles('./export/', 'txt')
            ?>
            <?php 
            
//            $img = new ImgDim();
//            $img->setSrcFolder('./image/src/');
//            $img->setSrcFileNamePattern('*');
//            $img->setSrcFileTypes(['jpg', 'jpeg', 'png']);
//            $img->setDstFolder('./image/dst/');
//            $img->setDstFileName(ImgDim::FILENAME_RANDOM, 'thm_');
//            $img->setDstDimensions(ImgDim::DIMENSION_AUTO, 100);
//            $img->setDstCompressionLevel(100);
//            $img->excute();
//            
            
            $img = new ImgDim('./images/src/', './images/dst/', '*', ['jpg', 'jpeg', 'png']);
//            $img->setSrcFolder('./images/src/');
//            $img->setSrcFileNamePattern('*');
//            $img->setSrcFileTypes(['jpg', 'jpeg', 'png']);
//            $img->setDstFolder('./images/dst/');
            $img->setDstFileName(ImgDim::FILENAME_NUM, 'thmb_');
            $img->setDstDimensions(200, 100);
//            $img->setDstCompressionLevel(100);
            $cons = $img->excute();
            ?>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
        
            
        </div>
        <pre>
<?php
var_dump($cons);
?>
        </pre>
        
    </body>
</html>
