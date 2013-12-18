// JavaScript Document
function getContactdata(){
			$.getJSON('../API/getContactdata.php', function(data) {
			console.log(data);
				var i, j, strHTML = "";
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<tr><td>Contact:</td><td>" + data[i]['email'] + "</td></tr>";
					strHTML += "<tr><td>K.v.K. nummer:</td><td>" + data[i]['kvknr'] + "</td></tr>";
					strHTML += "<tr><td>BTW nummer:</td><td>" + data[i]['btwnr'] + "</td></tr>";
					}
					$("#contactSG").append(strHTML);
					});
};

function getHelpNinfopages(){
		$.getJSON('../API/getPages.php', function(data) { // Haal informatie op van getPages, hierin staat een query dat alle pagina`s van een bepaalde categorie ophaalt.
			console.log(data); // log de data ter controle in het console
				var i, j, strHTML = ""; // i = het aantal records, j is de specifieke kolom van het record, strHTML is de string van html dat door javascript aangemaakt zal worden
				for (i = 0; i < data.length; i += 1) {
					strHTML += "<li><a href='helpNinfo.php?page=" + data[i]['id']+ "'>" + data[i]['name'] + "</a></li>";
					}
					$("#pages").html(strHTML); // Voeg de string van html toe aan het element met ID Pages.
					});
};

function getAllpages(){
		$.getJSON('../API/getAllpages.php', function(data) { // Haal informatie op van getPages, hierin staat een query dat alle pagina`s van een bepaalde categorie ophaalt.
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
		url: '../API/getDetails.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
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
		url: '../API/loadBedrijf.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
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
		url: '../API/loadLogin.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
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
		url: '../API/loadBranche.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
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
		url: '../API/loadPakket.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
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
		url: '../API/loadContract.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
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
		url: '../API/loadMelding.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+currentUser,
		success: function(data) {
			var i, j, strHTML = "";
			strHTML += ""
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<tr><td>" + data[i]['datum'] + "</td><td>" + data[i]['onderwerp'] + "</td><td><a href='javascript:readMelding("+ data[i]['meldingID'] +");'>Lees</a></td></tr>"
			}
			$("#loadMelding").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function readMelding(key){
		var meldingID = key;
		console.log(meldingID);
		$.ajax({
		type: 'get',
		url: '../API/load_currentMelding.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		data: 'id='+meldingID,
		success: function(data) {
			console.log(data);
			var strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			strHTML += "<p class='grey_titel'>Melding | "+data[0]['onderwerp']+"</p>"
			strHTML += "<p class=''>"+data[0]['tekst']+"</p>"
			$("#contentMelding").html(strHTML);
			$(document).ready(function() { $('#meldingDetail').foundation('reveal', 'open'); });
			}
		});
};

function add_specialisatie(){
		var currentUser = document.getElementById('user').value;
		var value = document.getElementById('value_specialisatie').value;
		var branche = document.getElementById('branche').value;
		$.ajax({
		type: 'get',
		url: '../API/addSpecialisatie.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
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

function panelNieuwsbrief() {
	var strHTML = "";
	strHTML += '<form method="post" action="">';
	strHTML += '<input type="file" name="nieuwsbrief" />';
	strHTML += '<input type="submit" name="uploadNieuwsbrief" />';
	strHTML += '</form>';
	$(".content_berichten").html(strHTML)	
}

function panelBericht(){
		$.ajax({
		type: 'get',
		url: 'jsonRequests/loadAlleUsers.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		success: function(data) {
			console.log(data);
			var i, j, strHTMLusers = ""; // data wordt weer opgehaald en geplaatst in de string.
			for (i = 0; i < data.length; i += 1) {
			strHTMLusers += "<option value='"+data[i]['userID']+"'>"+data[i]['username']+ "</option>";
			}
			var strFORM = '<form id="sendmsg"><label>Onderwerp</label><input type="text" name="input_send_subject"/><label>Aan</label><select id="select_klant" name="input_send_klant"></select><label>Bericht</label><textarea style="height:100px;" name="input_send_msg"></textarea></form><a href="#" onclick="sendMSG();" class="small button secondary">Versturen</a>'
			$(".content_berichten").html(strFORM); // string wordt in het element met ID contentPage geplaatst.
			$("#select_klant").html(strHTMLusers); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function sendMSG(){
	var userid = document.getElementsByName('input_send_klant')[0].value;
	var onderwerp = document.getElementsByName('input_send_subject')[0].value;
	var bericht = document.getElementsByName('input_send_msg')[0].value;
	$.ajax({
		type: 'get',
		url: 'jsonRequests/send_msg.php',
		data: {u:userid, onderwerp:onderwerp, bericht:bericht}
	});
	document.getElementById("sendmsg").reset();
	alert('Bericht is succesvol verstuurd');
	
}


function panelOfferte(){
		$.ajax({
		type: 'get',
		url: 'jsonRequests/loadOffertes.php', //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			strHTML += "<table><th>Offerte ID</th><th>Bedrijf</th><th>Branche</th><th>Consumer Email</th><th>Offerte omschrijving</th>"
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<tr><td>" + data[i]['offerte_id'] + "</td>";
			strHTML += "<td>" + data[i]['bedrijfsnaam'] + "</td>";
			strHTML += "<td>" + data[i]['branchenaam'] + "</td>";
			strHTML += "<td>" + data[i]['consumermail'] + "</td>";
			strHTML += "<td>" + data[i]['omschrijving'] + "</td></tr>";
			}
			strHTML += "</table>"
			$(".content_berichten").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function loadOfferte(){
		var currentUser = document.getElementById('user').value;
		$.ajax({
		type: 'get',
		url: 'includes/loadOffertes_bedrijf.php?u='+currentUser, //in dit bestand staat een php variable dat de ID ophaalt. Met het ID kan een query uitgevoerd worden dat de content van de page ID ophaalt.
		success: function(data) {
			var i, j, strHTML = ""; // data wordt weer opgehaald en geplaatst in de string.
			strHTML += "<table><th>unique id</th><th>Email Consument</th><th>Vraag van Consument</th>"
			for (i = 0; i < data.length; i += 1) {
			strHTML += "<tr><td>" + data[i]['offerte_id'] + "</td>";
			strHTML += "<td>" + data[i]['consumermail'] + "</td>";
			strHTML += "<td>" + data[i]['omschrijving'] + "</td>";
			strHTML += "<td><a href='#' onclick='reageer_offerte("+data[i]['offerte_id']+")'>Reageren</a></td></tr>";
			}
			strHTML += "</table>"
			$("#loadOffertes").html(strHTML); // string wordt in het element met ID contentPage geplaatst.
			}
		});
};

function request_reset_password(){
	var email = document.getElementsByName('emailF')[0].value;
	alert(email);	
	$.ajax({
		type: 'get',
		url: 'includes/check_user_exist.php?e='+email,
		succes: function(data) {
			if (data.lengt > 0){
				document.getElementById("user_error_U").style.display = "none"; 
				$.ajax({
					type: 'get',
					url: 'includes/send_reset_mail.php?e='+email
					});
				$('#wachtwoordVergeten').trigger('reveal:close');		
			}
			else{
				document.getElementById("user_error_U").style.display = "block"; 	
			}
		}
	});
}
