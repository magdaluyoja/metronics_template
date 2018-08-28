(function(){
	const Theme = function(theme){
		return new Theme.init(theme);
	}
	Theme.init  = function(theme){
		this.theme = theme || "";
	}
	Theme.prototype = {
		saveTheme:function(){
			$D().submitData('POST','/admin/save-theme',{theme:this.theme});
			return this;
		}
	}
	Theme.init.prototype = Theme.prototype;

	return window.Theme = Theme;
})($D);