// Page Loader
document.addEventListener('readystatechange', function(event) {
	if ( document.getElementById('loader') ){
		if (document.readyState === "complete") {
			setTimeout(function(){
				document.getElementById('loader').classList.add('hide');
			}, 1000);
		}
	}
});
if ( document.getElementById('loader') ){
	window.addEventListener( 'beforeunload', function( event ) {
		event.preventDefault();
		document.getElementById('loader').classList.remove('hide');
	});
}

// Mouse Move / Custom Pointer
if ( document.getElementById('pointer') ) {
	function update(e){
		var x = e.clientX || e.touches[0].clientX;
		var y = e.clientY || e.touches[0].clientY;
		document.getElementById('pointer').setAttribute('style', 'left:' + x + 'px; top:' + y + 'px');
	}
	document.addEventListener('mousemove',update);
	document.addEventListener('touchmove',update);
}

// Side Menu
if ( document.getElementById('side-menu') && document.getElementById('fullsize-menu-toggler') ){
	let sideMenuToggler = document.getElementById('fullsize-menu-toggler');
	let sideMenuClose = document.getElementById('side-menu-close');
	let sideMenu = document.getElementById('side-menu');
	sideMenuToggler.addEventListener("click", function() {
		sideMenu.classList.toggle('active');
	});
	sideMenuClose.addEventListener("click", function() {
		sideMenu.classList.remove('active');
	});
}

// Animate on scroll
if ( AOS ) {
	AOS.init({
		once: true
	});
}

// Parallax
window.addEventListener('scroll', function(e) {
	const target = document.querySelectorAll('.scroll');
	var index = 0, length = target.length;
	for (index; index < length; index++) {
		var pos = window.pageYOffset * target[index].dataset.rate;
  
		if(target[index].dataset.direction === 'vertical') {
			target[index].style.transform = 'translate3d(0px,'+pos+'px, 0px)';
		} else {
			var posX = window.pageYOffset * target[index].dataset.ratex;
			var posY = window.pageYOffset * target[index].dataset.ratey;
			target[index].style.transform = 'translate3d('+posX+'px, '+posY+'px, 0px)';
		}
	}
});