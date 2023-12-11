<?php
class RandomNickname
{
    const RANDOM_INT_VALUE = "RANDOM";

    public static function generateNickFrom(
        string $lang = 'en',
        array $selectedData = ['animals', 'adjectives', self::RANDOM_INT_VALUE],
        string $separator ="")
    {
        if (!file_exists('../dictionnaries/' . $lang . '/all.php')){
            throw new Exception("Files for lang does not exist ");
        }

        if (!is_array($data = include ('../dictionnaries/' . $lang . '/all.php'))){
            throw new Exception("Files for lang does not exist ");
        }

        $feminineOrMale = array_rand(['M' => 0, 'F' => 1]);

        $randomName = '';
        foreach ($selectedData as $idx => $arrayOfData) {
            if (!array_key_exists($arrayOfData, $data) && $arrayOfData != self::RANDOM_INT_VALUE) {
                throw new Exception('Dictionnary does not exist');
            }

            if ($arrayOfData == self::RANDOM_INT_VALUE) {
                $randomName .= rand(10, 9999);
            } else {
                $part = $data[$arrayOfData][$feminineOrMale];
                $randomName .= ucfirst($part[array_rand($part)]);
            }
            if ($idx < count($selectedData) -1){
                $randomName .= $separator;
            }
        }
        return $randomName;
    }
}