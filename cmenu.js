function ContextM(n, tot) {
	let menuVisible = false;
	var menu=document.getElementById("cmenu"+n);
	document.getElementById("img-"+n).addEventListener("contextmenu", e => {
		e.preventDefault();
		for (var i = 1, len = tot; i <= len; i++) {
			if (i !=n) document.getElementById("cmenu"+i).style.display ="none";
		}
		var left = e.pageX;
		var top = e.pageY;
		setPosition(left, top);
		return false;
	});
	
	function setPosition(left, top) {
		menu.style.left = `${left}px`;
		menu.style.top = `${top}px`;
		menu.style.display = "block";
		menuVisible = true;
	}

	window.addEventListener("click", e => {
		if(menuVisible) {
			menu.style.display ="none";
			
		}
	})
}
