<?php

function getSum(...$numbers){
 $sum=0;
 foreach($numbers as $number){
  $sum+=$number;
 }
 return $sum;
}
function getOddNumbers($start,$end){
 // Return odd numbers between $start and $end:
 $index=0;
 $even_numbers=array();
 for($i=$start;$i<=$end;$i++){

  if($i % 2 !=0){
  $even_numbers[$index]=$i;
  $index++;
 }
}
return $even_numbers;
}
function getEvenNumbers($start,$end){
 // Return even numbers between $start and $end:
 $index=0;
 $even_numbers=array();
 for($i=$start;$i<=$end;$i++){

  if($i % 2 ==0){
  $even_numbers[$index]=$i;
  $index++;
 }
}
return $even_numbers;
}

// Classes:

class Point{
    protected $x =0;
    protected $y =0;
    
    public function __construct($x=0,$y=0){
        $this->x=$x;
        $this->y=$y;
    }
    
    public static function print_point($point){
        return "($point->x,$point->y)";
    }
    
    public static function sum_points(...$points){
        $sum = new Point();
        foreach($points as $point){
            $sum->x += $point->x;
            $sum->y += $point->y;
        }
        return $sum;
    }
}

?>