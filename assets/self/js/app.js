/**
 * 
 *  File for my self js function
 * 
 **/
function toggle( elementToHide , elementToShow ){
	let hide = document.querySelector(elementToHide);
	let show = document.querySelector(elementToShow);

	// le hide atao display none
	hide.style.display = 'none';
	show.style.display = 'block';

}