<?php 
require_once './classes/Product.php';
require_once './classes/Katze.php';
require_once './classes/FileManager.php';

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
            $file = new FileManager('./import/cities.csv');
            $check = $file->exists();
            $data = $file->CSV2Array();
//            print_r($data);
//            $file->delete();
//            var_dump($file);
            
            $file1 = new FileManager('./export/cities.csv');
            $file1->array2CSV($data, '|');
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
?>
        </pre>
        
    </body>
</html>