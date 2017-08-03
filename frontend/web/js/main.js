$( document ).ready(function() {

    $( '.myImg' ).on( 'click', function() {

    var splitImg=this.getAttribute('src').split('/');
    var albumName=splitImg[splitImg.length-2];
    var imgName=splitImg[splitImg.length-1];


    console.log(imgName);
    $.ajax({
       url:'/gallery/show-carousel',
        type:'get',
        data:{'albumName':albumName, 'imgName':imgName},
        success:function (modalImg) {
           showCarousel(modalImg);
            console.log(modalImg);
        },


    });

    $('#modalImg').modal();

    });



});

function showCarousel(carousel){

    $('.carousel-inner').html(carousel)

}


