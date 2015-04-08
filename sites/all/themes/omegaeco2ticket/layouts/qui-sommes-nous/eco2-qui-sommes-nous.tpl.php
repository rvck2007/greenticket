<?php print render($page['slider']); ?>
<div class="l-page">


<!--       HEADER       -->
<!-- .................. -->
  


  <header class="l-header" role="banner">

  	<?php print render($page['user_connexions']); ?>

    <?php print render($page['header']); ?>

    <?php print render($page['navigation']); ?>
  </header>
  
<div class="line"></div>

<!--       MAIN         -->
<!-- .................. -->

  <div class="l-main">
    <div>
      <?php print $messages; ?>
    </div>
    <div>
      <h2><?php print $title; ?></h2><hr><br>
    </div>

    <div class="l-content" role="main">
      <?php print render($page['logo_notre histoire']); ?>

      <?php print render($page['content']); ?>

      <?php print $feed_icons; ?>
    </div>
     <!-- <img src="/eco2ticket/sites/all/themes/omegaeco2ticket/images/logo-notre-histoire.png"  class="logo-notre-histoire" /> -->
     

  	
     <?php print render($page['logo_utilisation']); ?>  
     <?php print render($page['utilisation_en_magasin']); ?>
     <?php print render($page['utilisation_en_covoiturage']); ?>
  </div>




  <!--       FOOTER       -->
  <!-- .................. -->

  <footer class="l-footer" role="contentinfo">

    <div id="footer_empty" class="footer-box"><?php print render($page['footer_empty']); ?>
     	<!-- ......................................... -->
			&copy;2014 <br>
    
    </div>
    
    <div id="footer_a_propos" class="footer-box footer-bebas">
        <?php print render($page['footer_a_propos']); ?>
        <span class="footer-bebas">A PROPOS</span>
        <br>
        <p class="footer-block-text">
          C'est une société qui a pour but de favoriser
          le co-voiturage à travers un concept novateur
          et jamais exploité: le bon d'achat.
        </p>

    </div>
  
    <div id="informations" class="footer-box footer-bebas footer-box-bordered">
      <?php print render($page['informations']); ?>
      <span class="footer-bebas">INFORMATIONS</span>
      <br>
      <p class="footer-block-text">
        <a href="#">Conditions générales de vente</a>
        <br>
        <a href="#">Mentions légales</a>
      </p>
    </div>

    <div id="utilisation" class="footer-box footer-bebas footer-box-bordered">
      <?php print render($page['utilisation']); ?>
      <span class="footer-bebas">UTILISATION</span>
      <br>
      <p class="footer-block-text">
        <a href="#">Imprimer le bon d'achat</a>
        <br>
        <a href="#">Le bon d'achat dans le covoiturage</a>
      </p>
    </div>

    <div id="suivez_nous" class="footer-box footer-bebas footer-box-bordered">
      <?php print render($page['suivez_nous']); ?>
      <span class="footer-bebas">SUIVEZ-NOUS</span>
    </div>

    <div id="contactez_nous" class="footer-box footer-bebas footer-box-bordered">
      <?php print render($page['contactez_nous']); ?>
      <span class="footer-bebas">CONTACTEZ-NOUS</span>
      <br>
      <p class="footer-block-text">
        Mail: sekaherve@gmail.com<br>
        Phone: 06.37.88.82.67<br>
        Fax: 
      </p>
    </div>

  <!--
  <?php
    if($page['contactez_nous']) : ?>
      <div id="contactez_nous"><?php print render($page['contactez_nous']); ?>
      CONTACTEZ-NOUS
      </div>
  <?php endif;  ?>
  -->
  </footer>

</div>
