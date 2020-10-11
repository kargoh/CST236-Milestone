$(document).ready(function(){
    var popup = $('.popup');
    $('.group').on('click', function(e){
        var thumbnail = $(this).find('.thumbnail').attr('src');
        var title = $(this).find('.title').text();
        var price = $(this).find('.price').text();
        var desc = $(this).find('.desc').text();
        popup.addClass('show');
        popup.find('.thumbnail').attr('src', thumbnail);
        popup.find('.title').html(title);
        popup.find('.price').html(price);
        popup.find('.desc').html(desc);
    });
    $('.close').on('click', function(e){
        e.preventDefault();
        popup.removeClass('show');
    });
});