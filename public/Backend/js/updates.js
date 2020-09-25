jQuery(document).ready(function ($){
    $(document).on('submit','#submitAboutForm',function(e){
        e.preventDefault();
        
        //ajaxload('ImageAjax','ImgFather','',null,null);
           $.ajax({
             url: 'update.company',
             method: 'post',
             data: new FormData(this),
             dataType: 'JSON',
             contentType: false,
             cache: false,
             processData:false,
             success:function(response){
                 if(response == true){
                    Swal.fire(
                        'The Internet?',
                        'That thing is still around?',
                        'success'
                      )
                    
                 }
             }
           }).then(function(){
            
           });
          });
})