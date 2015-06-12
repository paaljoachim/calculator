//* This is code for adding a shortcode instead of adding html directly to a text widget.
/*
Somewhere in our setup (eg. the functions file, or somewhere else), we'll create a new shortcode.
I tweaked the markup a bit, nothing too fancy, might need a css update, though...
It's more of a 'noone likes divsoup' approach, I guess.
You can do it your way, just replace the HTML.
*/

// Next, add shortcode function
function dugnad_shortcode() {
	
	// Enqueue our registered script to be added in the footer, when our shortcode is used.
	// Should work, according to http://mikejolley.com/2013/12/sensible-script-enqueuing-shortcodes/
	wp_enqueue_script('dugnadskalkulator');
	
	ob_start(); // Here's a cool way to do markup inside our function
	?>
<div id="calc-form">
    <!-- <form oninput="updateRanges()"> -->
<form oninput="updateRanges()" onchange="updateRanges()">  <!-- For IE--->       	                                        
              <div id="calc-heading">Dugnadskalkulator</div>                           
              
         <div id="calc-content">                                  
                      <div class="calcslider">Hvor mye penger ønsker gruppen å tjene? 
                       <div class="styled-output"><output for="r10">1400</output>kr</div> 
                                       
                                       <input type="range" name="r10" step="1400" min="1400" max="160000" value="0">
                      </div>  

		  <div class="resultat-salgprodukter">Antall produkter å selge: <span>20</span> <br /></div>                                 
                        <div class="calcslider">Velg antall deltagere i gruppen: <br /></div>
                         <div class="styled-output"><output for="r20">1</output></div> 
                                       
                                       <input type="range" name="r20" step="1" min="1" max="40" value="1">
                    
               <div class="resultat-salgdeltager">Antall bursdagsesker pr. deltager: <br><span>20</span></div>
                          
               <div id="calc-sammendrag-heading">Sammendrag</div>
               <div class="calc-sammendrag">
                                  
               		<p>
               		<div class="resultat-salgprodukter">
                  		 Antall Produkter Totalt: <span>20</span> 
               		</div>
                                  
               		<div class="resultat-kartonger">
               		     Antall Kartonger a 20 Esker: <span>1</span>
              		</div>
                                  
              			 Fortjeneste pr. Produkt 70 Kr
              		<br />Anbefalt utsalgspris 130kr
               </div>
          </div>                           
    </form>
</div>
	<?php
	
	return ob_get_clean(); // return markup
}

// Lastly we add the shortcode to use it as [dugnadskalkulator] anywhere
add_shortcode( 'dugnadskalkulator', 'dugnad_shortcode' );


/*
Really, the hardest part of all this is where to put this stuff. If we add it directly to our theme, the shortcode becomes invalid if the theme is changed. IMHO, dead shortcodes are just as bad as dead urls.
The most sensible thing would be to wrap it all up in a tiny custom plugin. If we were to "mu" the thing, it wouldn't be too much of a hazzle. Thoughts?
*/
