// Jadwal Sholat
function jadwalsholat(options){

	var tuning = {
		tuneImsak 	: 0,
		tuneFajr 		: 0,
		tuneSunrise : 0,
		tuneDhuhr 	: 0,
		tuneAsr 		: 0,
		tuneMaghrib : 0,
		tuneIsha 		: 0
	}
	t = $.extend(tuning, options);

	var duration = {
		durasiAzan 					:1,
		durasiSholat 				:1,

		durasiQomatFajr 		:1,
		durasiQomatDhuhur 	:1,
		durasiQomatAsr 			:1,
		durasiQomatMaghrib	:1,
		durasiQomatIsha 		:1
	}
	d = $.extend(duration, options);

	var adjust = {
		adjustHijri : 0
	}
	a = $.extend(adjust, options);

	// var hijriDate = writeIslamicDate(a.adjustHijri);

	moment.locale('id',{
		weekdays : "Ahad_Senin_Selasa_Rabu_Kamis_Jum'at_Sabtu".split('_')
	});
	var hijriDate = moment(date).add(a.adjustHijri, 'd').format('iD iMMMM iYYYY');
  
  // Initial times
  var today = new Date();
	
	// Setting prayer time
	prayTimes.setMethod('MWL');
	prayTimes.tune({ imsak: t.tuneImsak, fajr: t.tuneFajr, sunrise: t.tuneSunrise, dhuhr: t.tuneDhuhr, asr: t.tuneAsr, maghrib: t.tuneMaghrib, isha: t.tuneIsha });
	var Ptimes = prayTimes.getTimes(today, [-6.2, 106.8], 7);

	// Generate Clock
  var now = today.getTime();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  h = checkTime(h);
  m = checkTime(m);
  s = checkTime(s);
  
  var clock = h + ":" + m + ":" + s;
  $('#clock').html(clock);

	// Days name
  var day = today.getDay();
	var dayarr =["Ahad","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
	var day_name = dayarr[day];
	
	// Date
  var date = today.getDate();

	// Month
	var month = today.getMonth();
	var montharr =["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	var month_name = montharr[month];

	// Year
	var year = today.getFullYear();
	
	// Print out to HTML
	$('#day').text( day_name );
	$('#date').text( date + " " + month_name + " " + year );
	$('#hidjriDate').text(hijriDate + ' H');
	
	$('#t_imsak').text(Ptimes.imsak);
	$('#t_subuh').text(Ptimes.fajr);
	$('#t_zuhur').text(Ptimes.dhuhr);
	$('#t_asar').text(Ptimes.asr);
	$('#t_magrib').text(Ptimes.maghrib);
	$('#t_isya').text(Ptimes.isha);

  // Countdown
  var awalwaktu = "00:00";
	var akhirwaktu = "23:59";
	var todayDate = year + '/' + (month+1) + '/' + date;
	var tomorrowDate = year + '/' + (month+1) + '/' + (date+1);
	var countDownDate;
	var timeName;

	if (clock >= awalwaktu && clock < Ptimes.fajr) {
		$('#to_prayer').text('Subuh');
		countDownDate = new Date(todayDate + ' ' + Ptimes.fajr + ':00').getTime();
	}
	if (clock >= Ptimes.fajr && clock < Ptimes.dhuhr) {
		$('#to_prayer').text('Zuhur');
		timeName = 'Subuh';
		alertTime(Ptimes.fajr,d.durasiQomatFajr,timeName);
		countDownDate = new Date(todayDate + ' ' + Ptimes.dhuhr + ':00').getTime();
	}
	if (clock >= Ptimes.dhuhr && clock < Ptimes.asr) {
		$('#to_prayer').text('Asar');
		timeName = 'Zuhur';
		alertTime(Ptimes.dhuhr,d.durasiQomatDhuhur,timeName);
		countDownDate = new Date(todayDate + ' ' + Ptimes.asr + ':00').getTime();
	}
	if (clock >= Ptimes.asr && clock < Ptimes.maghrib) {
		$('#to_prayer').text('Magrib');
		timeName = 'Asar';
		alertTime(Ptimes.asr,d.durasiQomatAsr,timeName);
		countDownDate = new Date(todayDate + ' ' + Ptimes.maghrib + ':00').getTime();
	}
	if (clock >= Ptimes.maghrib && clock < Ptimes.isha) {
		$('#to_prayer').text('Isya');
		timeName = 'Magrib';
		alertTime(Ptimes.maghrib,d.durasiQomatMaghrib,timeName);
		countDownDate = new Date(todayDate + ' ' + Ptimes.isha + ':00').getTime();
	}
	if (clock >= Ptimes.isha && clock < akhirwaktu) {
    $('#to_prayer').text('Subuh');
		timeName = 'Isya';
		alertTime(Ptimes.isha,d.durasiQomatIsha,timeName);
		countDownDate = new Date( tomorrowDate + ' ' + Ptimes.fajr + ':00').getTime();
	}

	/* == For Testing == */

	// var Ptimestest = '08:32';
	// var durasiQomatTest = 1;
	// var timeName = 'Test';

	// if (clock >= Ptimestest && clock < Ptimes.dhuhr) {
	// 	$('#to_prayer').text('Zuhur');
	// 	timeName = 'Test';
	// 	alertTime(Ptimestest,durasiQomatTest,timeName);
	// 	countDownDate = new Date( tomorrowDate + ' ' + Ptimes.dhuhr + ':00').getTime();
	// }

	/* == End Testing == */

	var distance = countDownDate - now;
	$('#counter').text(checkTime(getTimeHour(distance)) + ':' + checkTime(getTimeMin(distance)) + ':' + checkTime(getTimeSec(distance)));

	// Alert Function
	function alertTime(azanTime, qomatDuration, timeName){
		var azanAlert = new Date( todayDate + ' ' + azanTime + ':00' ).getTime();
		var qomatAlert = new Date( azanAlert + ( d.durasiAzan * 60000 ) );
		qomatAlert = checkTime(qomatAlert.getHours()) + ':' + checkTime(qomatAlert.getMinutes());
		var sholatStart = new Date( azanAlert + ( ( d.durasiAzan + qomatDuration ) * 60000 ) );
		sholatStart = checkTime(sholatStart.getHours()) + ':' + checkTime(sholatStart.getMinutes());
		var endSholat = new Date( azanAlert + ( ( d.durasiAzan + qomatDuration + d.durasiSholat ) * 60000 ) );
		endSholat = checkTime(endSholat.getHours()) + ':' + checkTime(endSholat.getMinutes());

		if(clock >= azanTime + ':00' && clock < qomatAlert + ':00' ) {
			$('#azan_time').text(timeName);
			$('#modal_azan').fadeIn(200);
			$('.overlay').fadeIn(500);
		} else if ( clock >= qomatAlert + ':00' && clock < sholatStart ) {
			$('#modal_azan').hide();
			iqomah(sholatStart);
			$('#modal_iqomah').fadeIn(200);
		} else if ( clock >= sholatStart + ':00' && clock < endSholat ) {
			$('#modal_iqomah').hide();
			$('#modal_sholat').fadeIn(200);
		} else {
			$('#modal_sholat').fadeOut(200);
			$('.overlay').fadeOut(500);
			// console.log(timeName);
		}
	}

	// Countdown Iqomah
	function iqomah(endQomat) {
		var endQomat = new Date(todayDate + ' ' + endQomat + ':00').getTime();
		var outQomat = endQomat - now;
		// console.log(checkTime(getTimeMin(outQomat)) + ':' + checkTime(getTimeSec(outQomat)));
		$('#iqomah_countdown').text(checkTime(getTimeMin(outQomat)) + ':' + checkTime(getTimeSec(outQomat)));

		if( getTimeMin(outQomat) == 0 && getTimeSec(outQomat) < 11 && getTimeSec(outQomat) > 0 ) {
			$('#playAudio1').trigger('click');
		} else if( getTimeMin(outQomat) == 0 && getTimeSec(outQomat) == 0 ) {
			$('#playAudio2').trigger('click');
		}
	}

	// var hijridate = writeIslamicDate(0);

	var td = new Date(todayDate + ' ' + Ptimes.sunrise + ':00');
	var tDhuha = new Date(td.getTime() + (24 * 60000));
	// console.log(tDhuha);

	var copy_text = '[Waktu Shalat Hari Ini]<br>' +
	'_' + hijriDate + ' H_<br>' +
	day_name + ', ' + date + ' ' + month_name + ' ' + year + '<br><br>' +
	'```Subuh&nbsp;&nbsp;- ' + Ptimes.fajr + ' WIB ```<br>' +
	'<br>' +
	'```Syuruq&nbsp;- ' + Ptimes.sunrise + ' WIB ```<br>' +
	'<br>' +
	'```Dhuha&nbsp;&nbsp;- ' + checkTime(tDhuha.getHours()) + ':' + checkTime(tDhuha.getMinutes()) + ' WIB ```<br>' +
	'<br>' +
	'```Zuhur&nbsp;&nbsp;- ' + Ptimes.dhuhr + ' WIB ```<br>' +
	'<br>' +
	'```Asar&nbsp;&nbsp;&nbsp;- ' + Ptimes.asr + ' WIB ```<br>' +
	'<br>' +
	'```Magrib&nbsp;- ' + Ptimes.maghrib + ' WIB ```<br>' +
	'<br>' +
	'```Isya&nbsp;&nbsp; - ' + Ptimes.isha + ' WIB ```<br>' +
	'<br>' +
	'https://alhidayah.infodkm.com/';
	
	var copy_text_tg = '[Waktu Shalat Hari Ini]<br>' +
	'<i>' + hijriDate + ' H</i><br>' +
	day_name + ', ' + date + ' ' + month_name + ' ' + year + '<br><br>' +
	'<pre>Subuh&nbsp;&nbsp;- ' + Ptimes.fajr + ' WIB<br><br>' +
	'Syuruq&nbsp;- ' + Ptimes.sunrise + ' WIB<br><br>' +
	'Dhuha&nbsp;&nbsp;- ' + checkTime(tDhuha.getHours()) + ':' + checkTime(tDhuha.getMinutes()) + ' WIB<br><br>' +
	'Zuhur&nbsp;&nbsp;- ' + Ptimes.dhuhr + ' WIB<br><br>' +
	'Asar&nbsp;&nbsp;&nbsp;- ' + Ptimes.asr + ' WIB<br><br>' +
	'Magrib&nbsp;- ' + Ptimes.maghrib + ' WIB<br><br>' +
	'Isya&nbsp;&nbsp; - ' + Ptimes.isha + ' WIB</pre><br><br>' +

	'https://alhidayah.infodkm.com/';

	$('#pre_result').html(copy_text);
	$('#code').val( copy_text.replace(/&nbsp;/g, ' ').replace(/<br\s*[\/]?>/gi, "\n") );
	$('#code_tg').val( copy_text_tg.replace(/&nbsp;/g, ' ').replace(/<br\s*[\/]?>/gi, "\n") );

  // Run funciton
  var t = setTimeout(jadwalsholat, 1000, options);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};
  return i;
}

function getTimeDay(d) {
	var d = Math.floor(distance / (1000 * 60 * 60 * 24));
	return d;
}

function getTimeHour(h) {
	var h = Math.floor((h % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	return h;
}

function getTimeMin(m) {
	var m = Math.floor((m % (1000 * 60 * 60)) / (1000 * 60));
	return m;
}

function getTimeSec(s) {
	var s = Math.floor((s % (1000 * 60)) / 1000);
	return s;
}

function copyFunction() {
	var copyText = document.getElementById("code");
	copyText.select(); 
	copyText.setSelectionRange(0, 99999);
	document.execCommand("copy");
	copyText.blur();
	
	$('#report_message').show().html('<div class="alert alert-success">Copied!! <a class="float-right" href="javascript:;">&times;</a></div>').delay(2000).fadeOut();
}

$('#copy').click(function(){
	copyFunction();
});

$('.alert a.float-right').click(function(){
	$(this).parent().fadeOut();
});

var audio1 = document.getElementById("audio1");
function playAudio1() {
	audio1.play();
}
var audio2 = document.getElementById("audio2");
function playAudio2() {
	audio2.play();
}