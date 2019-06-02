// JavaScript Document
$(document).ready(function(){
    $('#submitdrop2').on('click', function(){
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
                if (name='course'){
                    value=$(".radioInput:checked").val();
                    data[name]=value;
                };
                $.ajax({
                    url:url,
                    method:method,
                    data:data,
                    success: function(response){
                        if(response==1){
                            alert("Successfully drop a course.");
                            window.location.replace("registercourse.php");
                        }
                        else{
                            alert("Something go wrong.");
                        }
                    }      
                });
            }
        }
    });
    return false;
});