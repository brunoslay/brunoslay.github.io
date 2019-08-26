////// FINAL DA ANIMAÇÃO E DEMAIS EVENTOS
								this.turn++; // 1
								this.noDamageRepeat = false;

								//
								//	turno 1 soma +1 = 2, e divide por 2, se resultado for
								//	zero, é a vez do inimigo, se for 1, é do player
								//
								this.time = this.turn%2; // 0

								console.log("TURNO:", this.turn, "Vez de", this.time);


								this.fight.by;

								if (this.time === 0) {

									// p2 contra ataca
									setTimeout(_=>{

										this.atk(2);

									}, 2000);
								} 


								this.battleLock = false; // desbloqueia a batalha
								this.drawChars(1); // reseta os sheets pra folha 1

								if (true/*!(this.time === 0)*/) {

									console.log("encerra o fight");

									this.fight = { atk: null, dmg: null, by: null };

									setTimeout(_=>{

										// this.time = 0;
										this.drawArena();



									}, 1000)

								};