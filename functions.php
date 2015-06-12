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
	<div id="calcform">
		<form oninput="updateRanges()">
			<h4 id="calc-heading">Dugnadskalkulator</h4>
			<div id="calc-content">
				<div class="slider"> 
					<output class="styled-output" for="r1">1</output>
					<label for="r1">Antall personer / percipients </label>
					<input type="range" name="r1" step="1" min="1" max="40" value="1">
				</div> 
				<div class="slider">
					<output class="styled-output" for="r2">1</output>
					<label for="r2">Salg / Sale</label>
					<input type="range" name="r2" step="1" min="0" max="40" value="1">
				</div>
				<div class="result">
					Du tjener / You earn <span>220</span> Kr
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
