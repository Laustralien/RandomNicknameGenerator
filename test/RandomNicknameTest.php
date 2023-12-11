<?php
require_once ('../src/RandomNickname.php');

echo RandomNickname::generateNickFrom('fr', ['animals', 'adjectives', RandomNickname::RANDOM_INT_VALUE],"-");
echo PHP_EOL;

for ($i = 0; $i < 10; $i++) {
    echo RandomNickname::generateNickFrom('fr');
    echo PHP_EOL;
}

try {
    echo RandomNickname::generateNickFrom();
}catch (Exception $e){
    echo $e->getMessage();
}
echo PHP_EOL;
