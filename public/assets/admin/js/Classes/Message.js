;(function(global, $){
	const Message = function(msgType, msgTitle, msg, func, trxId){
		return new Message.init(msgType, msgTitle, msg, func, trxId);
	}
	Message.init = function(msgType, msgTitle, msg, func, trxId){
		this.msgType = msgType || "";
		this.msgTitle = msgTitle || "";
		this.msg = msg || "";
		this.trxId = trxId || "";
		this.func = func ||"";

		this.msgToastrType = {
			"info":"fa fa-info-circle",
			"warning":" fa-warning",
			"success":"fa fa-check-square-o",
			"error":"fa fa-times-circle",
		};
		this.txtColor = {
			"info":"blue",
			"warning":"yellow",
			"success":"green",
			"error":"red",
		};
	}
	Message.prototype = {
		showToastrMsg:function(){
			iziToast.show({
			    title: this.msgTitle,
			    message: this.msg,
			    icon:this.msgToastrType[this.msgType],
			    position: 'topRight',
			    backgroundColor: '',
			    theme: 'light', // dark
			    color: this.txtColor[this.msgType], // blue, red, green, yellow
			});
			return this;
		}
	}

	Message.init.prototype = Message.prototype;

	return global.Message = global.$M = Message;
}(window,$));