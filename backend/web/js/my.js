/**
 * Created by root on 30.06.17.
 */




$( document ).ready(function() {
    var imagesList=[];
    var albumName;
    $( ".my" ).on( "click", function() {

        var splitImg=this.getAttribute('src').split('/');
        var imgName=splitImg[splitImg.length-1];
        albumName=splitImg[splitImg.length-2];
        if(this.style.opacity==='0.5'){
            imagesList.splice(imagesList.indexOf(imgName), 1);
            console.log(splitImg);
            this.style.opacity='1';
            return imagesList;
        }else{
            this.style.opacity='0.5';
            if(imagesList.indexOf(imgName)!==-1){
                return;
            }
            imagesList.push(imgName);
            console.log(imagesList);

            return imagesList;
        }

    });

    $('.del-photo').on('click', function () {


        if(imagesList.length!==0 && confirm('Вы уверенны, что хотите удалить фото??')){
            $.ajax({
                url:'/admin/gallery/del-item',
                type:'GET',
                data:{'images':imagesList, 'album':albumName},

            })
        }


    });

});


