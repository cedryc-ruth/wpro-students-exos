<?php

    require '../util/header.php';

    isset($_SESSION['id']) ? $isConnected = true : $isConnected = false;


    if($isConnected){

        // Arrays of data used in select in forms
        require '../util/data.php';

        // set up flags
        isset($_SESSION['profile']) ? $isProfile = true : $isProfile = false;
        isset($_GET['modify']) ? $isModify = true : $isModify = false;

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

            /**
             * creation of different selects and their options
             *
             * @param string $nameSelect Which select has to be created, used to name the select
             * @param array $dataArray arrays containing the options
             * @param array $profileArray contains saved option from profile or empty string
             *                            if no option saved in case of profile creation
             */
            function select_creation(string $nameSelect, array $dataArray, array $profileArray) : void {
                for ($i=1; $i<4;$i++){
                    echo "<br><br>
                          <i>$i</i>
                          <select name='$nameSelect" . "_" . "$i'>";

                    if (!empty($profileArray[$i-1])) { // profile modification
                        echo "<option value={$profileArray[$i-1]}>Saved as : {$profileArray[$i-1]}</option>";
                    } else { // profile creation
                        if ($nameSelect == "language" && $i ==1) { // To have 1 language by default -> can't leave it as /
                            echo "";
                        } else if ($nameSelect == "region" && $i == 1) { // Just looks better but can't be that value
                            echo "<option hidden value='/'>Select</option>";
                        } else { // in all others cases
                            echo "<option value='/'>Select</option>";
                        }
                    }

                    for ($j = 0; $j < sizeof($dataArray); $j++){
                        echo "<option value=$dataArray[$j]>$dataArray[$j]</option>";
                    }
                    echo "</select>
                          <i class='profile_error' id='$nameSelect" . '_' . $i . "_error'></i>";
                }
            }

            // Page H1 display
            if (!$isProfile) { ?>
                <h1>Profile creation</h1>
            <?php } else if ($isModify) { ?>
                <h1>Profile modification</h1>
            <?php } ?>

            <form action="../scripts/profile.script.php" method="post" onsubmit="return dataCheck(this)">
                <!-- DISCORD -->
                <label>
                    <b>Discord username : </b>
                    <br>
                    This will be used as your name here
                    <input name="discord" type="text" autocomplete="off" required value="<?= $discord ?>" placeholder="<?= $discord ?>">
                    <i class="profile_error" id="discord_error"></i>
                </label>
                <hr>
                <!-- STEAM INFOS -->
                <label>
                    <b>Steam id :</b>
                    <input name="steam_id" type="number" autocomplete="off" required value="<?= $steamId ?>" placeholder="<?= $steamId ?>">
                    <i class="profile_error" id="steam_id_error"></i>
                </label>
                <hr>
                <label>
                    <b>Steam name :</b>
                    <input name="steam_name" type="text" autocomplete="off" required value="<?= $steamName ?>" placeholder="<?= $steamName ?>">
                    <i class="profile_error" id="steam_name_error"></i>
                </label>
                <hr>
                <!-- Region -->
                <label>
                    <b>Region :</b>
                    <select name="region">
                        <?php
                            if(!empty($savedRegion)) { ?>
                                <option value='<?= $savedRegion ?>'>Saved as : <?= $savedRegion ?></option>
                        <?php
                            }

                            for ($i = 0; $i < sizeof($regions); $i++){
                        ?>
                               <option value="<?= $regions[$i] ?>"><?= $regions[$i] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <i class="profile_error" id="region_error"></i>
                </label>
                <hr>
                <!-- Birth -->
                <label>
                    <b>Birth year :</b>
                    <input name="birth" type="number" autocomplete="off" required value="<?= $birth ?>" placeholder="<?= $birth ?>">
                    <i class="profile_error" id="birth_error"></i>
                </label>
                <hr>
                <!-- Gender -->
                <label>
                    <b>Gender :</b>
                    <select name="gender">
                        <?php if(!empty($gender)) { ?>
                            <option value='<?= $gender ?>'><?= $gender ?></option>
                        <?php } ?>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        <option value="/">Do not wish to say</option>
                    </select>
                    <i class="profile_error" id="gender_error"></i>
                </label>
                <hr>
                <!-- HOURS -->
                <label>
                    <b>Number of hours played :</b>
                    <input name="hours" type="number" autocomplete="off" required value="<?= $hours ?>" placeholder="<?= $hours ?>">
                    <i class="profile_error" id="hours_error"></i>
                </label>
                <hr>
                <!-- LANGUAGES -->
                <label>
                    <b>Main languages from your best to your worst : </b>
                    <br><br>
                    <i>English by default.</i>
                    <?php select_creation("language", $languages, $savedLanguages) ?>
                </label>
                <hr>
                <!-- WEAPONS -->
                <label>
                    <b>Top mastered weapons from your best to your worst : [ not required ]</b>
                    <?php select_creation("weapon", $weapons, $savedWeapons) ?>
                </label>
                <hr>
                <!-- ROLES -->
                <label>
                    <b>In-game roles you'd like to play as : [ not required ]</b>
                    <?php select_creation("role", $roles, $savedRoles); ?>
                </label>
                <hr>
                <!-- SCHEDULE -->
                <label>
                    <b>Availability, 24h format : [ not required ]</b>
                    <?php
                    for ($i= 0; $i<sizeof($days);$i++){ ?>
                        <br><br>
                        <i><?=$days[$i]?>, from </i>
                        <select name=start_<?=$days[$i]?>>
                            <?php if (!empty($savedDays[$i]['start'])) { ?>
                                    <option value='<?= $savedDays[$i]['start'] ?>'>Saved as : <?= $savedDays[$i]['start'] ?></option>
                            <?php } else { ?>
                                    <option value='/'>Select</option>
                            <?php
                                  }

                                  for ($j = 0; $j<24;$j++){ ?>
                                    <option value=<?=$j?>><?=$j?></option>
                            <?php } ?>
                        </select>
                        <i> until </i>
                        <select name=end_<?=$days[$i]?>>
                            <?php if (!empty($savedDays[$i]['end'])) { ?>
                                <option value='<?=$savedDays[$i]['end'] ?>'>Saved as : <?= $savedDays[$i]['end'] ?></option>
                            <?php } else { ?>
                                <option value='/'>Select</option>
                            <?php
                                  }

                                  for ($j = 0; $j<24;$j++){ ?>
                                    <option value=<?=$j?>><?=$j?></option>
                            <?php } ?>
                        </select>
                        <i class="profile_error" id="<?= lcfirst($days[$i]) ?>_error"></i>
                    <?php } ?>
                </label>
                <hr>
                <!-- GROUP -->
                <label>
                    <b>Group size preferences or used to play as [ not required ]</b>
                    <?php select_creation("group", $groups, $savedGroups) ?>
                </label>
                <button name="profile-submit" type="submit">Save</button>
            </form>

            <script>

                const DISCORD_MSG = document.getElementById("discord_error"),
                        STEAM_ID_MSG = document.getElementById("steam_id_error"),
                        STEAM_NAME_MSG = document.getElementById("steam_name_error"),
                        REGION_MSG = document.getElementById("region_error"),
                        BIRTH_MSG = document.getElementById("birth_error"),
                        GENDER_MSG = document.getElementById("gender_error"),
                        HOURS_MSG = document.getElementById("hours_error"),
                        LAN_1_MSG = document.getElementById("language_1_error"),
                        LAN_2_MSG = document.getElementById("language_2_error"),
                        LAN_3_MSG = document.getElementById("language_3_error"),
                        WEA_1_MSG = document.getElementById("weapon_1_error"),
                        WEA_2_MSG = document.getElementById("weapon_2_error"),
                        WEA_3_MSG = document.getElementById("weapon_3_error"),
                        RO_1_MSG = document.getElementById("role_1_error"),
                        RO_2_MSG = document.getElementById("role_2_error"),
                        RO_3_MSG = document.getElementById("role_3_error"),
                        MONDAY_MSG = document.getElementById("monday_error"),
                        TUESDAY_MSG = document.getElementById("tuesday_error"),
                        WEDNESDAY_MSG = document.getElementById("wednesday_error"),
                        THURSDAY_MSG = document.getElementById("thursday_error"),
                        FRIDAY_MSG = document.getElementById("friday_error"),
                        SATURDAY_MSG = document.getElementById("saturday_error"),
                        SUNDAY_MSG = document.getElementById("sunday_error"),
                        GR_1_MSG = document.getElementById("group_1_error"),
                        GR_2_MSG = document.getElementById("group_2_error"),
                        GR_3_MSG = document.getElementById("group_3_error"),
                            // masks arrays
                        GENDER = ["Male", "Female", "Other", "/"],
                        DAYS = ["/", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23"],
                        WEAPONS = ["/", "Bow", "Crossbow", "Nail gun", "Revolver", "Semi-automatic pistol", "Python revolver",
                            "Thompson", "Semi-automatic rifle", "Custom SMG", "MP5A4", "Assault rifle", "Bolt action rifle",
                            "M92 pistol", "LR-300 assault rifle", "M39 rifle", "L96 sniper", "M249"],
                        REGIONS = ["/", "North America", "South America", "EU West", "EU East", "Africa", "Russia", "Asia", "Australia"],
                        LANGUAGES = ["/", "English", "French", "Chinese", "Spanish", "German", "Dutch"],
                        ROLES = ["/", "Builder", "Farmer", "Pvper", "Electrician", "Slave"],
                        GROUPS = ["/", "Solo", "Duo", "Trio", "Quad", "Group 5-8", "Zerg"];

                /**
                 * Function checking form data
                 *
                 * @param form The form which data needs to be checked from
                 * @returns {boolean} returns whether or not the form can be send to server
                 */
                function dataCheck(form){

                    /*
                        Discord input validation
                    */
                    let discord = form.discord.value, isDiscord = false;
                    if (!lengthValidation(discord, 2, 32)) {
                        DISCORD_MSG.innerText = "Discord username must be between 2 and 32 characters long";
                    } else {
                        isDiscord = true;
                        DISCORD_MSG.innerText = "";
                        form.discord.style.border = "initial";
                    }

                    if (!isDiscord) form.discord.style.border = "2px solid red";

                    /*
                        Steam ID validation
                    */
                    let steamId = form.steam_id.value, isSteamId = false;
                    if (!lengthValidation(steamId, 17, 17)) {
                        STEAM_ID_MSG.innerText = "Your steam ID must be 17 characters long";
                    } else if (!typeValidation(steamId, "number")) {
                        STEAM_ID_MSG.innerText = "Your steam ID must be a number";
                    } else if (!isNumberPositive(steamId)) {
                        STEAM_ID_MSG.innerText = "Your steam ID can't be negative";
                    } else if (!isNumberInteger(steamId)) {
                        STEAM_ID_MSG.innerText = "Your steam ID can't be a decimal number";
                    } else {
                        isSteamId = true;
                        STEAM_ID_MSG.innerText = "";
                        form.steam_id.style.border = "initial";
                    }

                    if (!isSteamId) form.steam_id.style.border = "2px solid red";

                    /*
                        Steam name validation
                    */
                    let steamName = form.steam_name.value, isSteamName = false;
                    if (!lengthValidation(steamName, 1, 32)) {
                        STEAM_NAME_MSG.innerText = "Your steam name must be between 1 and 32 characters long";
                    } else {
                        isSteamName = true;
                        STEAM_NAME_MSG.innerText = "";
                        form.steam_name.style.border = "initial";
                    }

                    if(!steamName) form.steam_name.style.border = "2px solid red";

                    /*
                        Region validation
                    */
                    let region = form.region.value;
                    let isRegion = selectValidation(form, form.region, region, REGIONS, true, REGION_MSG);

                    /*
                        Birth validation
                    */
                    let actualYear = new Date().getFullYear(), birth = form.birth.value, isBirth = false;
                    if (!lengthValidation(birth, 4, 4)) {
                        BIRTH_MSG.innerText = "Your birth year must be 4 characters long";
                    } else if (!typeValidation(birth, "number")) {
                        BIRTH_MSG.innerText = "Your birth year must be a number";
                    } else if (!isNumberPositive(birth)) {
                        BIRTH_MSG.innerText = "Your birth year can't be negative";
                    } else if ( birth < actualYear - 80 || birth > actualYear) {
                        BIRTH_MSG.innerText = "Your birth year isn't realistic";
                    } else if (!isNumberInteger(birth)) {
                        BIRTH_MSG.innerText = "Your birth year can't be a decimal number";
                    } else {
                        isBirth = true;
                        BIRTH_MSG.innerText = "";
                        form.birth.style.border = "initial";
                    }

                    if(!isBirth) form.birth.style.border = "2px solid red";

                    /*
                        Gender validation
                    */
                    let gender = form.gender.value;
                    let isGender = selectValidation(form, form.gender, gender, GENDER, false, GENDER_MSG);

                    /*
                        Hours played validation
                    */
                    let hours = form.hours.value, isHours = false;
                    if (!lengthValidation(hours, 1, 7)) {
                        HOURS_MSG.innerText = "The number of hours you have played can't exceed 7 digits";
                    } else if ( !typeValidation(hours, "number")) {
                        HOURS_MSG.innerText = "The number of hours you have played must be a number";
                    } else if (!isNumberPositive(hours)) {
                        HOURS_MSG.innerText = "The number of hours you have played can't be negative";
                    } else if (!isNumberInteger(hours)) {
                        HOURS_MSG.innerText = "The number of hours you have played can't be a decimal number";
                    } else {
                        isHours = true;
                        HOURS_MSG.innerText = "";
                        form.hours.style.border = "initial";
                    }

                    if (!isHours) form.hours.style.border = "2px solid red";

                    /*
                        Languages validation
                    */
                    let lan1 = form.language_1.value, lan2 = form.language_2.value, lan3 = form.language_3.value;
                    let isLanguages = selectValidation(form, form.language_3, lan1, LANGUAGES, true, LAN_1_MSG)
                                        && selectValidation(form, form.language_3, lan2, LANGUAGES, false, LAN_2_MSG)
                                        && selectValidation(form, form.language_3, lan3, LANGUAGES, false, LAN_3_MSG);

                    /*
                        Weapons validation
                    */
                    let wea1 = form.weapon_1.value, wea2 = form.weapon_2.value, wea3 = form.weapon_3.value;
                    let isWeapons = selectValidation(form, form.weapon_1, wea1, WEAPONS, false, WEA_1_MSG)
                                        && selectValidation(form, form.weapon_2, wea2, WEAPONS, false, WEA_2_MSG)
                                        && selectValidation(form, form.weapon_3, wea3, WEAPONS, false, WEA_3_MSG);

                    /*
                        Roles validation
                    */
                    let role1 = form.role_1.value, role2 = form.role_2.value, role3 = form.role_3.value;
                    let isRoles = selectValidation(form, form.role_1, role1, ROLES, false, RO_1_MSG)
                                    && selectValidation(form, form.role_2, role2, ROLES, false, RO_2_MSG)
                                    && selectValidation(form, form.role_3, role3, ROLES, false, RO_3_MSG);

                    /*
                        Days validation
                    */
                    let monday = [form.start_Monday.value, form.end_Monday.value],
                        tuesday = [form.start_Tuesday.value, form.end_Tuesday.value],
                        wednesday = [form.start_Wednesday.value, form.end_Wednesday.value],
                        thursday = [form.start_Thursday.value, form.end_Thursday.value],
                        friday = [form.start_Friday.value, form.end_Friday.value],
                        saturday = [form.start_Saturday.value, form.end_Saturday.value],
                        sunday = [form.start_Sunday.value, form.end_Sunday.value],
                        isDays = selectValidation(form, [form.start_Monday, form.end_Monday], monday, DAYS, false, MONDAY_MSG)
                                    && selectValidation(form, [form.start_Tuesday, form.end_Tuesday], tuesday, DAYS, false, TUESDAY_MSG)
                                    && selectValidation(form, [form.start_Wednesday, form.end_Wednesday], wednesday, DAYS, false, WEDNESDAY_MSG)
                                    && selectValidation(form, [form.start_Thursday, form.end_Thursday], thursday, DAYS, false, THURSDAY_MSG)
                                    && selectValidation(form, [form.start_Friday, form.end_Friday], friday, DAYS, false, FRIDAY_MSG)
                                    && selectValidation(form, [form.start_Saturday, form.end_Saturday], saturday, DAYS, false, SATURDAY_MSG)
                                    && selectValidation(form, [form.start_Sunday, form.end_Sunday], sunday, DAYS, false, SUNDAY_MSG);

                    /*
                        Groups validation
                    */
                    let group1 = form.group_1.value, group2 = form.group_2.value, group3 = form.group_3.value;
                    let isGroups = selectValidation(form, form.group_1, group1, GROUPS, false, GR_1_MSG)
                                    && selectValidation(form, form.group_2, group2, GROUPS, false, GR_2_MSG)
                                    && selectValidation(form, form.group_3, group3, GROUPS, false, GR_3_MSG);

                    return isDiscord && isSteamId && isSteamName && isRegion && isBirth && isGender && isHours
                            && isLanguages && isWeapons && isRoles && isDays && isGroups;

                }

                /**
                 * Function validating all the select options selected
                 *
                 * @param form The form
                 * @param select The current checked select
                 * @param value The option taken ( can be an array of values )
                 * @param array Mask array to compare values with
                 * @param restriction True if value has to have an other value than / and a real value
                 * @param message DOM element where to show error message
                 * @param isCorrect boolean to return
                 * @return {boolean} return whether or not select is ready or not
                 */
                function selectValidation(form, select, value, array, restriction, message, isCorrect = false) {
                    if (!isOptionCorrect(value, array, restriction)) {
                        message.innerText = "Select a correct option";
                    } else {
                        isCorrect = true;
                        message.innerText = "";
                        if (Array.isArray(select)){
                            select[0].style.border = "initial";
                            select[1].style.border = "initial";
                        } else {
                            select.style.border = "initial";
                        }
                    }

                    if(!isCorrect) {
                        if (Array.isArray(select)) {
                            select[0].style.border = "2px solid red";
                            select[1].style.border = "2px solid red";
                        } else {
                            select.style.border = "2px solid red";
                        }
                    }

                    return isCorrect;
                }

                /**
                 * Function checking the size of the value entered in input
                 *
                 * @param value string | input value to check
                 * @param lengthMin int | minimum authorized length
                 * @param lengthMax int | maximum authorized length
                 * @returns {boolean} returns whether or not the value has the right size
                 */
                function lengthValidation(value, lengthMin, lengthMax) {
                    return !(value.length < lengthMin || value.length > lengthMax);
                }

                /**
                 * Function checking the type of value entered in input
                 *
                 * @param value string | input value to check
                 * @param requiredType string | authorized type in input
                 * @returns {boolean} return whether or not the value is the same type as the requiredType
                 */
                function typeValidation(value, requiredType) {
                    if (requiredType === "number") {
                        return !isNaN(value);
                    }
                    return true;
                }

                /**
                 * Function checking if number is positive
                 *
                 * @param number mixed | value to check
                 * @returns {boolean} return whether or not value is positive
                 */
                function isNumberPositive(number) {
                    return number > 0;
                }

                /**
                 * Function checking if number is an int
                 *
                 * @param number mixed | value to check
                 * @returns {boolean} return whether or not value is an integer
                 */
                function isNumberInteger(number) {
                    return number % 1 === 0;
                }

                /**
                 * Function checking if the option selected in the select dropdown is a correct option
                 *
                 * @param value value to check
                 * @param array mask array to check from the value
                 * @param isDefaultValueRestricted language_1 and regions have to have a default value
                 * @return {boolean} return whether or not selected option is correct
                 */
                function isOptionCorrect(value, array, isDefaultValueRestricted) {
                    if (isDefaultValueRestricted) {
                        if (value === "/") {
                            return false;
                        }
                    }

                    if (Array.isArray(value)) { // schedules are stocked in arrays
                        let isFirstArg = false, isSecondArg = false; // Both args have to be correct, not only one of em

                        if (array.includes(value[0])) {
                            isFirstArg = true;
                        }

                        if (array.includes(value[1])) {
                            isSecondArg = true;
                        }

                        if (isFirstArg && isSecondArg) return true;

                    } else {
                        if (array.includes(value)) {
                            return true;
                        }
                    }
                    return false;
                }

            </script>

        <?php

        // display profile
        }else{

        ?>
            <h1>My profile</h1>
            <!-- DISCORD -->
            <div>
                <h2>Discord</h2>
                <div>
                    <h4>Name :</h4>
                    <p><?= $discord ?></p>
                </div>
            </div>
            <!-- STEAM INFOS -->
            <div>
                <h2>Steam</h2>
                <div>
                    <h4>ID : </h4>
                    <p><?= $steamId ?></p>
                    <h4>Name :</h4>
                    <p><?= $steamName ?></p>
                </div>
            </div>
            <!-- Region -->
            <div>
                <h2>Region</h2>
                <p><?= $savedRegion ?></p>
            </div>
            <!-- Birth -->
            <div>
                <h2>Birth</h2>
                <p><?= $birth ?></p>
            </div>
            <!-- Gender -->
            <div>
                <h2>Gender</h2>
                <p><?= $gender ?></p>
            </div>
            <!-- HOURS -->
            <div>
                <h2>Hours</h2>
                <p><?= $hours ?></p>
            </div>
            <!-- LANGUAGES -->
            <div>
                <h2>Languages</h2>
                <?php for($i = 0; $i < sizeof($savedLanguages); $i++){ ?>
                    <p><?= $i+1 . " " . $savedLanguages[$i] ?></p>
                <?php } ?>
            </div>
            <!-- WEAPONS -->
            <div>
                <h2>Weapons</h2>
                <?php for($i = 0; $i < sizeof($savedWeapons); $i++){ ?>
                    <p><?= $i+1 . " " . $savedWeapons[$i] ?></p>
                <?php } ?>
            </div>
            <!-- ROLES -->
            <div>
                <h2>Roles</h2>
                <?php for($i = 0; $i < sizeof($savedRoles); $i++){ ?>
                    <p><?= $i+1 . " " . $savedRoles[$i] ?></p>
                <?php } ?>
            </div>
            <!-- SCHEDULE -->
            <div>
                <h2>Availability</h2>
                <h4>Monday :</h4>
                <p><?= $savedDays["Monday"]["start"] . " to " . $savedDays["Monday"]["end"] ?></p>
                <h4>Tuesday :</h4>
                <p><?= $savedDays["Tuesday"]["start"] . " to " . $savedDays["Tuesday"]["end"] ?></p>
                <h4>Wednesday :</h4>
                <p><?= $savedDays["Wednesday"]["start"] . " to " . $savedDays["Wednesday"]["end"] ?></p>
                <h4>Thursday :</h4>
                <p><?= $savedDays["Thursday"]["start"] . " to " . $savedDays["Thursday"]["end"] ?></p>
                <h4>Friday :</h4>
                <p><?= $savedDays["Friday"]["start"] . " to " . $savedDays["Friday"]["end"] ?></p>
                <h4>Saturday :</h4>
                <p><?= $savedDays["Saturday"]["start"] . " to " . $savedDays["Saturday"]["end"] ?></p>
                <h4>Sunday :</h4>
                <p><?= $savedDays["Sunday"]["start"] . " to " . $savedDays["Sunday"]["end"] ?></p>
            </div>
            <!-- GROUP -->
            <div>
                <h2>Groups preferences</h2>
                <?php for($i = 0; $i < sizeof($savedGroups); $i++){ ?>
                    <p><?= $i+1 . " " . $savedGroups[$i] ?></p>
                <?php } ?>
            </div>
            <!-- Links -->
            <a href="../../index.php">Go back</a>
            <a href="./profile.php?modify">Modify profile</a>

        <?php
        }

    }else{
        header('Location: ../../index.php');
        exit();
    }

    require '../util/footer.php';
?>