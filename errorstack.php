<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <h3><?php echo $error ?></h3>
  	<?php endforeach ?>
  </div>
<?php  endif ?>