<?php
error_reporting(0);

	if($_POST['submit'] != ""){
		$plot = $_POST['plot'];
		$titlefilm = $_POST['titlefilm'];
		$orititle = $_POST['orititle'];
		$genre = $_POST['genre'];
		$director = $_POST['director'];
		$writer = $_POST['writer'];
		$actors = $_POST['actors'];
		$network = $_POST['network'];
		$eps = $_POST['idmuvi-core-numberepisode-value'];
		$release = $_POST['idmuvi-core-released-value'];
		$lastrelease = $_POST['idmuvi-core-last-air-value'];
		$runtime = $_POST['idmuvi-core-runtime-value'];
		$rating = $_POST['idmuvi-core-tmdbrating-value'];
		$votes = $_POST['idmuvi-core-tmdbvotes-value'];
		$languange = $_POST['languange'];
		$country = $_POST['country'];
		$youtube = $_POST['idmuvi-core-trailer-value'];
		$poster = $_POST['idmuvi-core-poster-value'];

	}
?>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
			<script type="text/javascript">
				(function( $ ) {
					'use strict';

					/**
					 * From this point every thing related to metabox
					 */
					$('document').ready(function(){
						// Start uploader
						$('.muvipro-metaposer-browse').on('click', function (event) {
							event.preventDefault();

							var self = $(this);

							// Create the media frame.
							var file_frame = wp.media.frames.file_frame = wp.media({
								title: self.data('uploader_title'),
								button: {
									text: self.data('uploader_button_text'),
								},
								multiple: false
							});

							file_frame.on('select', function () {
								var attachment = file_frame.state().get('selection').first().toJSON();
								self.prev('.muvipro-metaposer-url').val(attachment.url).change();
							});

							// Finally, open the modal
							file_frame.open();
						});


						// Start grabbing from tmdb using API
						$('input[name=idmuvi-ret-gmr-button]').click(function() {

							var valTMDBid = $('input[name=tmdbID]').get(0).value;
							var languange = "&language=en-US&include_image_language=en-US,null";
							var apikey = "&api_key=cad79d8fbd50ef9cc78bb8ac8f8f74e8";
							var target = document.URL;
							var isoCountries = {'AF':'Afghanistan','AX':'Aland Islands','AL':'Albania','DZ':'Algeria','AS':'American Samoa','AD':'Andorra','AO':'Angola','AI':'Anguilla','AQ':'Antarctica','AG':'Antigua And Barbuda','AR':'Argentina','AM':'Armenia','AW':'Aruba','AU':'Australia','AT':'Austria','AZ':'Azerbaijan','BS':'Bahamas','BH':'Bahrain','BD':'Bangladesh','BB':'Barbados','BY':'Belarus','BE':'Belgium','BZ':'Belize','BJ':'Benin','BM':'Bermuda','BT':'Bhutan','BO':'Bolivia','BA':'Bosnia And Herzegovina','BW':'Botswana','BV':'Bouvet Island','BR':'Brazil','IO':'British Indian Ocean Territory','BN':'Brunei Darussalam','BG':'Bulgaria','BF':'Burkina Faso','BI':'Burundi','KH':'Cambodia','CM':'Cameroon','CA':'Canada','CV':'Cape Verde','KY':'Cayman Islands','CF':'Central African Republic','TD':'Chad','CL':'Chile','CN':'China','CX':'Christmas Island','CC':'Cocos (Keeling) Islands','CO':'Colombia','KM':'Comoros','CG':'Congo','CD':'Congo, Democratic Republic','CK':'Cook Islands','CR':'Costa Rica','CI':'Cote D\'Ivoire','HR':'Croatia','CU':'Cuba','CY':'Cyprus','CZ':'Czech Republic','DK':'Denmark','DJ':'Djibouti','DM':'Dominica','DO':'Dominican Republic','EC':'Ecuador','EG':'Egypt','SV':'El Salvador','GQ':'Equatorial Guinea','ER':'Eritrea','EE':'Estonia','ET':'Ethiopia','FK':'Falkland Islands (Malvinas)','FO':'Faroe Islands','FJ':'Fiji','FI':'Finland','FR':'France','GF':'French Guiana','PF':'French Polynesia','TF':'French Southern Territories','GA':'Gabon','GM':'Gambia','GE':'Georgia','DE':'Germany','GH':'Ghana','GI':'Gibraltar','GR':'Greece','GL':'Greenland','GD':'Grenada','GP':'Guadeloupe','GU':'Guam','GT':'Guatemala','GG':'Guernsey','GN':'Guinea','GW':'Guinea-Bissau','GY':'Guyana','HT':'Haiti','HM':'Heard Island & Mcdonald Islands','VA':'Holy See (Vatican City State)','HN':'Honduras','HK':'Hong Kong','HU':'Hungary','IS':'Iceland','IN':'India','ID':'Indonesia','IR':'Iran, Islamic Republic Of','IQ':'Iraq','IE':'Ireland','IM':'Isle Of Man','IL':'Israel','IT':'Italy','JM':'Jamaica','JP':'Japan','JE':'Jersey','JO':'Jordan','KZ':'Kazakhstan','KE':'Kenya','KI':'Kiribati','KR':'Korea','KW':'Kuwait','KG':'Kyrgyzstan','LA':'Lao People\'s Democratic Republic','LV':'Latvia','LB':'Lebanon','LS':'Lesotho','LR':'Liberia','LY':'Libyan Arab Jamahiriya','LI':'Liechtenstein','LT':'Lithuania','LU':'Luxembourg','MO':'Macao','MK':'Macedonia','MG':'Madagascar','MW':'Malawi','MY':'Malaysia','MV':'Maldives','ML':'Mali','MT':'Malta','MH':'Marshall Islands','MQ':'Martinique','MR':'Mauritania','MU':'Mauritius','YT':'Mayotte','MX':'Mexico','FM':'Micronesia, Federated States Of','MD':'Moldova','MC':'Monaco','MN':'Mongolia','ME':'Montenegro','MS':'Montserrat','MA':'Morocco','MZ':'Mozambique','MM':'Myanmar','NA':'Namibia','NR':'Nauru','NP':'Nepal','NL':'Netherlands','AN':'Netherlands Antilles','NC':'New Caledonia','NZ':'New Zealand','NI':'Nicaragua','NE':'Niger','NG':'Nigeria','NU':'Niue','NF':'Norfolk Island','MP':'Northern Mariana Islands','NO':'Norway','OM':'Oman','PK':'Pakistan','PW':'Palau','PS':'Palestinian Territory, Occupied','PA':'Panama','PG':'Papua New Guinea','PY':'Paraguay','PE':'Peru','PH':'Philippines','PN':'Pitcairn','PL':'Poland','PT':'Portugal','PR':'Puerto Rico','QA':'Qatar','RE':'Reunion','RO':'Romania','RU':'Russian Federation','RW':'Rwanda','BL':'Saint Barthelemy','SH':'Saint Helena','KN':'Saint Kitts And Nevis','LC':'Saint Lucia','MF':'Saint Martin','PM':'Saint Pierre And Miquelon','VC':'Saint Vincent And Grenadines','WS':'Samoa','SM':'San Marino','ST':'Sao Tome And Principe','SA':'Saudi Arabia','SN':'Senegal','RS':'Serbia','SC':'Seychelles','SL':'Sierra Leone','SG':'Singapore','SK':'Slovakia','SI':'Slovenia','SB':'Solomon Islands','SO':'Somalia','ZA':'South Africa','GS':'South Georgia And Sandwich Isl.','ES':'Spain','LK':'Sri Lanka','SD':'Sudan','SR':'Suriname','SJ':'Svalbard And Jan Mayen','SZ':'Swaziland','SE':'Sweden','CH':'Switzerland','SY':'Syrian Arab Republic','TW':'Taiwan','TJ':'Tajikistan','TZ':'Tanzania','TH':'Thailand','TL':'Timor-Leste','TG':'Togo','TK':'Tokelau','TO':'Tonga','TT':'Trinidad And Tobago','TN':'Tunisia','TR':'Turkey','TM':'Turkmenistan','TC':'Turks And Caicos Islands','TV':'Tuvalu','UG':'Uganda','UA':'Ukraine','AE':'United Arab Emirates','GB':'United Kingdom','US':'USA','UM':'United States Outlying Islands','UY':'Uruguay','UZ':'Uzbekistan','VU':'Vanuatu','VE':'Venezuela','VN':'Viet Nam','VG':'Virgin Islands, British','VI':'Virgin Islands, U.S.','WF':'Wallis And Futuna','EH':'Western Sahara','YE':'Yemen','ZM':'Zambia','ZW':'Zimbabwe'}
							var isoLanguages= {ab:"Abkhazian",aa:"Afar",af:"Afrikaans",ak:"Akan",sq:"Albanian",am:"Amharic",ar:"Arabic",an:"Aragonese",hy:"Armenian",as:"Assamese",av:"Avaric",ae:"Avestan",ay:"Aymara",az:"Azerbaijani",bm:"Bambara",ba:"Bashkir",eu:"Basque",be:"Belarusian",bn:"Bengali",bh:"Bihari languages",bi:"Bislama",bs:"Bosnian",br:"Breton",bg:"Bulgarian",my:"Burmese",ca:"Catalan, Valencian",km:"Central Khmer",ch:"Chamorro",ce:"Chechen",ny:"Chichewa, Chewa, Nyanja",zh:"Chinese",cu:"Church Slavonic, Old Bulgarian, Old Church Slavonic",cv:"Chuvash",kw:"Cornish",co:"Corsican",cr:"Cree",hr:"Croatian",cs:"Czech",da:"Danish",dv:"Divehi, Dhivehi, Maldivian",nl:"Dutch, Flemish",dz:"Dzongkha",en:"English",eo:"Esperanto",et:"Estonian",ee:"Ewe",fo:"Faroese",fj:"Fijian",fi:"Finnish",fr:"French",ff:"Fulah",gd:"Gaelic, Scottish Gaelic",gl:"Galician",lg:"Ganda",ka:"Georgian",de:"German",ki:"Gikuyu, Kikuyu",el:"Greek (Modern)",kl:"Greenlandic, Kalaallisut",gn:"Guarani",gu:"Gujarati",ht:"Haitian, Haitian Creole",ha:"Hausa",he:"Hebrew",hz:"Herero",hi:"Hindi",ho:"Hiri Motu",hu:"Hungarian",is:"Icelandic",io:"Ido",ig:"Igbo",id:"Indonesian",ia:"Interlingua (International Auxiliary Language Association)",ie:"Interlingue",iu:"Inuktitut",ik:"Inupiaq",ga:"Irish",it:"Italian",ja:"Japanese",jv:"Javanese",kn:"Kannada",kr:"Kanuri",ks:"Kashmiri",kk:"Kazakh",rw:"Kinyarwanda",kv:"Komi",kg:"Kongo",ko:"Korean",kj:"Kwanyama, Kuanyama",ku:"Kurdish",ky:"Kyrgyz",lo:"Lao",la:"Latin",lv:"Latvian",lb:"Letzeburgesch, Luxembourgish",li:"Limburgish, Limburgan, Limburger",ln:"Lingala",lt:"Lithuanian",lu:"Luba-Katanga",mk:"Macedonian",mg:"Malagasy",ms:"Malay",ml:"Malayalam",mt:"Maltese",gv:"Manx",mi:"Maori",mr:"Marathi",mh:"Marshallese",ro:"Moldovan, Moldavian, Romanian",mn:"Mongolian",na:"Nauru",nv:"Navajo, Navaho",nd:"Northern Ndebele",ng:"Ndonga",ne:"Nepali",se:"Northern Sami",no:"Norwegian",nb:"Norwegian Bokmål",nn:"Norwegian Nynorsk",ii:"Nuosu, Sichuan Yi",oc:"Occitan (post 1500)",oj:"Ojibwa",or:"Oriya",om:"Oromo",os:"Ossetian, Ossetic",pi:"Pali",pa:"Panjabi, Punjabi",ps:"Pashto, Pushto",fa:"Persian",pl:"Polish",pt:"Portuguese",qu:"Quechua",rm:"Romansh",rn:"Rundi",ru:"Russian",sm:"Samoan",sg:"Sango",sa:"Sanskrit",sc:"Sardinian",sr:"Serbian",sn:"Shona",sd:"Sindhi",si:"Sinhala, Sinhalese",sk:"Slovak",sl:"Slovenian",so:"Somali",st:"Sotho, Southern",nr:"South Ndebele",es:"Spanish, Castilian",su:"Sundanese",sw:"Swahili",ss:"Swati",sv:"Swedish",tl:"Tagalog",ty:"Tahitian",tg:"Tajik",ta:"Tamil",tt:"Tatar",te:"Telugu",th:"Thai",bo:"Tibetan",ti:"Tigrinya",to:"Tonga (Tonga Islands)",ts:"Tsonga",tn:"Tswana",tr:"Turkish",tk:"Turkmen",tw:"Twi",ug:"Uighur, Uyghur",uk:"Ukrainian",ur:"Urdu",uz:"Uzbek",ve:"Venda",vi:"Vietnamese",vo:"Volap_k",wa:"Walloon",cy:"Welsh",fy:"Western Frisian",wo:"Wolof",xh:"Xhosa",yi:"Yiddish",yo:"Yoruba",za:"Zhuang, Chuang",zu:"Zulu"};
							// Request Using getJSON
							$.getJSON( "https://api.themoviedb.org/3/tv/" + valTMDBid + "?append_to_response=videos,keywords,images,credits" + languange + apikey, function(json) {
								$.each(json, function(key, val) {
									/* Title */
									var valTitle = "";
									if(key == "name"){
										valTitle+= ""+val+"";
										$('input[name=titlefilm]').val(valTitle);
									}
									
									/* Original Name */
									var valOriTitle = "";
									if(key == "original_name"){
										valOriTitle+= ""+val+"";
										$('input[name=orititle]').val(valOriTitle);
									}
									
									/* Plot or description */
									var valDesc = "";
									if(key == "overview"){
										var output = val.replace(/\n/g, "<br />");
										valDesc+= ""+output+"";

												$("input[name=plot]").val(valDesc);
											
										
									}

									/* Director */
									var valDirector = "";
									if(key == "created_by"){
										$.each(json.created_by, function(i, item) {
											valDirector += "" + item.name + ", ";
											return i<1;
										});
										$('input[name=director]').val( valDirector );
	
									}
									
									/* Writer */
									var valWriter = "";
									if(key == "credits"){
										$.each(json.credits.crew, function(i, item) {
											valWriter += "" + item.name + ", ";
											return i<1;
										});
										$('input[name=writer]').val( valWriter );
									}
									
									/* TMDB Rating */
									var valTmdbRating = "";
									if(key == "vote_average"){
										valTmdbRating+= ""+val+"";
										$('input[name=idmuvi-core-tmdbrating-value]').val(valTmdbRating);
									}

									/* TMDB Vote */
									var valTmdbVote = "";
									if(key == "vote_count"){
										valTmdbVote+= ""+val+"";
										$('input[name=idmuvi-core-tmdbvotes-value]').val(valTmdbVote);
									}

									/* Runtime */
									var valRunTime = "";
									if(key == "episode_run_time"){
										// Remove min value
										valRunTime+= ""+val+"";
										$('input[name=idmuvi-core-runtime-value]').val(valRunTime);
									}

									/* Number Episode */
									var valNumEpisode = "";
									if(key == "number_of_episodes"){
										valNumEpisode+= ""+val+"";
										$('input[name=idmuvi-core-numberepisode-value]').val(valNumEpisode);
									}
									
									/* Bahasa */
									var valBahasa = "";
									if(key == "languages"){
										$.each(json.languages, function(i, item) {
											if (isoLanguages.hasOwnProperty(item)) {
												// add commas separator using country name
												valBahasa += "" + isoLanguages[item] + ", ";
											} else {
												// add commas separator
												valBahasa += "" + item + ", ";
											}
										});										
										//valBahasa+= ""+val+"";
										$('input[name=languange]').val(valBahasa);
									}									

									/* Date Release and Year Release */
									var valRelease = "";
									var valYear = "";
									if(key == "first_air_date"){
										var m_names = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
										var d = new Date(val);
										var curr_date = d.getDate();
										var curr_month = d.getMonth();
										var curr_year = d.getFullYear();
										// Remove min value
										valRelease+= curr_date + " " + m_names[curr_month] + " " + curr_year;
										// Add Only Year
										valYear+= curr_year;
										$('input[name=idmuvi-core-released-value]').val(valRelease);
										$('input[name=idmuvi-core-year-value]').val(valYear);
									}

									var valLastiar = "";
									if(key == "last_air_date"){
										var m_names = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
										var d = new Date(val);
										var curr_date = d.getDate();
										var curr_month = d.getMonth();
										var curr_year = d.getFullYear();
										// Remove min value
										valLastiar+= curr_date + " " + m_names[curr_month] + " " + curr_year;
										// Add Only Year
										valYear+= curr_year;
										$('input[name=idmuvi-core-last-air-value]').val(valLastiar);
									}

									/* Genres since wp v 4.8 this function change with tag. and add new jquery function, see below
									var valGenr = "";
									var valGenr1 = "";
									if(key == "genres"){
										$.each( json.genres, function( i, item ) {
											valGenr += "" + item.name + ", ";
											valGenr1 = item.name;
											$('input[name=newcategory]').val( valGenr1 );
											$('#category-add-submit').trigger('click');
											$('#category-add-submit').prop("disabled", false);
											$('input[name=newcategory]').val("");
										});
									} */

									var valGenr = "";
									if(key == "genres"){
									$.each(json.genres, function(i, item) {
											valGenr += "" + item.name + ", ";
											return i<2;
										});
											$('input[name=genre]').val( valGenr );

									}	


									/* Country */
									var valCountry = "";
									if(key == "origin_country"){
										$.each(json.origin_country, function(i, item) {
											if (isoCountries.hasOwnProperty(item)) {
												// add commas separator using country name
												valCountry += "" + isoCountries[item] + ", ";
											} else {
												// add commas separator
												valCountry += "" + item + ", ";
											}
										});
										$('input[name=country]').val( valCountry );
									}



									/* Cast */
									var valCast = "";
									if(key == "credits"){
										$.each(json.credits.cast, function(i, item) {
											// add commas separator
											valCast += "" + item.name + ", ";
											return i<2;
										});
										$('input[name=actors]').val( valCast );
									}



									/* Network */
									var valNetwork = "";
									if(key == "networks"){
										$.each(json.networks, function(i, item) {
											valNetwork += "" + item.name + ", ";
											return i<2;
										});
										$('input[name=network]').val( valNetwork );
									}

									/* Trailer and only one video */
									var valVidTrailer = "";
									if(key == "videos"){
										$.each(json.videos.results, function(i, item) {
											// get index only first object json
											if( i == 0 ) {
												// add commas separator
												valVidTrailer += "" + item.key + "";
											}
										});
										$("input[name=idmuvi-core-trailer-value]").val( valVidTrailer );
									}



									/* Image and automatic upload via ajax */
									var valImg = "";
									if(key == "poster_path"){
										valImg+= "https://image.tmdb.org/t/p/w300"+val+"";
										// Insert image using ajax

											$("input[name=idmuvi-core-poster-value]").val(valImg);
										
									}

									/* TMDB ID */
									var valTmdbID = "";
									if(key == "id"){
										// Remove min value
										valTmdbID+= ""+val+"";
										$('input[name=idmuvi-core-tmdbid-value]').val(valTmdbID);
									}
									
									
									
									
								}); 
							});

						});



					});
				})( jQuery );
			</script>
		<div id="col-container" style="width:50%; float:left;">
			<div class="metabox-holder idmuvi-core-metabox-common-fields">

				<h3 class="nav-tab-wrapper">
					<a class="nav-tab nav-tab-active" id="muvi-settings-tab" href="/tmdb.php">Back To Movie</a>
				</h3>

				<div id="muvi-settings" class="group">


								<p>
									<label for="idmuvi-core-id"><strong>Enter TMDB ID:</strong></label>
									<input type="text" value="" class="regular-text display-block" name="tmdbID" id="idmuvi-core-id" />
									<input class="button button-primary display-block" type="button" name="idmuvi-ret-gmr-button" id="idmuvi-core-id-submit" value="Retrieve Information" />
									
								</p>
<form action="" method="POST">
					<p>
						<label for="opsi-title"><strong>Plot:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="plot" value="" />

					</p>
					<p>
						<label for="opsi-title"><strong>Drama Title:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="titlefilm" value="" />

					</p>
					<p>
						<label for="opsi-title"><strong>Original Name:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="orititle" value="" />

					</p>
					<p>
						<label for="opsi-title"><strong>Genres:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="genre" value="" />

					</p>
					<p>
						<label for="opsi-title"><strong>Director:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="director" value="" />

					</p>
					<p>
						<label for="opsi-title"><strong>Writter:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="writer" value="" />

					</p>
					<p>
						<label for="opsi-title"><strong>Actors:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="actors" value="" />

					</p>
					<p>
						<label for="opsi-title"><strong>Networks:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-title" name="network" value="" />

					</p>
					<p>
						<label for="opsi-episode"><strong>Number Of Episode:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-episode" name="idmuvi-core-numberepisode-value" value="" />

					</p>					
					<p>
						<label for="opsi-release"><strong>Relase Date:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-release" name="idmuvi-core-released-value" value="" />

					</p>


					<p>
						<label for="opsi-air"><strong>Last Air Date (TMDB):</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-air" name="idmuvi-core-last-air-value" value="" />

					</p>
					<p>
						<label for="opsi-runtime"><strong>Runtime in minutes (TMDB):</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-runtime" name="idmuvi-core-runtime-value" value="" />

					</p>
					<p>
						<label for="opsi-rating"><strong>TMDB Rating:</strong></label>
						<input type="text" style="max-width:80px" class="regular-text" id="opsi-rating" name="idmuvi-core-tmdbrating-value" value="" /> /
						<input type="text" style="max-width:120px" class="regular-text" id="opsi-votes" name="idmuvi-core-tmdbvotes-value" value="" />

					</p>
					<p>
						<label for="opsi-year"><strong>Languange:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-year" name="languange" value="" />

					</p>
					<p>
						<label for="opsi-year"><strong>Country:</strong></label>
						<input type="text" class="regular-text display-block" id="opsi-year" name="country" value="" />

					</p>
					<p>
						<label for="opsi-trailer"><strong>Youtube ID For Trailer (TMDB):</strong></label>
						<input type="text" class="regular-text display-block" name="idmuvi-core-trailer-value" id="opsi-trailer" value="" />

					</p>

					<p>
						<label for="opsi-imageposter"><strong>Poster Url (TMDB):</strong></label>
						<input type="text" class="regular-text display-block muvipro-metaposer-url" name="idmuvi-core-poster-value" id="opsi-imageposter" value="" />


					</p>

					<p>
						<label for="opsi-tmdbid"><strong>tmdbID:</strong></label>
						<input type="text" style="max-width:120px" class="regular-text display-block" id="opsi-tmdbid" name="idmuvi-core-tmdbid-value" value="" />

					</p>
					<input type="submit" value="GET" name="submit" />
					</form>
				</div>
			</div>
		</div>
		<div id="col-container" style="width:50%; float:left;">
		<?php
if(!empty($plot)){
echo 'Plot: '.$plot;
echo '<br>Original Title: '.$orititle;
echo '<br>Title: '.$titlefilm;
echo '<br>Genre: '.$genre;
echo '<br>Writer: '.$writer;
echo '<br>Director: '.$director;
echo '<br>Actors: '.$actors;
echo '<br>Runtime: '.$runtime;
echo '<br>Number Eps: '.$eps;
echo '<br>Country: '.$country;
echo '<br>Language: '.$languange;
echo '<br>Release Date: '.$release.' - '.$lastrelease;
echo '<br>Networks: '.$network;
echo '<br>TmdbRating: '.$rating.'/'.$votes;
echo '<br>Trailer: '.$youtube;
echo '<img src="'.$poster.'" width="180px" class="img-responsive" style="display:inherit !important;">';
echo 'script by <a href="https://serialdrakor.xyz"><SerialDrakor class="github io">SerialDrakor</SerialDrakor></a>'
}
		?>
		</div>
</body>
</html>
