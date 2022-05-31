<?php
// echo md5("shivkumar")
// print(rand(100000000000,1000000000000))

// $string = 'shivkumar';
// echo preg_match('/[\'^£$%&*()}{@#~><>,|=_+¬-]/', $string);

// echo time();
$time=1650224142;
while (true) {
    // echo "\n";
    echo time();
    echo "\n";
    echo var_dump($time<time()-60);
    echo "\n";
    if ($time<time()-60) {
        echo "time limit ends";
        break;
    }
    
}
?>