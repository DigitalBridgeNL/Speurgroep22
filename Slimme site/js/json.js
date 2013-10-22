// JavaScript Document
function getContactdata(){
			$.getJSON('../includes/getContactdata.php', function(data) {
			console.log(data);
				var i, j, strHTML = "";
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<tr><td>Contact:</td><td>" + data[i]['username'] + "</td></tr>";
					strHTML += "<tr><td>K.v.K. nummer:</td><td>" + data[i]['kvknr'] + "</td></tr>";
					strHTML += "<tr><td>BTW nummer:</td><td>" + data[i]['btwnr'] + "</td></tr>";
					}
					$("#contactSG").append(strHTML);
					});
};

function getHelpNinfopages(){
		$.getJSON('includes/getPages.php', function(data) { // Haal informatie op van getPages, hierin staat een query dat alle pagina`s van een bepaalde categorie ophaalt.
			console.log(data); // log de data ter controle in het console
				var i, j, strHTML = ""; // i = het aantal records, j is de specifieke kolom van het record, strHTML is de string van html dat door javascript aangemaakt zal worden
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<li><a href='helpNinfo.php?page=" + data[i]['id']+ "'>" + data[i]['name'] + "</a></li>";
					}
					$("#pages").html(strHTML); // Voeg de string van html toe aan het element met ID Pages.
					});
};

function getAllpages(){
		$.getJSON('../includes/getAllpages.php', function(data) { // Haal informatie op van getPages, hierin staat een query dat alle pagina`s van een bepaalde categorie ophaalt.
			console.log(data); // log de data ter controle in het console
				var i, j, strHTML = ""; // i = het aantal records, j is de specifieke kolom van het record, strHTML is de string van html dat door javascript aangemaakt zal worden
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<tr id=" + data[i]['id']+ "><td>" + data[i]['catname'] + "</td><td>" + data[i]['pagename']+"</td></tr>";
					}
					$("#pagesTable").html(strHTML); // Voeg de string van html toe aan het element met ID Pages.
					});
};

function loadHTML(){
	$("#table-scroll table").delegate('tr', 'click', function() {
        var n = $(this).attr('id');
		alert(n);
		$.ajax({
		type: 'get',
		url: 'includes/getDetails.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+n,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<header>" + data[i]['name'] + "</header>";
			strHTML += "<p>" + data[i]['tekst'] + "</p>";
			}
			$("#pageContent").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
    });
};

function loadBedrijf(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadBedrijf.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<div class='row'><div class='large-9 columns'><form method='post'>"
			strHTML += "<label>Contactpersoon</label><input type='text' name='contactpersoon' value='" + data[i]['contactpersoon'] + "' />"
			strHTML += "<label>Bedrijfsnaam</label><input type='text' name='bedrijfsnaam' value='" + data[i]['bedrijfsnaam'] + "' />"
			strHTML += "<label>Woon / Vestigingsadres</label><input type='text' name='adres' value='" + data[i]['adres'] + "' />"
			strHTML += "<label>Postcode</label><input type='text' name='postcode' value='" + data[i]['postcode'] + "' />"
			strHTML += "<label>Plaats</label><input type='text' name='plaats' value='" + data[i]['plaats'] + "' />"
			strHTML += "<label>Website</label><input type='text' name='website' value='" + data[i]['website'] + "' />"
			strHTML += "<label>E-Mailadres</label><input type='text' name='email' value='" + data[i]['email'] + "' />"
			strHTML += "<label>Telefoonnummer 1</label><input type='text' name='telefoonnummer1' value='" + data[i]['telefoonnummer1'] + "' />"
			strHTML += "<label>Telefoonnummer 2</label><input type='text' name='telefoonnummer2' value='" + data[i]['telefoonnummer2'] + "' /><input type='submit' class='button secundary' name='updatebedrijf' value='gegevens wijzigen'/>"
			strHTML += "</form></div></div>"
			}
			$("#loadBedrijf").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function loadLogin(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadLogin.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<div class='row'><div class='large-9 columns'><form>"
			strHTML += "<label>Gebruikersnaam</label><input type='text' name='gebruikersnaam' value='" + data[i]['username'] + "' DISABLED />"
			strHTML += "<label>Wachtwoord</label><input type='password' name='wachtwoord' value='" + data[i]['wachtwoord'] + "' /><a href='#' data-reveal-id='editWW'>Wachtwoord aanpassen</a>"
			strHTML += "</form></div></div>"
			}
			$("#loadLogin").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function loadBranche(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadBranche.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			strHTML += "<table><tr><td>Hoofdgroep</td><td>" + data[0]['branche'] + "</td></tr>"
			for (i = 1; i < data.length; i += 1) {
			strHTML += "<tr><td>Subgroep " + i + "</td><td>" + data[i]['branche'] + "</td></tr>"
			}
			strHTML += "</table>"
			$("#loadBranches").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function loadPakket(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadPakket.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<table><tr><td>Pakket keuze:</td><td>" + data[i]['pakketid'] + "</td></tr>"
			strHTML += "</table>"
			}
			$("#loadPakket").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function loadContract(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadContract.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<table><tr><td>Contract</td><td><a href='" + data[i]['contract'] + "'>Download</a></td></tr>"
			strHTML += "</table>"
			}
			$("#loadContract").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function loadMelding(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadMelding.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = "";
			strHTML += ""
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<tr><td>" + data[i]['datum'] + "</td><td>" + data[i]['onderwerp'] + "</td><td><a id='" + data[i]['meldingID'] + "' href='javascript:readMelding();'>Lees</a></td></tr>"
			}
			$("#loadMelding").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function readMelding(){
	$("#loadMelding").delegate('a', 'click', function() {
		var meldingID = $(this).attr('id');
		console.log(meldingID);
		$.ajax({
		type: 'get',
		url: 'includes/load_currentMelding.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+meldingID,
		success: function(data) {
			var strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			strHTML += "<p class='grey_titel'>Melding | "+data[0]['onderwerp']+"</p>"
			strHTML += "<p class=''>"+data[0]['tekst']+"</p>"
			$("#meldingdetail").html(strHTML);
			}
		});
	});
};

function add_specialisatie(){
		var currentUser = document.getElementById('user').value;
		var value = document.getElementById('value_specialisatie').value;
		var branche = document.getElementById('branche').value;
		$.ajax({
		type: 'get',
		url: 'includes/addSpecialisatie.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: {id: currentUser, specialisatie: value, branche: branche},
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			var bevestiging = "<p class='grey_titel'>Uw specialisatie <U>"+value+"</U> is toegevoegd";
			for (i = 0; i < data.length; i += 1) {
			strHTML += '<label for="checkbox1"><input type="checkbox" name="'+data[i]['bs_id']+'" id="special1" style="display: none;"><span class="custom checkbox"></span>'+data[i]['specialisatie']+'</label>';
			}
			$("#specialisaties_chkbox").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			$("#specialisatie_add").append(bevestiging); 
			}
		});
};	
