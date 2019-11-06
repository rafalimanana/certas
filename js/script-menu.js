$(document).ready(function() {
	if (screen.width <= 990) {
		console.log('test menu')
		/*$('.submenu').css('display', 'none');*/
		var sub_station = document.getElementById("sub_station");
		var lavage_station = document.getElementById("lavage_station");
		var l_produit = document.getElementById("l_produit");
		var c_marche = document.getElementById("c_marche");
		sub_station.style.display = "none";
		lavage_station.style.display = "none";
		l_produit.style.display = "none";
		c_marche.style.display = "none";
		$('#n_station').click(function(e) {
			// $(".submenu").removeClass("submenu");
			// $('#_menu li').parent().find('ul#sub_station').removeClass('submenu');
			l_produit.style.display = "none";
			c_marche.style.display = "none";
			if (sub_station.style.display === "block") {
			    sub_station.style.display = "none";
			 } else {
			    sub_station.style.display = "block";
			 }
			// $('#sub_station').css('display', 'block')
		})

		$('#child_station').click(function(e) {
			l_produit.style.display = "none";
			c_marche.style.display = "none";
			if (lavage_station.style.display === "block") {
			    lavage_station.style.display = "none";
			 } else {
			    lavage_station.style.display = "block";
			 }
		})

		$('#n_carburant').click(function(e) {
			sub_station.style.display = "none";
			lavage_station.style.display = "none";
			c_marche.style.display = "none";
			if (l_produit.style.display === "block") {
			    l_produit.style.display = "none";
			 } else {
			    l_produit.style.display = "block";
			 }
		})

		$('#c_energy').click(function(e) {
			sub_station.style.display = "none";
			lavage_station.style.display = "none";
			l_produit.style.display = "none";
			if (c_marche.style.display === "block") {
			    c_marche.style.display = "none";
			 } else {
			    c_marche.style.display = "block";
			 }
		})
	}
})