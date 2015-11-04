<?php 

/*
Plugin name: Dugnadscalculator Shortcode
Description: Makes a shortcode [dugnadskalkulator] to put a dugnadscalculator anywhere on your page
Author: Paal Joachim Romdahl
Author uri: http://www.easywebdesigntutorials.com/
*/



/*
------
Register the dugnad script and style, but do not enqueue */

add_action('wp_enqueue_scripts','dugnad_script_reg');
function dugnad_script_reg(){
	
	wp_register_script(
		'dugnadskalkulator',
		plugins_url('dugnad-calc').'/assets/script.js',
		array('jquery'),
		null,
		true
	);
    
    wp_register_style(
		'dugnadskalkulator',
		plugins_url('dugnad-calc').'/assets/style.css',
		null,
		null,
		'all'
	);
	
}

/*
------
Register the dugnad shortcode - [dugnadskalkulator] */

add_shortcode( 'dugnadskalkulator', 'dugnad_shortcode' );
function dugnad_shortcode() {
	
	// Enqueue our registered script to be added in the footer, when our shortcode is used.
	// Should work, according to http://mikejolley.com/2013/12/sensible-script-enqueuing-shortcodes/
	wp_enqueue_script('dugnadskalkulator');
    wp_enqueue_style('dugnadskalkulator');
	
	ob_start(); // Begin output buffer
	?>
	<div id="calc-form">
	    <form oninput="updateRanges()" onchange="updateRanges()">  <!-- For IE--->       	                                        
            <div id="calc-heading">Dugnadskalkulator</div>                           
            <div id="calc-content">                                  
                <div class="calcslider">Hvor mye penger ønsker gruppen å tjene? 
                <div class="styled-output"><output for="r10">1600</output>kr</div> 

                <input type="range" name="r10" step="1600" min="1600" max="160000" value="0">
            </div>  
            <div class="resultat-salgprodukter">Antall produkter å selge: <span>20</span> <br /></div>                                 
                <div class="calcslider">Velg antall deltagere i gruppen: <br /></div>
                <div class="styled-output"><output for="r20">1</output></div> 
                <input type="range" name="r20" step="1" min="1" max="40" value="1">
                <div class="resultat-salgdeltager">Antall bursdagsesker pr. deltager: <br><span>20</span></div>        
                <div id="calc-sammendrag-heading">Sammendrag</div>
                <div class="calc-sammendrag">
                    <div class="resultat-salgprodukter">
                        Antall Produkter Totalt: <span>20</span> 
                    </div>
                    <div class="resultat-kartonger">
                        Antall Kartonger a 20 Esker: <span>1</span>
                    </div>
                    Fortjeneste pr. Produkt 80 Kr<br />
                    Anbefalt utsalgspris 150kr
               </div>
            </div>                           
	    </form>
	</div>
	<?php
	return ob_get_clean(); // return and clean output buffer
}
