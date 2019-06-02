// JavaScript Document
$(document).ready(function(){
    $('#modify').on('click', function(){
        $('#profile-content').load('modify.php');
    });
    $('#manage').on('click', function(){
        $('#profile-content').load('manage.php');
    });
});