const chars = {

	
	eirika: {
		sheet1: {
			img: "files/eirika_sword_attack.png",
			width: 114, // 1008
			height:	67, // 636
			stand: 684,
			adv: 300,
			size: 570, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 2,
			fxTimes: 1,
			del_frames: 3, 
			i_del: 4,
			i_final: 4,
			fps: 90,

			//css
			position: "relative",
			left: "79px",
			right: "unset",
			top: "8px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/eirika_sword_critical.png",
			width: 116, // 1008
			height:	70, // 636
			stand: 696,
			adv: 300,
			size: 580 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 3,
			fxTimes: 1,
			del_frames: 4, 
			i_del: 5,
			i_final: 5,
			fps: 90,


			//css
			position: "relative",
			left: "78px",
			right: "unset",
			top: "6px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Eirika",
		hp1: 60, total1: 60, mt1: 8, hit1: 80, crit1: 60,
		hp2: 60, total2: 60, mt2: 8, hit2: 80, crit2: 60
	},

	eliwood: {
		sheet1: {
			img: "files/eliwood_sword_attack.png",
			width: 144, // 1008
			height:	106, // 636
			stand: 1008,
			adv: 300,
			size: 864, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 3,
			fxTimes: 1,
			del_frames: 2, 
			i_del: 5,
			i_final: 5,
			fps: 90,

			//css
			position: "relative",
			left: "81px",
			right: "",
			top: "-10px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/eliwood_sword_critical.png",
			width: 205, // 1008
			height:	126, // 636
			stand: 1640,
			adv: 300,
			size: 1435 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 5,
			fxTimes: 2,
			del_frames: 5, 
			i_del: 6,
			i_final: 7,
			fps: 90,

			//css
			position: "relative",
			left: "75px",
			right: "unset",
			top: "unset",
			bottom: "unset",
			fix_p2_left: 17
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Eliwood", 
		hp1: 70, total1: 70, mt1: 10, hit1: 85, crit1: 25,
		hp2: 70, total2: 70, mt2: 10, hit2: 85, crit2: 25
	},

	hector: {
		sheet1: {
			img: "files/hector_axe_attack.png",
			width: 117, // 1008
			height:	99, // 636
			stand: 819,
			adv: 300,
			size: 702, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 3,
			fxTimes: 1,
			del_frames: 5, 
			i_del: 5,
			i_final: 5,
			divPos: 43,
			fps: 90,

			//css
			position: "relative",
			left: "84px",
			right: "",
			top: "1px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/hector_axe_critical.png",
			width: 118, // 1008
			height:	99, // 636
			stand: 826,
			adv: 300,
			size: 708 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 3,
			fxTimes: 2,
			del_frames: 5, 
			i_del: 5,
			i_final: 5,
			fps: 110,

			//css
			position: "relative",
			left: "84px",
			right: "unset",
			top: "1px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Hector",
		hp1: 75, total1: 75, mt1: 11, hit1: 75, crit1: 15,
		hp2: 75, total2: 75, mt2: 11, hit2: 75, crit2: 15
	},

	ephraim: {
		sheet1: {
			img: "files/ephraim_lance_attack.png",
			width: 114, // 1008
			height:	68, // 636
			stand: 684,
			adv: 300,
			size: 570, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 5, 
			i_del: 5,
			i_final: 5,
			divPos: 43,
			fps: 100,

			//css
			position: "relative",
			left: "84px",
			right: "",
			top: "7px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/ephraim_lance_critical.png",
			width: 122, // 1008
			height:	80, // 636
			stand: 732,
			adv: 300,
			size: 610 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 2,
			del_frames: 0, 
			i_del: null,
			i_final: 4,
			divPos: 38.7,
			fps: 100,

			//css
			position: "relative",
			left: "75px",
			right: "unset",
			top: "unset",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Ephraim",
		hp1: 65, total1: 65, mt1: 9, hit1: 80, crit1: 35,
		hp2: 65, total2: 65, mt2: 9, hit2: 80, crit2: 35
	},

	florina: {
		sheet1: {
			img: "files/falconknight_lance_attack.png",
			width: 195, // 1008
			height:	116, // 636
			stand: 975,
			adv: 300,
			size: 780, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 0, 
			i_del: null,
			i_final: 9,
			divPos: 43,
			fps: 90,

			//css
			position: "relative",
			left: "84px",
			right: "",
			top: "-5px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/falconknight_lance_critical.png",
			width: 196, // 1008
			height:	116, // 636
			stand: 1764,
			adv: 300,
			size: 1568 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 2,
			del_frames: 4, 
			i_del: 7,
			i_final: 7,
			divPos: 38.7,
			fps: 80,

			//css
			position: "relative",
			left: "80px",
			right: "unset",
			top: "-5px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Florina",
		hp1: 60, total1: 60, mt1: 7, hit1: 90, crit1: 60,
		hp2: 60, total2: 60, mt2: 7, hit2: 90, crit2: 60
	},

	oswin: {
		sheet1: {
			img: "files/general_axe_attack.png",
			width: 115, // 1008
			height:	58, // 636
			stand: 690,
			adv: 300,
			size: 575, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 2,
			fxTimes: 1,
			del_frames: 1, 
			i_del: 5,
			i_final: 5,
			fps: 100,

			//css
			position: "relative",
			left: "70px",
			right: "",
			top: "18px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/general_axe_critical.png",
			width: 136, // 1008
			height:	78, // 636
			stand: 1360,
			adv: 300,
			size: 1224 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 6,
			fxTimes: 1,
			del_frames: 4, 
			i_del: 8,
			i_final: 8,
			fps: 70,

			//css
			position: "relative",
			left: "60px",
			right: "unset",
			top: "8px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Oswin",
		hp1: 80, total1: 80, mt1: 13, hit1: 60, crit1: 10,
		hp2: 80, total2: 80, mt2: 13, hit2: 60, crit2: 10
	},

	joshua: {
		sheet1: {
			img: "files/assassin_sword_attack.png",
			width: 90, // 1008
			height:	43, // 636
			stand: 630,
			adv: 540,
			size: 540, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 3,
			fxTimes: 1,
			del_frames: 2, 
			i_del: 6,
			i_final: 6,
			fps: 100,

			//css
			position: "relative",
			left: "100px",
			right: "",
			top: "19px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/assassin_sword_critical.png",
			width: 123, // 1008
			height:	108, // 636
			stand: 984,
			adv: 300,
			size: 861 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 3, 
			i_del: 7,
			i_final: 7,
			fps: 70,

			//css
			position: "relative",
			left: "116px",
			right: "unset",
			top: "-4px",
			bottom: "unset",
			fix_p2_left: 107
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Joshua",
		hp1: 65, total1: 65, mt1: 6, hit1: 90, crit1: 85,
		hp2: 65, total2: 65, mt2: 6, hit2: 90, crit2: 85
	},

	marth: {
		sheet1: {
			img: "files/marth_sword_attack.png",
			width: 96, // 1008
			height:	67, // 636
			stand: 768,
			adv: 540,
			size: 672, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 1,
			fxTimes: 1,
			del_frames: 3, 
			i_del: 3,
			i_final: 3,
			fps: 100,

			//css
			position: "relative",
			left: "94px",
			right: "",
			top: "18px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/marth_sword_critical.png",
			width: 114, // 1008
			height:	101, // 636
			stand: 1026,
			adv: 300,
			size: 912 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 3, 
			i_del: 7,
			i_final: 7,
			fps: 90,

			//css
			position: "relative",
			left: "86px",
			right: "unset",
			top: "-8px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Marth",
		hp1: 70, total1: 70, mt1: 8, hit1: 85, crit1: 40,
		hp2: 70, total2: 70, mt2: 8, hit2: 85, crit2: 40
	},

	lyn: {
		sheet1: {
			img: "files/lyn_sword_attack.png",
			width: 118, // 1008
			height:	119, // 636
			stand: 826,
			adv: 540,
			size: 708, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 2,
			fxTimes: 1,
			del_frames: 5, 
			i_del: 5,
			i_final: 5,
			fps: 80,

			//css
			position: "relative",
			left: "90px",
			right: "",
			top: "-3px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/lyn_sword_critical2.png",
			width: 220, // 1008
			height:	144, // 636
			stand: 1980,
			adv: 300,
			size: 1760 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 2, 
			i_del: 9,
			i_final: 9,
			fps: 100,

			//css
			position: "relative",
			left: "94px",
			right: "unset",
			top: "18px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Lyn",
		hp1: 60, total1: 60, mt1: 10, hit1: 60, crit1: 60,
		hp2: 60, total2: 60, mt2: 10, hit2: 60, crit2: 60
	},


	forde: {
		sheet1: {
			img: "files/paladin_lance_attack.png",
			width: 121, // 1008
			height:	100, // 636
			stand: 726,
			adv: 300,
			size: 605, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 1,
			fxTimes: 1,
			del_frames: 0, 
			i_del: null,
			i_final: 4,
			fps: 110,

			//css
			position: "relative",
			left: "84px",
			right: "",
			top: "0px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/paladin_lance_critical.png",
			width: 143, // 1008
			height:	100, // 636
			stand: 1287,
			adv: 300,
			size: 1144 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 5,
			fxTimes: 2,
			del_frames: 0, 
			i_del: null,
			i_final: 7,
			fps: 80,

			//css
			position: "relative",
			left: "62px",
			right: "unset",
			top: "0px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Forde",
		hp1: 70, total1: 70, mt1: 8, hit1: 75, crit1: 40,
		hp2: 70, total2: 70, mt2: 8, hit2: 75, crit2: 40
	},

	bartre: {
		sheet1: {
			img: "files/warrior_axe_attack.png",
			width: 113, // 1008
			height:	87, // 636
			stand: 565,
			adv: 300,
			size: 452, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 2,
			fxTimes: 1,
			del_frames: 1, 
			i_del: 3,
			i_final: 3,
			fps: 100,

			//css
			position: "relative",
			left: "75px",
			right: "",
			top: "5px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/warrior_axe_critical.png",
			width: 117, // 1008
			height:	89, // 636
			stand: 1053,
			adv: 300,
			size: 936 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 0, 
			i_del: null,
			i_final: 7,
			fps: 70,

			//css
			position: "relative",
			left: "70px",
			right: "unset",
			top: "4px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Bartre",
		hp1: 70, total1: 70, mt1: 11, hit1: 60, crit1: 20,
		hp2: 70, total2: 70, mt2: 11, hit2: 60, crit2: 20
	},

	guy: {
		sheet1: {
			img: "files/swordmasterm_sword_attack.png",
			width: 133, // 1008
			height:	105, // 636
			stand: 931,
			adv: 540,
			size: 798, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 2,
			fxTimes: 1,
			del_frames: 2, 
			i_del: 5,
			i_final: 5,
			fps: 80,

			//css
			position: "relative",
			left: "80px",
			right: "",
			top: "-9px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/swordmasterm_sword_critical.png",
			width: 201, // 1008
			height:	141, // 636
			stand: 1809,
			adv: 300,
			size: 1608 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 0, 
			i_del: null,
			i_final: 7,
			fps: 70,

			//css
			position: "relative",
			left: "79px",
			right: "unset",
			top: "9px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Guy",
		hp1: 50, total1: 50, mt1: 7, hit1: 85, crit1: 80,
		hp2: 50, total2: 50, mt2: 7, hit2: 85, crit2: 80
	},


	dark: {
		sheet1: {
			img: "files/ike_sword_aether1.png",
			width: 240, // 1008
			height:	160, // 636
			stand: 960,
			adv: 540,
			size: 720, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 7,
			fxTimes: 1,
			del_frames: 0, 
			i_del: null,
			i_final: 7,
			fps: 100,

			//css
			position: "relative",
			left: "70px",
			right: "",
			top: "16px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/lyn_sword_critical2.png",
			width: 220, // 1008
			height:	144, // 636
			stand: 1980,
			adv: 300,
			size: 1760 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 2, 
			i_del: 9,
			i_final: 9,
			fps: 100,

			//css
			position: "relative",
			left: "94px",
			right: "unset",
			top: "18px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Kuro Heart",
		hp1: 200, total1: 200, mt1: 20, hit1: 1000, crit1: 1,
		hp2: 200, total2: 200, mt2: 20, hit2: 1000, crit2: 1
	},

	void: {
		sheet1: {
			img: "files/void_eliwood_lance_attack.png",
			width: 143, // 1008
			height:	89, // 636
			stand: 858,
			adv: 300,
			size: 715, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 3,
			fxTimes: 1,
			del_frames: 1, 
			i_del: 5,
			i_final: 5,
			fps: 130,

			//css
			position: "relative",
			left: "86px",
			right: "",
			top: "2px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/void_eliwood_lance_critical.png",
			width: 153, // 1008
			height:	82, // 636
			stand: 1071,
			adv: 300,
			size: 918 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 3,
			fxTimes: 2,
			del_frames: 2, 
			i_del: 5,
			i_final: 5,
			fps: 130,

			//css
			position: "relative",
			left: "69px",
			right: "unset",
			top: "5px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Void Eliw", 
		hp1: 70, total1: 70, mt1: 15, hit1: 90, crit1: 10,
		hp2: 180, total2: 180, mt2: 15, hit2: 90, crit2: 10
	},

	empty1: {
		sheet1: {
			img: "files/swordmasterm_sword_attack.png",
			width: 133, // 1008
			height:	105, // 636
			stand: 931,
			adv: 540,
			size: 798, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 2,
			fxTimes: 1,
			del_frames: 2, 
			i_del: 5,
			i_final: 5,
			fps: 80,

			//css
			position: "relative",
			left: "80px",
			right: "",
			top: "-9px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/swordmasterm_sword_critical.png",
			width: 201, // 1008
			height:	141, // 636
			stand: 1809,
			adv: 300,
			size: 1608 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 0, 
			i_del: null,
			i_final: 7,
			fps: 70,

			//css
			position: "relative",
			left: "79px",
			right: "unset",
			top: "9px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Vazio",
		hp1: 0, total1: 0, mt1: 0, hit1: 0, crit1: 0,
		hp2: 0, total2: 0, mt2: 0, hit2: 0, crit2: 0
	},

	empty2: {
		sheet1: {
			img: "files/swordmasterm_sword_attack.png",
			width: 133, // 1008
			height:	105, // 636
			stand: 931,
			adv: 540,
			size: 798, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 2,
			fxTimes: 1,
			del_frames: 2, 
			i_del: 5,
			i_final: 5,
			fps: 80,

			//css
			position: "relative",
			left: "80px",
			right: "",
			top: "-9px",
			bottom: "unset",
			fix_p2_left: 0
		},

		sheet2: {
			img: "files/swordmasterm_sword_critical.png",
			width: 201, // 1008
			height:	141, // 636
			stand: 1809,
			adv: 300,
			size: 1608 , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 4,
			fxTimes: 1,
			del_frames: 0, 
			i_del: null,
			i_final: 7,
			fps: 70,

			//css
			position: "relative",
			left: "79px",
			right: "unset",
			top: "9px",
			bottom: "unset",
			fix_p2_left: 0
		},

		fades: {
			in: 500,
			out: 100
		},

		name: "Vazio",
		hp1: 0, total1: 0, mt1: 0, hit1: 0, crit1: 0,
		hp2: 0, total2: 0, mt2: 0, hit2: 0, crit2: 0
	},

}