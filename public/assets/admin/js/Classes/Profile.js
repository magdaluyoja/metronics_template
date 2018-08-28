;(function(global, $){
	const Profile = function(url,userId, usersName, username, email, password){
		return new Profile.init(url,userId, usersName, username, email, password);
	}
	Profile.init = function(url,userId, usersName, username, email, password){
		this.url = url || "";
		this.userId = userId || "";
		this.usersName = usersName || "";
		this.username = username || "";
		this.password = password || "";
		this.email = email ||"";
	}
	Profile.prototype = {
		getProperty:function(prop){
			return this.property;
		},
		reloadProfile:function(data){
			console.log(data);
			var d = new Date();
			if(data.first_name)$(".profile-name").text(data.first_name+" "+data.last_name)
			if(data.filename)$(".profile-img").attr("src","/uploads/images/"+data.filename+"?"+d.getTime())
		},
		enablePassowrds:function(valid){
			if(valid){
				$(".passwords").removeAttr("disabled");
				$("#new-password").focus();
			}else{
				$(".passwords").attr("disabled", "disabled");
				$(".passwords").val("");
			}
		},
		loadImg:function(data){
			var d = new Date();
			$("#profile-img").attr("src","/uploads/tmp/"+data.filename+"?"+d.getTime());
			$("#hdnAttachments").val(data.filename);
		},
		resetPasswordForm:function(src){
			$(".passwords").attr("disabled", "disabled");
			$(".passwords").val("");
			$("#old-password").val("");
		},
	}
	Profile.init.prototype = Profile.prototype;

	return global.Profile = Profile;
}(window,$));