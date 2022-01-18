
$( document ).ready(function() {
    element = $('.affiche');
    centrerElement(element);
    $('a[href^="#navigation"]').click(function(){
        var the_id = $(this).attr("href");

        $('html, body').animate({
            scrollTop:$(the_id).offset().top
        }, 'slow');
        return false;
    });
    $('a[href^="#intro"]').click(function(){
        var the_id = $(this).attr("href");

        $('html, body').animate({
            scrollTop:$(the_id).offset().top
        }, 'slow');
        return false;
    });
});


function centrerElement(element)
{
	var largeur_fenetre = $(window).width();
	var hauteur_fenetre = $(window).height();
    if(largeur_fenetre < 905 || hauteur_fenetre < 920) {
        $('.intro').hide();
    }
}

