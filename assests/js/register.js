// JavaScript Document
$(document).ready(function () {
    $(".havntRegister").click(function (e) {
        e.preventDefault();
        alert("Please fill in the registration form.");
    });
    $(".toggle-password").click(function () {
        $(this).toggleClass("passwordShow");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $('#submitProfile').on('click', function(){
        var chx = document.getElementsByTagName('input');
        for (var i=0; i<chx.length; i++) {
            if (chx[i].type == 'radio' && chx[i].checked) {
                var that=$('form.ajax'),
                url=that.attr('action'),
                method=that.attr('method'),
                data={
            
                };
                that.find('[name]').each(function(index, value){
                    var that=$(this),
                    name=that.attr('name'),
                    value=that.val();
                    data[name]=value;
        
                });
                if (name='gender'){
                    value=$(".radioInput:checked").val();
                    data[name]=value;
                };
                $.ajax({
                    url:url,
                    method:method,
                    data:data,
                    success: function(response){
                        if(response==1){
                            alert("Please enter a valid username. (lowercase with number)");
                        }
                        else if(response==2){
                            alert("Please enter a valid password. (lowercase, uppercase, number, {5,10})");
                        }
                        else if(response==3){
                            alert("Please enter a valid email.");
                        }
                        else if(response==4){
                            alert("Please enter a valid phone.");
                        }
                        else if(response==5){
                            alert("Please fill out all info.");
                        }
                        else if(response==6){
                            alert("Username exists.")
                        }
                        else{
                            alert("You have successfully registered.");
                            window.location.replace("dashboard.php");
                        }
                    }      
                });
            }
        }
    });
});

