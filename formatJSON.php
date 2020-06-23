<?php

$data = file_get_contents('./api/car/test.json');
$array = json_decode($data, true);
$arraypush = array();

$id = 0;

// COURSE DATA

// $data2 = file_get_contents('./api/course/test.json');
// $course = json_decode($data2, true);
// function course($course)
// {
//     $courseArray = array_rand($course, 1);
//     return $courseArray;
// }
// function randomNumber()
// {
//     $number = rand(10000, 99999);
//     return $number;
// }
// function department($dep)
// {
//     $data = str_split($dep);
//     if ($data[0] == 'B') {
//         return 'Undergraduate';
//     } elseif ($data[0] == 'M') {
//         return 'Postgraduate';
//     } else {
//         return 'Diploma';
//     }
// }
// function abr($abr)
// {
//     $data = str_split($abr);
//     if ($data[0] == 'B') {
//         return 'UG';
//     } elseif ($data[0] == 'M') {
//         return 'PG';
//     } else {
//         return 'Diploma';
//     }
// }
// $empArray = array();
// for ($i = 0; $i < 5154; $i++) {
//     $functionData = course($course);
//     $courseid = "CRS" . "-" . randomNumber();
//     if (in_array($courseid, $empArray)) {
//         continue;
//     } else {
//         $id++;
//         $newArray = array(
//             "id" => $id,
//             "course_id" => $courseid,
//             "course_abr" => $course[$functionData]['abr'],
//             "course_name" => $course[$functionData]['course'],
//             "department_abr" => abr($course[$functionData]['abr']),
//             "department_name" => department($course[$functionData]['abr'])
//         );
//         array_push($empArray, $courseid);
//         array_push($arraypush, $newArray);
//     }
// }

// EMPLOYEE DATA
$empArray = array();
for ($i = 0; $i < count($array); $i++) {
    if (in_array($array[$i]['car_id'], $empArray)) {
        continue;
    } else {
        $id++;
        $newArray = array(
            "id" => $id,
            "car_id" => $array[$i]['car_id'],
            "car_name" => $array[$i]['car_name'],
            "car_maker" => $array[$i]['car_maker'],
            "car_color" => $array[$i]['car_color'],
            "production_year" => $array[$i]['production_year']
        );
        array_push($empArray, $array[$i]['car_id']);
        array_push($arraypush, $newArray);
    }
}

// USER DATA
// $data2 = file_get_contents('./api/user/image.json');
// $image = json_decode($data2, true);
// $female = json_decode(file_get_contents('./api/user/female.json'), true);
// $male = json_decode(file_get_contents('./api/user/men.json'), true);

// // function image($image)
// // {
// //     $male = array();
// //     for ($i = 0; $i < count($image); $i++) {
// //         if ($image[$i]['gender'] == 'Male') {
// //             continue;
// //         }
// //         array_push($male, $image[$i]['image']);
// //     }
// //     return $male;
// // }

// // echo json_encode(image($image));

// function imageUrl($gender, $female, $male)
// {
//     if ($gender == 'Female') {
//         $index = array_rand($female, 1);
//         return $female[$index];
//     } elseif ($gender == 'Male') {
//         $index = array_rand($male, 1);
//         return $male[$index];
//     }
// }

// for ($i = 0; $i < count($array); $i++) {
//     $date = $array[$i]['dob'];
//     $explode = explode("-", $date);
//     $age = 2020 - $explode[0];

//     $id++;
//     $newArray = array(
//         "id" => $id,
//         "firstname" => htmlentities($array[$i]['firstname']),
//         "lastname" => htmlentities($array[$i]['lastname']),
//         "username" => htmlentities($array[$i]['username']),
//         "password" => htmlentities($array[$i]['password']),
//         "email" => htmlentities($array[$i]['email']),
//         "phone" => $array[$i]['phone'],
//         "gender" => $array[$i]['gender'],
//         "dob" => $array[$i]['dob'],
//         "age" => $age,
//         "image" => imageUrl($array[$i]['gender'], $female, $male),
//         "street" => htmlentities($array[$i]['street']),
//         "city" => htmlentities($array[$i]['city']),
//         "state" => htmlentities($array[$i]['state']),
//         "country" => htmlentities($array[$i]['country']),
//         "postcode" => htmlentities($array[$i]['postcode']),
//         "ip_address" => $array[$i]['ip_address']
//     );
//     array_push($arraypush, $newArray);
// }

echo json_encode($arraypush, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
