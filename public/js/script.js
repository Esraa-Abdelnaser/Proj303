$(document).ready(function (){
    $('#search').keyup(function (){
        var k = $('#search').val();
        $('#result').fadeIn();
        $('#result').text(k);
    });
});