require('../common.js');
require('../../global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');
require('jquery-sparkline');
require('../classes/Profile.js');

'use strict';
$(function () { 
    $("#frm-picture").submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        var formAction = $("#frm-picture").attr("action");

        if(formAction){
            $D().uplaodAttachment("POST",formAction,formData,"Profile","reloadProfile");

        }else{
            $M("warning", "Warning!", "No form action was defined. Please contact the developer").showToastrMsg();
        }
    });
    $("#frm-profile").submit(function(e){
        e.preventDefault();
        var formAction = $("#frm-profile").attr("action");

        if(formAction){
            // if (!$(this).jqBootstrapValidation("hasErrors")) {
                var frmJson = $D($("#frm-profile").serializeArray()).toJson();
                console.log(frmJson);
                $D().submitData("PUT",formAction,frmJson, "Profile", "reloadProfile");
            // }
        }else{
            $M("warning", "Warning!", "No form action was defined. Please contact the developer").showToastrMsg();
        }
    });
    $("#old-password").change(function(){
        if(this.value.trim()){
            $D().submitData("POST","/admin/profile/check-password",{"oldPassword":this.value}, "Profile", "enablePassowrds", true);
        }
    });
    $("#frm-password").submit(function(e){
        e.preventDefault();
        var pass = $("#old-password").val().trim();
        var conf = $("#new_password").val().trim();
        var confN = $("#confirm_new_password").val().trim();

        if( pass && conf){
            // if (!$(this).jqBootstrapValidation("hasErrors")) {
                var formAction = $(this).attr("action");
                $D().submitData("PUT",formAction,{"newPassword":confN}, "Profile","resetPasswordForm");
            // }
        }
    });
    // $("#frm-password").jqBootstrapValidation({sniffHtml: false});
    // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();        
});