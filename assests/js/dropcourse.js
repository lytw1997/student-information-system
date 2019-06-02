// JavaScript Document
$(document).ready(function(){
    $('#submitdrop').on('click', function(){
        $('#registercourse-content').load('dropcourse.php');
    });
    return false;
});