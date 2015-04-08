<?php
  /* print the variables if needed to allow for 
  individual field theming or breaking them up. 
  print '<pre>';
  print_r($variables);
  print '</pre>';
  */
  
?>

<p><?php print render($intro_text); ?></p>
<div class="omegaeco2ticket-user-login-form-wrapper">

	
<?php 
		// print drupal_render_children($form) 

	  print drupal_render($form['name']);
	  print drupal_render($form['pass']);
	  print drupal_render($form['form_build_id']);
	  print drupal_render($form['form_id']);
	  print drupal_render($form['actions']);
?>

</div>