<?php

$fields = [
    'age' => 8    
];

$access_level = match(true) {
            $fields['age'] >= 7 && $fields['age'] < 15 => "He is a baby",
            $fields['age'] >= 15 && $fields['age'] <= 24 => Access_Level::where('age', "15 to 24")->first(),

            $fields['age'] >= 25 && $fields['age'] <= 49  => Access_Level::where('age', "25 to 49")->first(),

            $fields['age'] >= 50 => Access_Level::where('age', "50 and above")->first(),
};

echo $access_level;