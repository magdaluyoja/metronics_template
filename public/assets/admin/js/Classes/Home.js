;(function(global, $){
	const Home = function(){
		return new Home.init();
	}
	Home.init = function(){
	}
	Home.prototype = {
		showPreview:function(data){
			alert(data.section);
			$("."+data.section+data.id).removeClass("bd-danger");
			setTimeout(function(){window.open(data.urlPV)},3000);
		},
	}
	Home.init.prototype = Home.prototype;

	return global.Home = Home;
}(window,$));