<?php
$array = array("Benji", "Jonas", "Lara", "");

for($i = 0; $i < count($array); $i++): ?>
	<div class="card">
	  <div class="container">
    <h4><b><?php echo $array[$i]; ?></b></h4> 
    <p>Architect & Engineer</p> 
  </div>
</div>
<?php endfor;?>