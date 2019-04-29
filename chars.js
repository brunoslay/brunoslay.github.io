const chars = {
	erika1: {
		sheet1: {
			img: "files/erika.png",
			stand: 1100,
			adv: 300,
			size: 900, // deixar o size sempre 100 a menos do total. menos 200 se tiver dodge no ultimo frame
			colision: 400
		},

		sheet2: {
			img: "files/erikaCriti.png",
			stand: 1600,
			adv: 700,
			size: 1500, // deixar o size sempre 100 a menos do total
			colision: 1000
		},

		fades: {
			in: 500,
			out: 100
		},

		hp1: 100, mt1: 10, hit1: 80, crit1: 25,
		hp2: 100, mt2: 10, hit2: 80, crit2: 25
	},

	erika: {
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
			adj_line: 4,
			i_final: 5,
			divPos: 43,

			//css
			position: "relative",
			left: "81px",
			right: "",
			top: "-10px",
			bottom: "unset",
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
			adj_line: 6,
			i_final: 7,
			divPos: 38.7,

			//css
			position: "relative",
			left: "75px",
			right: "unset",
			top: "unset",
			bottom: "unset",
		},

		sheet3: {
			img: "files/eliwood_sword_dodge.png",
			width: 60, // 1008
			height:	49, // 636
			stand: 120,
			adv: 300,
			size: 120 - this.width , // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			divPos: 41.4
		},

		fades: {
			in: 500,
			out: 100
		},

		hp1: 100, mt1: 10, hit1: 100, crit1: 25,
		hp2: 100, mt2: 10, hit2: 100, crit2: 25
	},

	berserker: {
		sheet1: {
			img: "files/berserker_axe_attack.png",
			width: 85, // 1008
			height:	73, // 636
			stand: 255,
			adv: 300,
			size: 170, // deixar o size sempre 1 frame (144) a menos do total. menos 2 (288) se tiver dodge no ultimo frame
			colision: 1,
			fxTimes: 1,
			del_frames: 1, 
			adj_line: 1,
			i_final: 3,
			divPos: 43,

			//css
			position: "relative",
			left: "81px",
			right: "",
			top: "-10px",
			bottom: "unset",
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
			adj_line: 6,
			i_final: 7,
			divPos: 38.7,

			//css
			position: "relative",
			left: "75px",
			right: "unset",
			top: "unset",
			bottom: "unset",
		},

		fades: {
			in: 500,
			out: 100
		},

		hp1: 100, mt1: 10, hit1: 100, crit1: 0,
		hp2: 100, mt2: 10, hit2: 100, crit2: 0
	}
}