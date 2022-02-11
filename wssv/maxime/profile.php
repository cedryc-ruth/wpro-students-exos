<?php

    require '../util/header.php';

    $isConnected = !empty($_SESSION['id']);

    //Secure access to page
    if(!$isConnected){
        header('Location: ../../index.php');
        header('Status: 401 Unauthorized');
        exit();
    }
        
    // Arrays of data used in select in forms
    require '../util/data.php';

    // set up flags
    $isProfile = isset($_SESSION['profile']);
    $isModify = isset($_GET['modify']);

    // decode profile if profile is not null -> only null after account creation
    if($isProfile) {
        $profile = json_decode($_SESSION['profile'], true);
    }

    // all data from the profile  --- is set to empty string if $_SESSION['profile'] is null => $profile doesn't exist
    $discord = $profile["Discord"] ?? "";
    $steamId = $profile['Steam']['id'] ?? "";
    $steamName = $profile['Steam']['name'] ?? "";
    $savedRegion = $profile['Region'] ?? "";
    $birth = $profile['Birth'] ?? "";
    $gender = $profile['Gender'] ?? "";
    $hours = $profile['Hours'] ?? "";
    $savedLanguages = [$profile['Languages'][0] ?? "", $profile['Languages'][1] ?? "", $profile['Languages'][2] ?? ""];
    $savedWeapons = [$profile['Weapons'][0] ?? "", $profile['Weapons'][1] ?? "", $profile['Weapons'][2] ?? ""];
    $savedRoles = [$profile['Roles'][0] ?? "", $profile['Roles'][1] ?? "", $profile['Roles'][2] ?? ""];
    $savedDays = [
        "Monday" => [
            "start" => $profile['Schedule']['Monday']['start'] ?? "",
            "end" => $profile['Schedule']['Monday']['end'] ?? ""
        ],
        "Tuesday" => [
            "start" => $profile['Schedule']['Tuesday']['start'] ?? "",
            "end" => $profile['Schedule']['Tuesday']['end'] ?? ""
        ],
        "Wednesday" => [
            "start" => $profile['Schedule']['Wednesday']['start'] ?? "",
            "end" => $profile['Schedule']['Wednesday']['end'] ?? ""
        ],
        "Thursday" => [
            "start" => $profile['Schedule']['Thursday']['start'] ?? "",
            "end" => $profile['Schedule']['Thursday']['end'] ?? ""
        ],
        "Friday" => [
            "start" => $profile['Schedule']['Friday']['start'] ?? "",
            "end" => $profile['Schedule']['Friday']['end'] ?? ""
        ],
        "Saturday" => [
            "start" => $profile['Schedule']['Saturday']['start'] ?? "",
            "end" => $profile['Schedule']['Saturday']['end'] ?? ""
        ],
        "Sunday" => [
            "start" => $profile['Schedule']['Sunday']['start'] ?? "",
            "end" => $profile['Schedule']['Sunday']['end'] ?? ""
        ]
    ];
    $savedGroups = array($profile['Group'][0] ?? "", $profile['Group'][1] ?? "", $profile['Group'][2] ?? "");

    // if profile has to be created OR modified
    if(!$isProfile || $isModify){
        // Include select builder function
        $select_function = require 'select_creation.func.php';
        
        // Display profile's form create or edit
        require 'profile_create-edit.inc.php';
    } else {
        // Display profile
        require 'profile_show.inc.php';
    }

    require '../util/footer.php';
?>
