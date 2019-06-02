// JavaScript Document
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
                    alert("The user is exist.");
                }
                else if(response==2){
                    alert("Please enter a valid username. (lowercase with number)");
                }
                else if(response==3){
                    alert("Please enter a valid password. (lowercase, uppercase, number, {5,10})");
                }
                else{
                    alert('Your username or password have been changed.');
                    window.location.replace("profile.php");
                }
            }      
        });
    });
    return false;
});