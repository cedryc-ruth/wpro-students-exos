<?php
			/**
             * creation of different selects and their options
             *
             * @param string $nameSelect Which select has to be created, used to name the select
             * @param array $dataArray arrays containing the options
             * @param array $profileArray contains saved option from profile or empty string
             *                            if no option saved in case of profile creation
             */
            return function select_creation(string $nameSelect, array $dataArray, array $profileArray) : void {
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
?>