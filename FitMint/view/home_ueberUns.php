<article class="hreview open special">

	<?php if (empty($users)): ?>
		<div class="dhd" align="center">
		<h2 class="item title">Über uns</h2>
			
			
			<?php
			echo '<a href="home"><img src="../images/logo-round-space.png" /></a>';

			?>       
		<h3>Willkommen auf FitMint!</h3><br>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. <br/>
		Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<br>
		Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.<br>
		Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,<br>
		imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.<br>
		Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor<br>
		eu, consequat vitae, eleifend ac, enim. </p>
      
		</div>
	<?php else: ?>
		<?php foreach ($users as $user): ?>
			<div class="panel panel-default">
		<div class="panel-heading"><?= $user->firstName;?> <?= $user->lastName;?></div>
		<div class="panel-body">
			<p class="description">In der Datenbank existiert ein User mit dem Namen <?= $user->firstName;?> <?= $user->lastName;?>. Dieser hat die EMail-Adresse: <a
					href="mailto:<?= $user->email;?>"><?= $user->email;?></a>
			</p>
			<p>
				<a title="Löschen" href="/user/delete?id=<?= $user->id ?>">Löschen</a>
			</p>
		</div>
	</div>
		<?php endforeach ?>
	<?php endif ?>
</article>
