;(function(global, $){
	const Data = function(formData){
		return new Data.init(formData);
	}
	Data.init = function(formData){
		this.formData = formData || {};
	}
	Data.prototype = {
		toJson:function(){
			var jsonForm = {};
	        var a = this.formData;
	        $.each(a, function () {
	            if (jsonForm[this.name]) {
	                if (!jsonForm[this.name].push) {
	                    jsonForm[this.name] = [jsonForm[this.name]];
	                }
	                jsonForm[this.name].push(this.value || '');
	            } else {
	                jsonForm[this.name] = this.value || '';
	            }
	        });
	        return jsonForm;
		},
		submitData:function(submitType,formAction,jsonData,object,action,actionIfFalse,objectIfFalse){
			var self = this;
			$.ajax({
				dataType: 'json',
		        type:submitType,
		        url: formAction,
		        data:jsonData,
				beforeSend:function(){
					$('#loading_modal').modal("show");
				},
				success:function(response){
					console.log("Submit Data Response: " + response);
					if(response.success){
						$('#loading_modal').modal('hide');
						if(response.msg){
							$M("success", "Success!", response.msg).showToastrMsg();
						}
						if(action){
							window[object]()[action](response.data);
						}
					}else{
						$('#loading_modal').modal('hide');
						$M("error", "Error!", self.getError(response.error)).showToastrMsg();
						if(actionIfFalse){
							if(objectIfFalse){
								window[objectIfFalse]()[actionIfFalse](response.data);
							}else{
								window[object]()[action](response.data);
							}
						}
					}
					
				}
			});
		},
		uploadTmp:function(submitType,formAction,formData,object,action,extra_param){
			var self = this;
			$.ajax({
			    url: formAction,
			    type: submitType,
			    data: formData,
			    contentType: false,
			    beforeSend:function(){
					$('#loading_modal').modal("show");
				},
			    success: function (response) {
			    	console.log("Upload Temp Response: " + response);
			        if(response.success){
						$('#loading_modal').modal('hide');
						if(action){
							if(object==="Data"){	
								self[action](response.data, extra_param);
							}else{
								window[object]()[action](response.data, extra_param);
							}
						}
					}else{
						$('#loading_modal').modal('hide');
						$M("error", "Error!", self.getError(response.error)).showToastrMsg();
					}
			    },
			    cache: false,
			    processData: false
			});
			return this;
		},
		loadImg:function(data, section){
			var d = new Date();
			$("#img-"+section).attr("src","/uploads/tmp/"+data.filename+"?"+d.getTime());
			$("."+section+" #hdnAttachments"+section).val(data.filename);
		},
		validateAttachment:function(types, attachment){
			var files = "";
			var filenames = "";
			var errors = "";
			if(attachment.files.length > 0){
				for (var i = 0; i < attachment.files.length; ++i) {
				  	var name = attachment.files.item(i).name;
				  	var size = attachment.files.item(i).size;
				  	var filetype = name.split('.').pop();
				  	if(!types.includes(filetype)){
				  		errors += "<p>Invalid file, please select JPG or PNG image files.</p>" ;
				  	}
				  	if(size > 2000000){
				  		errors += "<p>File size exceeds maximum file size of 2MB.</p>" ;
				  	}
				}
			}else{
				errors += "<p>Please select a file.</p>" ;
			}
			return errors;
		},
		getError:function(error){
			var errorList = "";
			if(Array.isArray(error) || typeof error === "object"){
				$.each(error, function(key, value){
				    errorList += '<p>'+value+'</p>';
				});
			}else{
				errorList += '<p>'+error+'</p>';
			}
			return errorList;
		}
	}
	Data.init.prototype = Data.prototype;
	return global.Data = global.$D = Data;
}(window,$));