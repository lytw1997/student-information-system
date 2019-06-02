// JavaScript Document
$(document).ready(function(){
    $(".toggle-password").click(function () {
        $(this).toggleClass("passwordShow");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    
    $('#submitmodify').on('click', function(){
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
        $.ajax({
            url:url,
            method:method,
            data:data,
            success: function(response){
                if(response==1){
                    alert("Please enter a valid email.");
                }
                else if(response==2){
                    alert("Please enter a valid phone.");
                }
                else if(response==3){
                    alert("Please fill out all info.");
                }
                else{
                    alert('Your email, phone and address have been changed.');
                    window.location.replace("profile.php");
                }
            }      
        });
    });
    return false;
});