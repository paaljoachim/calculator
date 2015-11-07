function updateRanges(){
 
 // update all ranges' outputs (visual effect only
 // since we do math on range values and not outputs)
 jQuery('input[type="range"]').each(function(){
 var rangeNum = jQuery(this).val(),
 rangeFor = jQuery(this).attr('name');
 
 // Old code
 //jQuery('output[for="'+rangeFor+'"]').val(rangeNum);
 
// New code that also makes the calculator work in IE
 jQuery('output[for="'+rangeFor+'"]').replaceWith('<output for ="'+rangeFor+'">'+rangeNum+'</output>');

});
 
 // update the total value
 var rangeVals = {
 'one' : parseInt(jQuery('input[name="r10"]').val()), // Hvor mye penger ønsker gruppen å tjene? (How much money does the group want to earn?)
 'two' : parseInt(jQuery('input[name="r20"]').val()), // Velg antall deltagere i gruppen:
 };
 
 // Do the math
jQuery('.resultat-salgprodukter span').html(Math.round((rangeVals.one / 80) * 1) / 1); // Antall produkter å selge = (Amount of products to sell)
 
jQuery('.resultat-salgdeltager span').html(Math.round((rangeVals.one / 80 / rangeVals.two) * 1) / 1); // Antall salg pr. deltager (amount of sales per participant): 1 = no decimals, 100 = 2 decimals */ 

// Sammendrag
jQuery('.resultat-produktertotalt span').html(Math.round((rangeVals.one / 80) * 1) / 1); // Antall Produkter Totalt: (Total product amount)

jQuery('.resultat-kartonger span').html(Math.round((rangeVals.one / 80 / 20 / rangeVals.two) * 1) / 1); // Antall Kartonger a 20 esker 
}

// Code that helps the calculator work in IE
 jQuery('input').change( function() {
 updateRanges()
 }); 
