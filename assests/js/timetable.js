// JavaScript Document
$(document).ready(function () {
    $('#findCourse').on('click', function(){
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
                $('#timetable').html(response);
            }      
        });
    });
    return false;
});
