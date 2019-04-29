<?php 

include_once "sside.php";

?>

<!DOCTYPE html>
<html style="background-color: #222120;">
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/page.css">

	<script type="text/javascript" src="js/screenRework.js"></script>

	<script type="text/javascript">

		
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

			drawSceneLogo: _=>{

				document.getElementById("logo").style.background = 'url("files/Fire_Emblem_logo.png")  center / 725px no-repeat';
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
				// this.yourNick = "<?=$nick?>";

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
				

				if (this.battleLock) return console.log("Espere a batalha acabar. . .");

				if (!this.gameStart) return this.drawData("erika", "<br>O JOGO ENCERROU");

				// 1 = player 1 //  0 = player 2
				// if () return console.log("")

				let conflito_result;
				if (p === 1 && this.time === 1) {
					// damaged / by player 
					conflito_result = this.conflito(2, "erika", p, "erika");
					this.animation(p, "erika", 2, "erika", conflito_result);
					console.log("resultado do conflito:", conflito_result);

					this.battleLock = true;
					setTimeout(_=>{this.battleLock = false}, 3000);
				}

				if (p === 2 && this.time === 0) {
					// damaged / by player 
					conflito_result = this.conflito(1, "erika", p, "erika");
					this.animation(p, "erika", 1, "erika", conflito_result);
					console.log("resultado do conflito:", conflito_result);

					this.battleLock = true;
					setTimeout(_=>{this.battleLock = false}, 3000);
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

				if(!this.gameStart) return drawData("erika", "Jogador x perceu. Fim de jogo!");

				
				const hitNumber = Math.ceil((Math.random()*100));
				const critNumber = Math.ceil((Math.random()*100));

				// causa algum tipo de dano
				// normal ou critico?

				let multiplicador = 1;

				if (critNumber <= this["player"+p_atks].characters[char_atks]["crit"+p_atks]) {
					// aumenta os danos
					multiplicador = 2;
				}
				
				// testa a chance de hit do jogador que atacou
				if (hitNumber <= this["player"+p_atks].characters[char_atks]["hit"+p_atks]) {


					////////// PROCESSO DE CALCULOS

					/*this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged] -= 10 * multiplicador;*/

					console.log(p_damaged);

					console.log("player2", this["player"+p_damaged].characters[char_damaged].hp2);
					console.log("player1", this["player"+p_atks].characters[char_atks].hp1);


					// this["player"+p_damaged].characters[char_damaged].hp -= this["player"+p_atks].characters[char_atks].mt;

					// console.log(this["player"+p_damaged].characters[char_damaged].hp, "HPP");



					

					return {dodge: false, result: multiplicador};

					////// aAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA RESULTADO IGUAL NÃO SEI PQ

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

					let sheet3 = this["player"+p_damaged].characters[char_damaged].sheet3;
					let { height, width, img, divPos } = sheet3;

					// imgD.style.backgroundPosition = "100px 0";

					imgD.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; position: absolute; right: "+divPos+"%; bottom: 11%; "




					this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged] -= playerAtk * 0;
					this.audio(conflito);
					console.log("dodge!! dano ", playerAtk * 0);
					txt_log = `<br><strong>Player ${p_damaged} esquivou</strong> do ataque. Nenhum dano foi causado.`;

				}

				// testa se tem vida, se for 0 ou menor seta gamestart pra false
				if (
					this["player"+p_atks].characters[char_atks]["hp"+p_atks] <= 0 
					|| this["player"+p_damaged].characters[char_damaged]["hp"+p_damaged] <= 0
				) {
					this.gameStart = false;
					txt_log+= `<br>FIM DE JOGO. <span style='color: green'>JOGADOR ${p_atks} VENCEU!!</span>`;

					if (p_atks === 1) {
						txt_log+= `<br>Parabéns você é FODA!`;
					} else {
						txt_log+= `<br>Que vergonha, vence nem um jogo de navegador '-'`;
					}
				}

				this.drawData("erika", txt_log);
				// this.drawButtons("erika", txt_log);

			},


			noDamageRepeat: false,
			animation: async function(p_atks, char_atks, p_damaged, char_damaged, conflito, fps = 100){


				/*
					
					0) testa o conflito
					1) setar a folha baseado no conflito
					2) setar as cordenadas da folha baseado no conflito
					3) setar o som baseado no conflito
					4) setar o resultado da batalha baseado no conlfito


				*/


				let perso = this["player"+p_atks].characters[char_atks];
				let control_side = this["player"+p_atks].control;

				var { width, height, i_final, del_frames, adj_line } = perso.sheet1;
				var { colision, divPos } = perso.sheet1;
				var { position: css_pos, css_left: left, css_right: right  } = perso.sheet1;


				let     positionW = width	; //start position for the image slicer
				let     positionH = 0	; //start position for the image slicer
				let 	timeLine  = 0	; // start index of timeLine
				let 	index_final = i_final; //  final index of timeLine
				let 	deletedFrames = del_frames; // the last empty slots of timeLine
				let 	lastTimeL = positionW * deletedFrames; // possible adjust empty slots
				let 	adjust_inline = adj_line;
				
				const   interval = fps; //100 ms of interval for the setInterval()

				let frameSize 	= 	perso.sheet1.size;
				let frameAdv 	= 	perso.sheet1.adv;
				let frameStand 	= 	perso.sheet1.stand;
				let frameColision =	perso.sheet1.colision;

				let fadeOut 	=	perso.fades.out;
				let fadeIn 		=	perso.fades.in;

				if (conflito.result === 2) {

					var { width, height, i_final, del_frames, adj_line } = perso.sheet2;
					var { colision, divPos } = perso.sheet2;

					positionW = width	;
					index_final = i_final
					deletedFrames = del_frames;
					lastTimeL = positionW * deletedFrames;
					adjust_inline = adj_line;

					frameSize 	= 	perso.sheet2.size;
					frameAdv 	= 	perso.sheet2.adv;
					frameStand 	= 	perso.sheet2.stand;
					frameColision =	perso.sheet2.colision;


					console.log("W =", width)

					let imgChar = this["player"+p_atks].characters[char_atks].sheet2.img;

					// document.getElementById("image"+p_atks).style.background = `url("${imgChar}") 0px 0px`
					this.drawBattle("erika", p_atks, 2, control_side);

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
						console.log(positionW = positionW + width, width)
					}
					// se ultrapassar o limite, termina com estes sets de fades e etc
					else { 

						timeLine++;



						positionH = positionH + height;
						positionW = width;

						console.log("back frame", timeLine);
						if (timeLine > adjust_inline) frameSize -= lastTimeL;
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
								this.turn++;
								this.noDamageRepeat = false;

								//
								//	turno 1 soma +1 = 2, e divide por 2, se resultado for
								//	zero, é a vez do inimigo, se for 1, é do player
								//
								this.time = this.turn%2;

								console.log("TURNO:", this.turn, "Vez de", this.time);

								if (this.time === 0) {

									this.drawButtons(true);

									setTimeout(_=>{

										this.atk(2);

									}, 2000);
								} else {
									this.drawButtons(false);
								}




								this.drawChars("erika", 1);


							}, (fadeIn - fadeIn) );


						// para o loop
						
						//clearInterval(tID);

					 } // end if posision
				}, interval ); //end of setInterval

			},


			drawSideDatas: function(char_name){

				// console.log("draaaaaaaaaaaaaa");

				let displayHP = document.getElementById("display-hp1");
				let displayMT = document.getElementById("display-mt1");
				let displayHIT = document.getElementById("display-hit1");
				let displayCRIT = document.getElementById("display-crit1");


				displayHP.innerHTML = `${this.player1.characters[char_name].hp1}`;
				displayMT.innerHTML = `${this.player1.characters[char_name].mt1}`;
				displayHIT.innerHTML = `${this.player1.characters[char_name].hit1}`;
				displayCRIT.innerHTML = `${this.player1.characters[char_name].crit1}`;

				let displayHP2 = document.getElementById("display-hp2");
				let displayMT2 = document.getElementById("display-mt2");
				let displayHIT2 = document.getElementById("display-hit2");
				let displayCRIT2 = document.getElementById("display-crit2");


				displayHP2.innerHTML = `${this.player2.characters[char_name].hp2}`;
				displayMT2.innerHTML = `${this.player2.characters[char_name].mt2}`;
				displayHIT2.innerHTML = `${this.player2.characters[char_name].hit2}`;
				displayCRIT2.innerHTML = `${this.player2.characters[char_name].crit2}`;



				/*,MT>${this.player1.characters[char_name].mt1}, HIT>${this.player1.characters[char_name].hit1}, CRT>${this.player1.characters[char_name].crit1}<p>`;

				divPaineldata.innerHTML += `PLAYER 2: ${char_name} HP>${this.player2.characters[char_name].hp2},MT>${this.player2.characters[char_name].mt2}, HIT>${this.player2.characters[char_name].hit2}, CRT>${this.player2.characters[char_name].crit2}<p>`;*/
			},

			drawData: function(char_name, txt_log){

				// console.log("draaaaaaaaaaaaaa");

				this.drawSideDatas(char_name);

				let divPaineldata = document.getElementById("painel-data");
				let painel = document.getElementById("painel-data");

				// return divPaineldata.innerHTML += char_name;

				 divPaineldata.innerHTML += txt_log;

				return painel.scrollTop = painel.scrollHeight;

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
					
					divButtons.innerHTML = "<button id='btn-atk' onclick='mesa.atk(1)'>Atacar inimigo</button>";

					let button = document.getElementById("btn-atk");
					button.style = "background-color: #00ff4e; border: 3px double #04a034";
				}
				// divButtons.innerHTML += "<button onclick='mesa.atk(2)'>Atacar 1</button>";

			},

			drawBattle: function(char_name, p_atks, conflito, control_side){

				let sheetAtk;
				if (conflito === 1)
				sheetAtk = 1;
				if (conflito === 2)
				sheetAtk = 2;


				// estilo do elemento atacante
				let element_atk = document.getElementById("image"+p_atks);

				// objeto sheet do atacante
				let playerAtk =  this["player"+p_atks]
				.characters[char_name]["sheet"+sheetAtk];

				console.log(playerAtk)

				// dados do obj
				var { height, width, img, divPos } = playerAtk;
				var { position, left, right, top, bottom } = playerAtk;


				if (control_side === 1) {
					element_atk.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; -webkit-transform: scaleX(-1); transform: scaleX(-1); position: "+position+";  right: "+right+"; left: "+left+"; top:"+top+"; bottom"+bottom+";"
				}

				if (control_side === 2) {

					let adjust = Number(left.substr(0,2));

					left = (adjust + 17)+"px";


					element_atk.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; position: "+position+";  right: "+left+"; left: "+right+"; top:"+top+"; bottom"+bottom+";"
				}

				return null;

				let element_dmg = document.getElementById("image"+p_damaged);
			},

			drawChars: function(char_name, sheetNumber /*p_atks, p_damaged, conflito_result*/){

				let img1 = document.getElementById("image1");
				var style1 = this.player1.characters[char_name]["sheet"+sheetNumber];
				var { height, width, img, divPos } = style1;
				var { position, left, right, top, bottom } = style1;

				console.log("top", top);

				img1.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; -webkit-transform: scaleX(-1); transform: scaleX(-1); position: "+position+";  right: "+right+"; left: "+left+"; top:"+top+"; bottom"+bottom+";"

				// img1.style += "";

				// return null;

				let img2 = document.getElementById("image2");
				var style2 = this.player2.characters[char_name]["sheet"+sheetNumber];
				var { height, width, img, divPos } = style2;
				var { position, left, right, top, bottom } = style2;

				img2.style = "background-color: green; height: "+height+"px; width: "+width+"px; background: url('"+img+"') 0px 0px; position: "+position+";  right: "+left+"; left: "+right+"; top:"+top+"; bottom"+bottom+";"

			},

			drawGame: function(){
				// console.log(arguments.callee.name, "init");

				this.yourNick = "<?=$nick?>";

				this.drawSceneLogo();

				// console.log("antes your nick", typeof this.yourNick);
				if (this.yourNick === "no-nick") return this.drawButtonNick();
				// console.log("depois your nick", this.yourNick);


				// desenha a logo e o botão iniciar
				if (!this.gameStart) return this.drawButtonStart();

				// console.log(chars.erika);

				this.player1.characters = chars;
				this.player2.characters = chars;

				this.drawData("erika", "Inicio de jogo");


				this.drawChars("erika", 1);
				this.drawButtons();

				// console.log(arguments.callee.name, "end");

			}
		}
	</script>

	<script type="text/javascript" src="chars.js"></script>



	<style type="text/css">

		
	</style>

</head>
<body>
	<div id="demo">
		<div id="back-logo">
			<div id="logo"></div>
		</div>
		
		<div id="corpo">

			<div id="painel-data" style="overflow-y:scroll;"></div>

			<div id="painel-buttons"></div>

			<div id="status1" > 

				HP:<span id="display-hp1">hp</span><br>
				MT:<span id="display-mt1">mt</span><br>
				HIT:<span id="display-hit1">hp</span><br>
				CRIT:<span id="display-crit1">hp</span><br>

			</div>

			<div id="players" class="ruler">

				 <table>
					
					<tr>
						<th>0</th>
						<th>1</th>
						<th>2</th>
						<th>3</th>

						<th>4</th>
						<th>5</th>
						<th>6</th>

						<th>7</th>
						<th>8</th>
						<th>9</th>
					</tr>


					<tr>

						<td>data 0</td>
						<td>data 1</td>
						<td>data 2</td>
						<td>data 3</td>

						<td>
							<div id="image1" >  </div>
						</td>

						<td>
							<div id="image2" >  </div>
						</td>

						<td>data 6</td>
						<td>data 7</td>
						<td>data 8</td>
						<td>data 9</td>



					</tr>

				</table> 
	
				

				
			</div>

			<div id="status2" > 

				HP:<span id="display-hp2">hp</span><br>
				MT:<span id="display-mt2">mt</span><br>
				HIT:<span id="display-hit2">hp</span><br>
				CRIT:<span id="display-crit2">hp</span><br>

			</div>
		</div>

	</div>
</body>

<script type="text/javascript">

	window.onload = mesa.drawGame();

	window.onload = screen.getSize();
	
</script>
</html>