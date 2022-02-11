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
