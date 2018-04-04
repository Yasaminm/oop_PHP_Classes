<?php

/**
 * Description of Katze
 *
 * @author PR06
 */
class Katze {
    
    private $weight = 1;
    private $age = 0;
    private $name ;
    
    
     public function __construct($name) {
         printf('Die Katze %s ist geboren.', $name);
        $this->name = $name;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
    public function getWeight(){
       return $this->weight;
    }
    public function eate($eatenum = 1){
//        $newWeight = $this->weight + $eatenum;
//        return $newWeight;
        $this->calculateWeight($eatenum);
    }
    public function walke($walkenum = 0.5){
//        $newWeight = $this->weight - $walkenum;
//        return $newWeight;
        $this->calculateWeight(-$walkenum);
    }
    public function run($runnum = 1){
//        $newWeight = $this->weight - $runnum;
//        return $newWeight;
        $this->calculateWeight(-$runnum);
    }
    public function age(){
      $this->addAge(1);
    }
    private function calculateWeight(float $kg){
        $this->weight += $kg;
    }
    private function addAge(int $agenum){
         $this->age += $agenum;
    }
}
