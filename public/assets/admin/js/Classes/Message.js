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
			"info":"#ff6849",
			"warning":"#f2a654",
			"success":"#12a967",
			"error":"#f96868",
		}
	}
	Message.prototype = {
		showToastrMsg:function(){
			$.toast({
	            heading: this.msgTitle,
	            text: this.msg,
	            position: 'top-right',
	            loaderBg: "rgba(220, 207, 53, 0.5)",
	            icon: this.msgType,
	            hideAfter: 3500,
	            stack: 6
	        });
			return this;
		}
	}

	Message.init.prototype = Message.prototype;

	return global.Message = global.$M = Message;
}(window,$));