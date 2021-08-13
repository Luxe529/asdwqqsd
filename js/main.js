function dropdown() {
	document.querySelector(".dropdown").classList.toggle("shown");
	document.querySelector(".navbar").classList.toggle("dropdownshown");
}

window.addEventListener("scroll", function() {
	var offset = window.pageYOffset;
	var parallax = document.querySelector(".top");
	var navbar = document.querySelector(".navbar");

	parallax.style.backgroundPositionY = offset * .25 + 'px';

	if (offset > 50) {
		navbar.classList.add("scrolled");
	}

	else if (offset < 50) {
		navbar.classList.remove("scrolled");
	}
});