

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/page.css">

	<script type="text/javascript" src="js/screenRework.js"></script>

	<script type="text/javascript">

		function limitchex(oCheckbox, limit) 
		{
			var el, i = 0, n = limit, oForm = oCheckbox.form;
			while (el = oForm.elements[i++])
			{
				if (el.className == 'limited' && el.checked)
					--n;
				if (n < 0)
				{
					// alert('Please select no more than ' + limit + ' checkboxes.')
					return false;
				}
			}
			return true;
		}

		const loadHTML = function (elements, el_ID) {
			

			    return new Promise((resolve, er)=>{

			    	var request = new XMLHttpRequest();
					request.open('GET', elements, true);

					request.onload = function() {
					  if (request.status >= 200 && request.status < 400) {
					    // Success!
					    var resp = request.responseText;
					    
					    el = document.getElementById(el_ID);

					    ;

					    resolve(el.innerHTML = resp);

					    } else {
			    			alert("on error load");

			  			}
					};

					request.onerror = function() {
					  alert("on error");
					};

					request.send();


			    });/////////////////



			 
		} ////////////////////////////


		const team = {

			player: {},
			opp: {},

			stage: 1,

			getOpp: function () {

				


				if (this.stage === 1){

					this.opp.eirika = chars.eirika;
					this.opp.florina = chars.florina;
					this.opp.empty1 = chars.empty1;

					mesa["player2"].lifes -= 1;
				}

				if (this.stage === 2){

					this.opp.joshua = chars.joshua;
					this.opp.lyn = chars.lyn;
					this.opp.guy = chars.guy;
				}

				if (this.stage === 3){

					this.opp.ephraim = chars.ephraim;
					this.opp.marth = chars.marth;
					this.opp.forde = chars.forde;
					
				}


				if (this.stage === 4){

					this.opp.oswin = chars.oswin;
					this.opp.hector = chars.hector;
					this.opp.bartre = chars.bartre;
				}

				if (this.stage >= 5){

					return drawData("PARABENS VC MATOU TODO MUNDO");
				}




			},

			getTeam: function (el) {


				

				let el_ID = el.getAttribute('id'); // eliwood

				let p = this.player;



				

				if (p.hasOwnProperty(el_ID)) {


					el.style.boxShadow = "black 0px 0px 1px 1px";
					return delete this.player[el_ID];
				};

				if (Object.getOwnPropertyNames(p).length >= 3) return alert("não pode passar de 3");

				el.style.boxShadow = "blue 0px 0px 10px 2px";
				this.player[el_ID] = chars[el_ID];


			},


			getFighter: function (el){

				let el_team = el.getAttribute('class'); // eliwood

				el_team = el_team.split(" ");


				el_ID = el_team[2];

				el_team[1] = el_team[1].substr( 0, el_team[1].length-1);


				let side = el_team[1] === "my-team" ? 1 : 2;

				let isLive = mesa["player"+side].characters
				[el_ID]["hp"+side];



				if (isLive <= 0) return alert("Unidade derrotada...");


				console.clear();

				if (el_team[1] === "my-team") {

					let fighterName = mesa.fight.atk;

					if (el_ID === fighterName) {


						el.style.boxShadow = "black 0px 0px 1px 1px";
						mesa.fight.atk = null;
						mesa.fight.by = null;
						return console.log(mesa.fight);
					};

					if (typeof fighterName === typeof el_ID) return alert("Selecione apenas um aliado");

					el.style.boxShadow = "red 0px 0px 10px 2px";
					mesa.fight.atk = el_ID;
					mesa.fight.by = "player1";
					return console.log(mesa.fight);

				}

				if (el_team[1] === "opponent") {

					let oppName = mesa.fight.dmg;

					if (el_ID === oppName) {


						el.style.boxShadow = "black 0px 0px 1px 1px";
						mesa.fight.dmg = null;
						return console.log(mesa.fight);
					};

					if (typeof oppName === typeof el_ID) return alert("Selecione apenas um inimigo");

					el.style.boxShadow = "red 0px 0px 10px 2px";
					mesa.fight.dmg = el_ID;
					return console.log(mesa.fight);


				}

				


			},

			fxSelector: function (){

				e = document.getElementById("opp").children;


				let timer = 1;

				

				fxIn = setInterval(_=>{

					if (timer === 1) color1 = "purple", color2 = "black", color3 = "black";
					if (timer === 2) color1 = "black", color2 = "purple", color3 = "black";
					if (timer === 3) color1 = "black", color2 = "black", color3 = "purple";

					e[0].style.boxShadow = `${color1} 0 0 10px 3px`;
					e[1].style.boxShadow = `${color2} 0 0 10px 3px`;
					e[2].style.boxShadow = `${color3} 0 0 10px 3px`;

					timer++;

					if (timer > 3) timer = 1;


				}, 100)

			},

			randomFight: function (){

				// pega a coleção de inimigos do p2
				let opp = Object.keys(mesa.player2.characters);
				let player = Object.keys(mesa.player1.characters);

				// random 0 up to 2
				let random = Math.floor(Math.random()*2.9);
				let random2 = Math.floor(Math.random()*2.9);


				let oppName = opp[random]; // get random colection char name
				let playerName = player[random2]; // get random colection char name

				// let side = el_team[1] === "my-team" ? 1 : 2;

				let isOpp_live = mesa["player2"].characters
				[oppName]["hp2"];

				while (isOpp_live <= 0) {

					if (isOpp_live <= 0) console.log(oppName, "ta morto");

					random = Math.floor(Math.random()*2.9);
					oppName = opp[random];
					isOpp_live = mesa["player2"].characters
					[oppName]["hp2"];

				}

				let isPlayer_live = mesa["player1"].characters
				[playerName]["hp1"];

				while (isPlayer_live <= 0) {

					if (isPlayer_live <= 0) console.log(playerName, "ta morto");

					random2 = Math.floor(Math.random()*2.9);
					playerName = player[random2];
					isPlayer_live = mesa["player1"].characters
					[playerName]["hp1"];

				}



				// if (isLive <= 0) return alert("Unidade derrotada...");

				let receive = [];
				opp.map((v, i)=>{

					let el = document.getElementsByClassName("opponent"+(i+1))[0];

					let el_team = el.getAttribute('class'); // eliwood

					el_team = el_team.split(" ");

					// console.log(el_team);

					if (oppName === el_team[2]) receive.push(oppName);

				});

				player.map((v, i)=>{

					let el = document.getElementsByClassName("my-team"+(i+1))[0];

					let el_team = el.getAttribute('class'); // eliwood

					el_team = el_team.split(" ");

					// console.log(el_team);

					if (playerName === el_team[2]) receive.push(playerName);

				});
				

				console.log("result:", receive[0], "VS", receive[1]);

				mesa.fight = { atk: receive[1] , dmg: receive[0] , by: "player1"};

				

			},

			

			start: function () {

				let p = this.player;
				if (!(Object.getOwnPropertyNames(p).length === 3)) return null;

				soundBox.battle();

				mesa.drawGame()
			}


		}

		const soundBox = {

			playingNow: null,

			battle: function (){

				const bgmFight = new Audio("files/bgm/critias15.mp3");

				this.playingNow = bgmFight;

				bgmFight.play();
				bgmFight.volume = 0.04;
				bgmFight.loop = true;

			},

			win: function (){

				const bgmWin = new Audio("files/bgm/win.mp3");

				this.playingNow = bgmWin;

				bgmWin.play();
				bgmWin.volume = 0.04;
				bgmWin.loop = true;

			}

			
		}
		
		const mesa = {

			player1: {
				lifes: 3, characters: null, control: 1
			},

			player2: {
				lifes: 3, characters: null, control: 2
			},
			cpu: {hp: 100, mt: 10, hit: 80, crit: 25, luck: 30, c:"CPU"},

			gameStart: false,
			gameOver: false,
			turn:1,
			time: 1,
			battleLock: false,

			fight: { atk: null, dmg: null, by: null }, // { atk: "erika", dmg: "berserker", by: "player1" }

			atkCount: 0,

			drawSceneLogo: _=>{

				document.getElementById("logo").style.background = 'url("files/Fire_Emblem_logov2.png")  center / 725px no-repeat';
				// document.getElementById("logo").style.backgroundSize = '400px';
				// document.getElementById("demo").style.backgroundRepeat = "no-repeat";
				document.getElementById("logo").style.height = "230px";

			},

			drawButtonStart: function (){

				let painel_buttons = document.getElementById("painel-buttons");

				painel_buttons.innerHTML = `<span style="background-color: #a4b6b9">Bem vindo ${this.yourNick}</span><button id="btn-start" onclick='mesa.startgame()'>Iniciar o jogo</button>`;

				let button = document.getElementById("btn-start");

				button.style = "background-color: #00ff4e; border: 3px double #04a034";

			},

			drawButtonNick: function(){

				let painel_buttons = document.getElementById("painel-buttons");

				painel_buttons.innerHTML = `<form method="post" action="${window.location.pathname}">`+
				`<input type="text" name="nick" placeholder="SEU NICK" /><br>`+ 
				`<input type="submit" value="CONFIRMAR" ></form>`;

				// onclick="mesa.registerNick('Stayson')"
			},

			yourNick: null,

			registerNick: function(name){

				this.yourNick = name;
				this.drawButtonStart();
				

			},

			startgame: function(){

				this.gameStart = true;
				this.drawGame();
			},

			

			dodge: async function(p, pos, trigger){

				const missAudio = new Audio("msc/Attack Miss 2.wav");

				return new Promise(resolve=>{
					setTimeout(_=>{
						resolve(
							{ p, pos, trigger, missAudio}
							);
					}, trigger);
				});

			},

			audio: async function(conflito){


				let audioFile;

				if (conflito.result === 1) audioFile = "msc/Attack Hit 1.wav";
				if (conflito.result === 2) audioFile = "msc/Attack Hit 3.wav";
				if (conflito.dodge === true) audioFile = "msc/Attack Miss 2.wav";

				const audio = new Audio(audioFile);

				audio.play();
				

			},

			hit: async function(p_damaged, p_atks, trigger){

				const hitAudio = new Audio("msc/Attack Hit 1.wav");

				return new Promise(resolve=>{
					setTimeout(_=>{
						resolve(
							{ p_damaged, p_atks, trigger, hitAudio}
							);
					}, trigger);
				});

			},

			atk: function(p){

				


				// return console.log(null);
				

				if (this.battleLock) return console.log("Espere a batalha acabar. . .");

				if (!this.gameStart) return this.drawData("<br>O JOGO ENCERROU");

				// 1 = player 1 //  0 = player 2
				// if () return console.log("")

				let conflito_result;
				if (p === 1 || p === 3) {

					

					if (p ===1)
					this.fight = { atk: this.fight.atk, dmg: this.fight.dmg, by: "player1" };

					if (p === 3) 
					this.fight = { atk: this.fight.dmg, dmg: this.fight.atk, by: "player1" };

					let fighterName = this.fight.atk;
					let opponentName = this.fight.dmg;

					
					p = 1;

					// damaged / by player 
					conflito_result = this.conflito(2, opponentName, p, fighterName);

					this.animation(p, fighterName, 2, opponentName, conflito_result);
					console.log("resultado do conflito:", conflito_result);

					this.battleLock = true;
					// setTimeout(_=>{this.battleLock = false}, 3000);
				}

				if (p === 2) {

					this.fight = { atk: this.fight.dmg, dmg: this.fight.atk, by: "player2" };

					let fighterName = this.fight.atk;
					let opponentName = this.fight.dmg;

					// return null;
					// damaged / by player 
					conflito_result = this.conflito(1, opponentName, p, fighterName);
					this.animation(p, fighterName, 1, opponentName, conflito_result);
					console.log("resultado do conflito:", conflito_result);

					this.battleLock = true;
					// setTimeout(_=>{this.battleLock = false}, 3000);
				}


				
			},

			fadeOut: async function(p_atks, trigger){

				let playerImage = document.getElementById("image"+p_atks);

				return Promise(resolve=>{
					setTimeout(_=>{
						// animação de fade out
						playerImage.style.opacity = "0";
						playerImage.style.webkitTransition = "opacity 0.3s ease-in-out";
						playerImage.style.transition = "opacity 0.3s ease-in-out";
					}, trigger)
				})

			},

			conflito: function (p_damaged, char_damaged, p_atks, char_atks){

				/*
					
					testa o hit e retorna resultado

					se dodge, retorna dodge
					senão retorna hit

					se hit, testa critico
					se critico, dobra o dano e retorna "critico"
					senão, dano normal e retorna "normal"


				*/

				if(!this.gameStart) return drawData("Jogador x perceu. Fim de jogo!");

				
				const hitNumber = Math.ceil((Math.random()*100));
				const critNumber = Math.ceil((Math.random()*100));

				// causa algum tipo de dano
				// normal ou critico?

				let multiplicador = 1;

				console.log(this["player"+p_atks].characters[char_atks]);

				if (critNumber <= this["player"+p_atks].characters[char_atks]["crit"+p_atks]) {
					// aumenta os danos
					multiplicador = 2;
				}
				
				// testa a chance de hit do jogador que atacou
				if (hitNumber <= this["player"+p_atks].characters[char_atks]["hit"+p_atks]) {

					return {dodge: false, result: multiplicador};


				}

				// testa a chance de erro do jogador que atacou
				if (hitNumber > this["player"+p_atks].characters[char_atks]["hit"+p_atks]) {

					return {dodge: true, result: multiplicador};
				}



			},

			damage: function(p_damaged, char_damaged, p_atks, char_atks, conflito){



				let playerAtk = this["player"+p_atks].characters[char_atks]["mt"+p_atks];
				let txt_log;

				let hp1 = this["player"+p_atks].characters[char_atks]["hp"+p_atks];
				let hp2 = this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged];

				let dmg = playerAtk * conflito.result;


				if (conflito.result === 1 && conflito.dodge === false) {

					

					this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged] -= dmg;

					this.audio(conflito);
					console.log("dano normal de", dmg);
					txt_log = `<br><strong>Player ${p_atks}</strong> causou dano <strong>normal</strong> de <strong>${dmg}</strong>`;

				}

				if (conflito.result === 2 && conflito.dodge === false) {

					this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged] -= dmg;

					this.audio(conflito);
					setTimeout(_=>{this.audio(conflito);}, 100);
					console.log("dano critico de", playerAtk * conflito.result);
					txt_log = `<br><strong>Player ${p_atks}</strong> causou dano <strong>CRÍTICO</strong> de <strong>${dmg}</strong>`;

				}

				if (conflito.dodge === true) {

					let imgD = document.getElementById("image"+p_damaged);

					let sheet3 = this["player"+p_damaged].characters[char_damaged].sheet1;
					let { height, width, img, left, right } = sheet3;

					// imgD.style.backgroundPosition = "100px 0";

					imgD.style.backgroundImage = 'url('+img+')';
					imgD.style.backgroundPosition = `-${(width*5)}px 0px`;




					this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged] -= playerAtk * 0;
					this.audio(conflito);
					console.log("dodge!! dano ", playerAtk * 0);
					txt_log = `<br><strong>Player ${p_damaged} esquivou</strong> do ataque. Nenhum dano foi causado.`;

				}

				// testa se tem vida, se for 0 ou menor seta gamestart pra false
				if (
					/*this["player"+p_atks].characters[char_atks]["hp"+p_atks] <= 0 
					|| */this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged] <= 0
				) {
					// this.gameStart = false;




					const nameChar = char_damaged;
					const nameCapitalized = nameChar.charAt(0).toUpperCase() + nameChar.slice(1);


					txt_log+= `<br>${nameCapitalized} ( P${p_damaged} ) caiu! <span style='color: green'>JOGADOR ${p_atks} o derrotou!!</span>`;

					this["player"+p_damaged].lifes -= 1;
					lifeNow = this["player"+p_damaged].lifes;
					// alert("p"+p_damaged+" // "+lifeNow);

					if (lifeNow <= 0) {

						this.gameStart = false;
						

						txt_log+= `<br><span style='color: red'>FIM DE JOGO! <strong>PLAYER ${p_damaged}</strong> PERDEU TODAS UNIDADES</span>`;

						if (this.player1.lifes <= 0) {

							alert("Game over");

							
						}

						if (this.player1.lifes > 0) {

							team.stage++;

							txt_log+= `<br><span style='color: #a12fe6'><strong>Fase ${team.stage} vai iniciar em alguns segundos. Aguarde...</strong></span>`;

							soundBox.playingNow.pause();
							soundBox.win();



						}


						


						/*txt_log+= `<br>Parabéns você é FODA!`;*/
					} else {
						/*txt_log+= `<br>Que vergonha, vence nem um jogo de navegador '-'`;*/
					}
				}

				this.drawData(txt_log);
				// this.drawButtons("erika", txt_log);

			},


			noDamageRepeat: false,
			animation: async function(p_atks, char_atks, p_damaged, char_damaged, conflito){


				/*
					
					0) testa o conflito
					1) setar a folha baseado no conflito
					2) setar as cordenadas da folha baseado no conflito
					3) setar o som baseado no conflito
					4) setar o resultado da batalha baseado no conlfito


				*/

				char_atks = this.fight.atk;
				char_damaged = this.fight.dmg;


				let perso = this["player"+p_atks].characters[char_atks];
				let control_side = this["player"+p_atks].control;

				var { width, height, i_final, del_frames, i_del } = perso.sheet1;
				var { colision, divPos, fps, exactFrameHit } = perso.sheet1;
				var { position: css_pos, css_left: left, css_right: right  } = perso.sheet1;


				let     positionW = width	; //start position for the image slicer
				let     positionH = 0	; //start position for the image slicer
				let 	timeLine  = 0	; // start index of timeLine
				let 	index_final = i_final; //  final index of timeLine
				let 	deletedFrames = del_frames; // the last empty slots of timeLine
				let 	subframes = positionW * deletedFrames; // possible adjust empty slots
				let 	i_deletions = i_del;

				let timerSwordsman = 0;
				
				if (conflito.result === 2) {
					var { fps } = perso.sheet2;
				}
				const   interval = fps; //100 ms of interval for the setInterval()

				let frameSize 	= 	perso.sheet1.size ;
				let frameAdv 	= 	perso.sheet1.adv;
				let frameStand 	= 	perso.sheet1.stand;
				let frameColision =	perso.sheet1.colision;

				let fadeOut 	=	perso.fades.out;
				let fadeIn 		=	perso.fades.in;

				if (conflito.result === 2) {

					var { width, height, i_final, del_frames, i_del } = perso.sheet2;
					var { colision, divPos, exactFrameHit } = perso.sheet2;

					positionW = width	;
					index_final = i_final
					deletedFrames = del_frames;
					subframes = positionW * deletedFrames;
					i_deletions = i_del;

					frameSize 	= 	perso.sheet2.size;
					frameAdv 	= 	perso.sheet2.adv;
					frameStand 	= 	perso.sheet2.stand;
					frameColision =	perso.sheet2.colision;


					let imgChar = this["player"+p_atks].characters[char_atks].sheet2.img;

					// document.getElementById("image"+p_atks).style.background = `url("${imgChar}") 0px 0px`
					this.drawBattle(p_atks, 2, control_side);

					// this.drawChars("erika", 2);
				}


				// roda os frames de 100 em 100
				//
				//
				//
				//
				tID = setInterval ( () => {

					let playerImage = document.getElementById("image"+p_atks);

					// console.log(position);

					// seta a imagem a cada milisegundo do setInterval
					playerImage.style.backgroundPosition = `-${positionW}px -${positionH}px`;
					playerImage.style.zIndex = 1;
					playerImage.style.position = css_pos; 

					let 	ite = 40;

					// a partir do quadro 400, move a imagem
					if (false/*position > frameAdv*/) {

						// seta o index pra sobrepor o inimigo ao atacar
						playerImage.style.zIndex = 1;
						playerImage.style.position = css_pos;

						ite+= 3;
						// move a imagem mais adiante para encostar no inimigo
						if (p_atks === 1) {
							playerImage.style.left = (ite+"px");
						} else {
							playerImage.style.right = (ite+"px");
						}
					} // end if position
					timerSwordsman++;
					if (timeLine >= colision && char_atks === "lyn" && conflito.result === 2 && timerSwordsman > 2 && positionH < 1100) {

						// if (positionW < 1600) return null;

						timerSwordsman = 0;
						this.audio(conflito);
					}

					if (timeLine >= colision && char_atks === "guy" && conflito.result === 2 && timerSwordsman > 2 && positionH < 800) {

						// if (positionW < 1600) return null;

						timerSwordsman = 0;
						this.audio(conflito);
					}

					if (timeLine === colision &&  !(this.noDamageRepeat)) {

						// seta o index pra sobrepor o inimigo ao atacar
						playerImage.style.zIndex = 1;
						playerImage.style.position = css_pos;

						this.noDamageRepeat = true;
						// causa o dano e chama o som
						this.damage(p_damaged, char_damaged, p_atks, char_atks, conflito);

						console.log("hit box done");
					}

					// se a posição for menor que 900, move 1 frame
					if (positionW < frameSize) { 
						console.log( positionW, frameSize)
						positionW += width;
						// console.log(positionW, positionH);
					}
					// se ultrapassar o limite, termina com estes sets de fades e etc
					else { 

						timeLine++;

						positionH = positionH + height;
						positionW = 0;

						// console.log("TIMELINE", timeLine);
						if (timeLine === i_deletions) {

							console.log("ajusta aqui")
							frameSize -= subframes;
						};
						if (!(timeLine > index_final)) return null;
						// console.log("animation end", timeLine);
						
						

						clearInterval(tID)
						//if (timeLine <= 0) 

							/*setTimeout(_=>{
								
								// animação de fade out
							playerImage.style.opacity = "0";
							playerImage.style.webkitTransition = "opacity 0.3s ease-in-out";
								playerImage.style.transition = "opacity 0.3s ease-in-out";

						}, fadeOut);*/

						// return null;

						setTimeout(_=>{

								// a imagem volta ao index 0
								playerImage.style.zIndex = 0;
							playerImage.style.position = css_pos;

							// devolve a posição inicial do frame
								playerImage.style.backgroundPosition = `-${positionW}px 0px`;

								// testa o player, e seta left ou  right pro respectivo player

								// mudei aqui depois volta
								// p_atks = p_atks === 1 ? playerImage.style.left = "60px" : playerImage.style.right = "60px";

								// animação de fade in
								// playerImage.style.opacity = "1";
								// playerImage.style.animationName = "fadeInOpacity";
								// playerImage.style.animationIterationCount = 1;
								// playerImage.style.animationTimingFunction = "ease-in";
								// playerImage.style.animationDuration = "2s";


								////// FINAL DA ANIMAÇÃO E DEMAIS EVENTOS
								
								this.noDamageRepeat = false;

								//
								//	turno 1 soma +1 = 2, e divide por 2, se resultado for
								//	zero, é a vez do inimigo, se for 1, é do player
								//
								this.time = this.turn%2; // sobra 1

								console.log("TURNO:", this.turn, "Vez de", this.time);


								// alert(this.fight.by === "player1");

								if (this.fight.by === "player1") {
									this.atkCount++;


									let isLive = this["player"+p_damaged].characters
									[char_damaged]["hp"+p_damaged];


									if (isLive <= 0) {

										this.atkCount++;



									} else {

										// se turno p2, não contra atacar
										if (!(this.time === 0)) {

											setTimeout(_=>{

												this.atk(2);

											}, 2000);

										};

									}

									
									
								}

								if (this.fight.by === "player2") {
									this.atkCount++;


									let isLive = this["player"+p_damaged].characters
									[char_damaged]["hp"+p_damaged];


									if (isLive <= 0) {

										this.atkCount++;

									} else {

										// se turno p1, não contra atacar
										if (!(this.time === 1)) {

											// p1 contra ataca, inverso do invertido p2
											setTimeout(_=>{

												this.atk(3);

											}, 2000);

										};
									}
									
								} 


								this.battleLock = false; // desbloqueia a batalha
								this.drawChars(1); // reseta os sheets pra folha 1

								if (this.atkCount >= 2) {

									console.log("encerra o fight");

									this.fight = { atk: null, dmg: null, by: null };

									setTimeout(_=>{

										// this.time = 0;
										this.drawArena();
										this.atkCount = 0;
										this.turn++;
										this.time = this.turn%2; // sobra 0
										console.log("TURNO:", this.turn, "Vez de", this.time);


									}, 2000)

								};

								




							}, (fadeIn - fadeIn) );


						// para o loop
						
						//clearInterval(tID);

					 } // end if posision
				}, interval ); //end of setInterval

			},


			drawLifebar: function (){

				let fightBy;
				let char1 = this.fight.atk;
				let char2 = this.fight.dmg;
				let opponent;

				if(this.fight.by === "player1") fightBy = 1, opponent = 2;
				if(this.fight.by === "player2") fightBy = 2, opponent = 1;

				let lifebar = document.getElementById("lifebar"+fightBy);
				let hp1 = this["player"+fightBy].characters[char1]["hp"+fightBy];
				let total1 = this["player"+fightBy].characters[char1]["total"+fightBy];


				let result1 = hp1 / total1 * 100;

				if (result1 === 1) result1 += 1;

				lifebar.style = "height: 13px; background-color: green; background-image: linear-gradient(to right, red, #12ca12 15%); float: left; padding: auto 10px; margin: 0 5px 0 0;border-radius: 6px;";
				lifebar.style.width = result1+"%";

				let lifebar2 = document.getElementById("lifebar"+opponent);
				let hp2 = this["player"+opponent].characters[char2]["hp"+opponent];
				let total2 = this["player"+opponent].characters[char2]["total"+opponent];


				let result2 = hp2 / total2 * 100;

				if (result2 === 1) result2 += 1;

				lifebar2.style = "height: 13px; background-color: green; background-image: linear-gradient(to left, red, #12ca12 15%); float: right; padding: auto 10px; margin: 0 0 0 5px;border-radius: 6px;";
				lifebar2.style.width = result2+"%";

			},


			updateLifebar: function () {

				let fightBy;
				let char1 = this.fight.atk;
				let char2 = this.fight.dmg;
				let opponent;

				if(this.fight.by === "player1") fightBy = 1, opponent = 2;
				if(this.fight.by === "player2") fightBy = 2, opponent = 1;

				let lifebar = document.getElementById("lifebar"+fightBy);
				let hp1 = this["player"+fightBy].characters[char1]["hp"+fightBy];
				let total1 = this["player"+fightBy].characters[char1]["total"+fightBy];


				let result1 = hp1 / total1 * 100;

				if (result1 === 1) result1 += 1;

				lifebar.style.width = result1+"%";

				let lifebar2 = document.getElementById("lifebar"+opponent);
				let hp2 = this["player"+opponent].characters[char2]["hp"+opponent];
				let total2 = this["player"+opponent].characters[char2]["total"+opponent];


				let result2 = hp2 / total2 * 100;


				if (result2 === 1) result2 += 1;

				lifebar2.style.width = result2+"%";

			},


			drawSideDatas: function(){

				// console.log("draaaaaaaaaaaaaa");
				
				/*

				this.fight.atk // eliwood
				this.fight.dmg // berserker
				this.fight.by // player1

				*/

				this.updateLifebar();

				let fightBy;
				let char1 = this.fight.atk;
				let char2 = this.fight.dmg;
				let opponent;
				// codar isso depois
				if(this.fight.by === "player1") fightBy = 1, opponent = 2;
				if(this.fight.by === "player2") fightBy = 2, opponent = 1;


				let displayHP = document.getElementById("display-hp"+fightBy);
				let displayMT = document.getElementById("display-mt"+fightBy);
				let displayHIT = document.getElementById("display-hit"+fightBy);
				let displayCRIT = document.getElementById("display-crit"+fightBy);


				displayHP.innerHTML = `${this["player"+fightBy].characters[char1]["hp"+fightBy]}`;
				displayMT.innerHTML = `${this["player"+fightBy].characters[char1]["mt"+fightBy]}`;
				displayHIT.innerHTML = `${this["player"+fightBy].characters[char1]["hit"+fightBy]}`;
				displayCRIT.innerHTML = `${this["player"+fightBy].characters[char1]["crit"+fightBy]}`;

				let displayHP2 = document.getElementById("display-hp"+opponent);
				let displayMT2 = document.getElementById("display-mt"+opponent);
				let displayHIT2 = document.getElementById("display-hit"+opponent);
				let displayCRIT2 = document.getElementById("display-crit"+opponent);


				displayHP2.innerHTML = `${this["player"+opponent].characters[char2]["hp"+opponent]}`;
				displayMT2.innerHTML = `${this["player"+opponent].characters[char2]["mt"+opponent]}`;
				displayHIT2.innerHTML = `${this["player"+opponent].characters[char2]["hit"+opponent]}`;
				displayCRIT2.innerHTML = `${this["player"+opponent].characters[char2]["crit"+opponent]}`;



				/*,MT>${this.player1.characters[char_name].mt1}, HIT>${this.player1.characters[char_name].hit1}, CRT>${this.player1.characters[char_name].crit1}<p>`;

				divPaineldata.innerHTML += `PLAYER 2: ${char_name} HP>${this.player2.characters[char_name].hp2},MT>${this.player2.characters[char_name].mt2}, HIT>${this.player2.characters[char_name].hit2}, CRT>${this.player2.characters[char_name].crit2}<p>`;*/
			},

			drawData: function(txt_log){

				
				let fightBy;
				let char1 = this.fight.atk;
				let char2 = this.fight.dmg;
				let opponent;

				if (this.fight.by === "player1") fightBy = 1, opponent = 2 ;
				if (this.fight.by === "player2") fightBy = 2, opponent = 1 ;


				let hp = this["player"+opponent].characters[char2]["hp"+opponent];


				if (hp <= 0) this["player"+opponent].characters[char2]["hp"+opponent] = 0;


				this.drawSideDatas();

				let divPaineldata = document.getElementById("painel-data");
				let painel = document.getElementById("painel-data");

				// return divPaineldata.innerHTML += char_name;

				 divPaineldata.innerHTML += txt_log;

				return painel.scrollTop = painel.scrollHeight;

				// não usa por enquanto
				divPaineldata.innerHTML = `PLAYER 1: ${char_name} HP>${this.player1.characters[char_name].hp1},MT>${this.player1.characters[char_name].mt1}, HIT>${this.player1.characters[char_name].hit1}, CRT>${this.player1.characters[char_name].crit1}<p>`;

				divPaineldata.innerHTML += `PLAYER 2: ${char_name} HP>${this.player2.characters[char_name].hp2},MT>${this.player2.characters[char_name].mt2}, HIT>${this.player2.characters[char_name].hit2}, CRT>${this.player2.characters[char_name].crit2}<p>`;
			},

			drawButtons: function(p_atks = false){

				let divButtons = document.getElementById("painel-buttons");

				if (p_atks) {
					divButtons.innerHTML = 	"<button id='btn-atk' >Vez do Inimigo. Aguarde...</button>";

					let button = document.getElementById("btn-atk");
					button.style = "background-color: rgb(247, 89, 89); border: 3px double rgb(255, 38, 38);";
				}
				else{
					
					// divButtons.innerHTML = `<button id='btn-atk' onclick='mesa.atk(1)'>Atacar inimigo</button>`;
					/*divButtons.innerHTML += '<form method="post" action="'+window.location.pathname+'"><input type="checkbox" class="limited" onclick="return limitchex(this,2)" /> 1<br /><input type="checkbox" class="limited" onclick="return limitchex(this,2)" /> 2<br /><input type="checkbox" class="limited" onclick="return limitchex(this,2)" /> 3<br /><input type="submit" value="go"></form>'*/

					let button = document.getElementById("btn-atk");
					button.style = "background-color: #00ff4e; border: 3px double #04a034";
				}
				// divButtons.innerHTML += "<button onclick='mesa.atk(2)'>Atacar 1</button>";

			},

			drawBattle: function(p_atks, conflito, control_side){

				let sheetAtk;
				if (conflito === 1)
				sheetAtk = 1;
				if (conflito === 2)
				sheetAtk = 2;

				let fightBy;
				let char1 = this.fight.atk;
				let char2 = this.fight.dmg;
				let opponent;

				if (this.fight.by === "player1") fightBy = 1, opponent = 2 ;
				if (this.fight.by === "player2") fightBy = 2, opponent = 1 ;


				// estilo do elemento atacante
				let element_atk = document.getElementById("image"+p_atks);

				// objeto sheet do atacante
				let playerAtk =  this["player"+p_atks]
				.characters[char1]["sheet"+sheetAtk];

				// console.log(playerAtk)

				// dados do obj
				var { height, width, img, divPos, fix_p2_left } = playerAtk;
				var { position, left, right, top, bottom } = playerAtk;


				if (control_side === 1) {
					element_atk.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; -webkit-transform: scaleX(-1); transform: scaleX(-1); position: "+position+";  right: "+right+"; left: "+left+"; top:"+top+"; bottom"+bottom+";"
				}

				if (control_side === 2) {

					let adjust = Number(left.substr(0,2));

					left = (adjust + fix_p2_left)+"px";


					element_atk.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; position: "+position+";  right: "+left+"; left: "+right+"; top:"+top+"; bottom"+bottom+";"
				}

				return null;

				let element_dmg = document.getElementById("image"+p_damaged);
			},

			drawChars: function(sheetNumber /*p_atks, p_damaged, conflito_result*/){

				let fightBy;
				let char1 = this.fight.atk;
				let char2 = this.fight.dmg;
				let opponent;
				let scale;

				if (this.fight.by === "player1") char1 = this.fight.atk, char2 = this.fight.dmg, opponent = 2, scale = "scaleX(-1)";
				if (this.fight.by === "player2") char1 = this.fight.dmg, char2 = this.fight.atk, opponent = 1, scale = "";



				let img1 = document.getElementById("image1");

				var style1 = this["player1"].characters[char1]["sheet"+sheetNumber];

				var { height, width, img, divPos } = style1;
				var { position, left, right, top, bottom } = style1;

				img1.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; transform: scaleX(-1); position: "+position+";  right: "+right+"; left: "+left+"; top:"+top+"; bottom"+bottom+";"

				// img1.style += "";

				// return null;

				let img2 = document.getElementById("image2");
				var style2 = this["player2"].characters[char2]["sheet"+sheetNumber];
				var { height, width, img, divPos } = style2;
				var { position, left, right, top, bottom } = style2;

				img2.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; position: "+position+";  right: "+left+"; left: "+right+"; top:"+top+"; bottom"+bottom+";"

			},

			drawCharSelection: function(){

				loadHTML("load/selectChar.html", "players").then(e=>console.log("ok"));

			},

			nextBattle: function (){

				let player_keys = Object.keys(team.player);

				// reseta o hp do player
				player_keys.forEach((e,i)=>{

					team.player[e].hp1 = team.player[e].total1;

				});




				team.opp = {};
				team.getOpp();
				this.player2.characters = team.opp;

				this.player1.lifes = 3;
				this.player2.lifes = 3;

				this.gameStart = true;
				this.atkCount = 0;
				this.turn = 1;
				this.time = 1; // sobra 0



				setTimeout(_=>{

					soundBox.playingNow.pause();
					soundBox.battle();

					return this.drawArena();

				}, 8000)

			},



			drawArena: function (){

				this.gameStart = true;


				if (this.player2.lifes <= 0){

					this.nextBattle();
					return console.log("~~ G A M E •• O V E R ~~");

				};

				loadHTML("load/arena.html", "players").then(_=>{

					// alert(this.time);

					let button = document.getElementById("btn-atk");

					if (this.time === 0) {

						button.innerHTML = "Vez do inimigo...";
						button.setAttribute("onclick", " ");
						button.style.backgroundColor = "#ff3c3c";
						button.style.borderColor = "red";

					} else {

						button.innerHTML = "Atacar!!";
						button.setAttribute("onclick", "mesa.drawArenaBattle()");
						button.style.backgroundColor = "#00ff4e";
						button.style.borderColor = "#04a034";

					}



					let ch = this.player1.characters;
					let values = Object.values(ch);

					let { hp1: hpv0, mt1: mtv0, hit1: hitv0, crit1: critv0 } = values[0];
					let { hp1: hpv1, mt1: mtv1, hit1: hitv1, crit1: critv1 } = values[1];
					let { hp1: hpv2, mt1: mtv2, hit1: hitv2, crit1: critv2 } = values[2];


					let ob = Object.getOwnPropertyNames(ch);

					let t1 = document.getElementsByClassName("my-team1")[0];
					let t1_status = document.getElementsByClassName("status-team1")[0];

					let t2 = document.getElementsByClassName("my-team2")[0];
					let t2_status = document.getElementsByClassName("status-team2")[0];

					let t3 = document.getElementsByClassName("my-team3")[0];
					let t3_status = document.getElementsByClassName("status-team3")[0];


					// return console.log(t1);

					t1.setAttribute("class", "avatar my-team1 "+ob[0]);
					t1.setAttribute("src", "files/avatar/"+ob[0]+"_mugshot.png");

					t1_status.innerHTML = "HP "+hpv0+
					"<br>MT "+mtv0+
					"<br>HIT "+hitv0+
					"<br>CRT "+critv0;

					if (hpv0 <= 0) t1.style.filter = "grayscale(100%)";

					t2.setAttribute("class", "avatar my-team2 "+ob[1]);
					t2.setAttribute("src", "files/avatar/"+ob[1]+"_mugshot.png");

					t2_status.innerHTML = "HP "+hpv1+
					"<br>MT "+mtv1+
					"<br>HIT "+hitv1+
					"<br>CRT "+critv1;

					if (hpv1 <= 0) t2.style.filter = "grayscale(100%)";

					t3.setAttribute("class", "avatar my-team3 "+ob[2]);
					t3.setAttribute("src", "files/avatar/"+ob[2]+"_mugshot.png");

					t3_status.innerHTML = "HP "+hpv2+
					"<br>MT "+mtv2+
					"<br>HIT "+hitv2+
					"<br>CRT "+critv2;

					if (hpv2 <= 0) t3.style.filter = "grayscale(100%)";

					///////////////////////
					//////////////////////////////
					////////////////////////////////////

					let ch2 = this.player2.characters;
					let values2 = Object.values(ch2);

					let { hp2: ohpv0, mt2: omtv0, hit2: ohitv0, crit2: ocritv0 } = values2[0];
					let { hp2: ohpv1, mt2: omtv1, hit2: ohitv1, crit2: ocritv1 } = values2[1];
					let { hp2: ohpv2, mt2: omtv2, hit2: ohitv2, crit2: ocritv2 } = values2[2];

					let ob2 = Object.getOwnPropertyNames(ch2);

					let o1 = document.getElementsByClassName("opponent1")[0];
					let o1_status = document.getElementsByClassName("status-opp1")[0];

					let o2 = document.getElementsByClassName("opponent2")[0];
					let o2_status = document.getElementsByClassName("status-opp2")[0];

					let o3 = document.getElementsByClassName("opponent3")[0];
					let o3_status = document.getElementsByClassName("status-opp3")[0];



					o1.setAttribute("class", "avatar opponent1 "+ob2[0]);
					o1.setAttribute("src", "files/avatar/"+ob2[0]+"_mugshot.png");

					o1_status.innerHTML = "HP "+ohpv0+
					"<br>MT "+omtv0+
					"<br>HIT "+ohitv0+
					"<br>CRT "+ocritv0;

					if (ohpv0 <= 0) o1.style.filter = "grayscale(100%)";

					o2.setAttribute("class", "avatar opponent2 "+ob2[1]);
					o2.setAttribute("src", "files/avatar/"+ob2[1]+"_mugshot.png");

					o2_status.innerHTML = "HP "+ohpv1+
					"<br>MT "+omtv1+
					"<br>HIT "+ohitv1+
					"<br>CRT "+ocritv1;

					if (ohpv1 <= 0) o2.style.filter = "grayscale(100%)";


					o3.setAttribute("class", "avatar opponent3 "+ob2[2]);
					o3.setAttribute("src", "files/avatar/"+ob2[2]+"_mugshot.png");

					o3_status.innerHTML = "HP "+ohpv2+
					"<br>MT "+omtv2+
					"<br>HIT "+ohitv2+
					"<br>CRT "+ocritv2;

					if (ohpv2 <= 0) o3.style.filter = "grayscale(100%)";


					t1.setAttribute("onclick", "team.getFighter(this)");
					t2.setAttribute("onclick", "team.getFighter(this)");
					t3.setAttribute("onclick", "team.getFighter(this)");
					o1.setAttribute("onclick", "team.getFighter(this)");
					o2.setAttribute("onclick", "team.getFighter(this)");
					o3.setAttribute("onclick", "team.getFighter(this)");



					if (this.time === 0 && this.player1.lifes > 0) {

						t1.setAttribute("onclick", " ");
						t2.setAttribute("onclick", " ");
						t3.setAttribute("onclick", " ");
						o1.setAttribute("onclick", " ");
						o2.setAttribute("onclick", " ");
						o3.setAttribute("onclick", " ");



						team.randomFight();
						team.fxSelector();
						console.log("apos random:", this.fight);

						setTimeout(_=>{

							this.drawArenaBattle();

						}, 3000);

					}


				});

			},

			drawArenaBattle: function (){

				if (!(this.fight.atk) || !(this.fight.dmg) || !(this.fight.by)) 
				return null;

				console.log("TURNO...", this.time);

				

				loadHTML("load/battle.html", "players").then(_=>{

					this.drawData(`<p>Início da Batalha. Turno ${this.turn}`);

					this.drawLifebar();
					this.drawChars(1);

					
					setTimeout(_=>{

						if(this.time === 0)  return this.atk(2);
						if(this.time === 1)  return this.atk(1);
						

					}, 2000);

				})


			},

			drawGame: function(){
				// console.log(arguments.callee.name, "init");

				this.yourNick = "true";

				// alert(Object.getOwnPropertyNames(team.player).length);


				this.drawSceneLogo();

				// console.log("antes your nick", typeof this.yourNick);
				if (this.yourNick === "yes-nick") return this.drawButtonNick();
				
				if (Object.getOwnPropertyNames(team.player).length < 2) return this.drawCharSelection();

				// alert(team.player)
				this.player1.characters = team.player; //team_one
				this.player2.characters = team.opp; //team_two
				this.drawArena();

				
				// console.log("depois your nick", this.yourNick);


				// desenha a logo e o botão iniciar
				if (!this.gameStart) return this.drawButtonStart();

				// console.log(chars.erika);

				let team_one = {};
				let team_two = {};

				// seletores de personagens
				team_one.erika = chars.ephraim;
				team_two.berserker = chars.pegasus;

				// return console.log(team_one);

				 



				 // return null;
				 // amanhã, configurar os setters dos times no fluxo, e arrumar o fluxo de nick
				

				this.drawData("Inicio de jogo");
				this.drawLifebar();
				
				

				this.drawChars(1);
				// this.drawButtons();
				// return console.log(null);

				// console.log(arguments.callee.name, "end");

			}
		}
	</script>

	<script type="text/javascript" src="chars.js"></script>



	<style type="text/css">

		
	</style>

</head>

<body>

	<div id="rank">
		

		<div style="display: inline-block">
			<h1 id="top-player">TOP Players</h1>
			Ranking not done yet :)

		</div>
		<pre id="top-nicks">
			1° Boy
			2° Girl
			3° Man
			4° Woman
			5° Someone
		</pre>



	</div>	

	<hr>

	<div id="container">

		
		
		
		<div id="corpo">

			<div id="painel-data" style="overflow-y:scroll;"></div>

			<div id="painel-buttons"></div>

			

			<div id="players" class="ruler"></div>



			
		</div>

		<div id="back-logo">
			<div id="logo"></div>
		</div>



	</div>

	<script type="text/javascript">

		window.onload = team.getOpp();

		window.onload = mesa.drawGame();

		window.onload = screen.getSize();
		
	</script>
</body>

<footer>


	
</footer>






</html>