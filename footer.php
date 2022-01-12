<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmascores
 */

?>

</div><!-- #content -->

<footer class="footer wave-bottom bc-valkoinen">
	<div class="container">
		<div class="content">
      <h2>Yhteystiedot</h2>
      <div class="columns footer-external">
        <div class="column">
          <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/kaupunkiyhteiset-tietovarannot/#yhteisettietopyynto">Kaupunkiyhteiset tietovarannot</a>
          <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/keskushallinnon-tietovarannot/kaupungin-kanslian-tietovarannot/#kansliatietopyynto">Kaupunginkanslia tietovarannot</a>
          <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/keskushallinnon-tietovarannot/kaupungin-virastojen-tietovarannot/#tarkastusvirastotietopyynto">Tarkastusvirasto</a>
        </div>
        <div class="column">
         <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/keskushallinnon-tietovarannot/kaupungin-virastojen-tietovarannot/#pelastuslaitostietopyynto">Pelastuslaitos</a>
         <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/keskushallinnon-tietovarannot/kaupungin-liikelaitosten-tietovarannot/#palvelukeskustietopyynto">Palvelukeskus Helsinki</a>
         <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/keskushallinnon-tietovarannot/kaupungin-liikelaitosten-tietovarannot/#staratietopyynto">STARA</a>

       </div>
       <div class="column">
        <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/keskushallinnon-tietovarannot/kaupungin-liikelaitosten-tietovarannot/#talpatietopyynto">TALPA</a>
        <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/keskushallinnon-tietovarannot/kaupungin-liikelaitosten-tietovarannot/#tyketietopyynto">Työterveys Helsinki</a>
        <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/kasvatuksen-ja-koulutuksen-toimialan-tietovarannot/#KASKOtietopyynto">Kasvatuksen ja koulutuksen toimiala</a>
      </div>
      <div class="column">
        <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/kaupunkiympariston-toimialan-kymp-tietovarannot/#KYMPtietopyynto">Kaupunkiympäristön toimiala</a>
        <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/kulttuurin-ja-vapaa-ajan-toimialan-kuva-tietovarannot/#KUVAtietopyynto">Kulttuurin ja vapaa-ajan toimiala</a>
        <a href="https://asiakirjajulkisuus.hel.fi/tietovarannot/sosiaali-ja-terveysoimialan-sote-tietovarannot/#SOTEtietopyynto">Sosiaali- ja terveystoimiala
        </a>
      </div>
    </div>
  </div>

  <?php

  if( have_rows('footer_links', 'options') ): ?>
    <div class="columns is-vcentered">
      <div class="container">
        <figure class="image">
          <img src="<?= get_stylesheet_directory_uri() ?>/images/HELSINKI_Tunnus_VALKOINEN.png" alt="Footer logo">
        </figure>
        <div class="footer-info">
          <span>&copy; <?php pll_e('Helsingin kaupunki') ?>, <?php echo date("Y"); ?></span> 

          <?php
          while( have_rows('footer_links', 'options') ) : the_row(); 
            $title = get_sub_field('otsikko');
            $title_en = get_sub_field('otsikko_en');
            $title_sv = get_sub_field('otsikko_sv');

            $link = get_sub_field('linkki');
            $link_en = get_sub_field('linkki_en');
            $link_sv = get_sub_field('linkki_sv');

            $lang = pll_current_language();

            if ($lang == 'fi') {
              echo '<a href="'.$link.'">'.$title.'</a>';
            } elseif($lang == 'en') {
              echo '<a href="'.$link_en.'">'.$title_en.'</a>';
            } else {
             echo '<a href="'.$link_sv.'">'.$title_sv.'</a>';
           }

         endwhile;
       endif; ?>
     </div>
   </div>
 </div>
</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
