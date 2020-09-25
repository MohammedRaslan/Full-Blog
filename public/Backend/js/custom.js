jQuery(document).ready(function ($){
    function RemoveActiveState(className) {
       $('body').find("."+className).removeClass(className);
  }
   function ajaxload(url=null,fatherdiv,tabactive=null,id=null,append=null){
          $('#loading').css({"display":"block"});
          RemoveActiveState(tabactive);
          url = id==null? url: url+"/"+id;
          var jqxhr = $.get(url, function(data) {
            $("."+fatherdiv).fadeOut(3,function(){
                $(this).empty();
                $(this).html(data);
                if(append !== null){
                    $(this).append(append);
                }
                $(this).fadeIn();
            });
          }).done(function() {
          $('#loading').css({'display':'none'});
          return true;
        }).fail(function(data){
          $('#loading').css({'display':'none'})
            alert('Something went wrong!');
            return false;
        });
   }

   $(document).on('submit','#changeColor',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/color',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Color Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Color Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#changeSocials',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/socials',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Socials Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Socials Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#changeHomePage',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/homepage',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Home Page Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Home Page Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#changeMetas',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/metas',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Meta Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Meta Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#editHeading',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/headings',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Headings Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Headings Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#changeNavbar',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/navbar',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Navbar Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Navbar Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#changeNavbarStatus',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/navbarShow',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Navbar Status Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Navbar Status Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#changeCredentials',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/admin/password',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Credentials Changed", "Thank You For Your Trust!", "success");
        }else{
            swal("Credentials Not Changed", "There is something wrong!", "warning");

        }

      },
  });
  });
  
  $(document).on('submit','#addAdmin',function(event){
    $form =$(this);
    $email = $('.email').val();
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/admin/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == "true"){
            $tr = ` <tr>
            <th class="text-center">`+$email+`</th>
            <td class="text-center">
            <button id="`+response['id']+`" class="btn btn-danger deleteAdmin">Delete Admin</button>
            </td>
        </tr>`;
            $table = $('.tbl').append($tr);
            swal("Admin Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Admin Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.deleteAdmin',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/settings/admin/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Admin Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Admin file is safe!");
        }
      });
 
  });


  $(document).on('submit','#companyInfo',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/settings/company',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Company Info Updated", "Thank You For Your Trust!", "success");
        }else{
            swal("Company Info Not Updated", "There is something wrong!", "warning");

        }

      },
  });
  });


  $(document).on('submit','#ChangeLogo',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/about/logo',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Company Logo Updated", "Thank You For Your Trust!", "success");
        }else{
            swal("Company Logo Not Updated", "There is something wrong!", "warning");

        }

      },
  });
  });
  
  $(document).on('submit','#changeHistory',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/about/history',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Company History Updated", "Thank You For Your Trust!", "success");
        }else{
            swal("Company History Not Updated", "There is something wrong!", "warning");

        }

      },
  });
  });


  $(document).on('submit','#changeMission',function(event){
    $form =$(this);
   
    event.preventDefault();
    $.ajax({
      url: '/admin/about/mission',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Company Mission Updated", "Thank You For Your Trust!", "success");
        }else{
            swal("Company Mission Not Updated", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#changeVision',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/about/vision',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Company Mission Updated", "Thank You For Your Trust!", "success");
        }else{
            swal("Company Mission Not Updated", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.addSkillToggle',function(event){
    $('.skillContainer').slideToggle();
  });

  $(document).on('submit','#storeSkill',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/about/skills/addskill/store',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
            $tr = 
            `
            <tr>
            <th class="text-center"><input class="form-control" type="text" name="name" value="`+response['name']+`"></th>
            <td class="text-center"><input class="form-control" type="text" name="pourcentage" value="`+response['pourcentage']+`"></td>
            <td class="text-center">
                <button class="updateSkill btn btn-primary btn-sm" id="`+response['id']+`">Update Skill</button>
                <button class="deleteSkill btn btn-danger btn-sm" id="`+response['id']+`"">Delete Skill</button>
            </td>
        </tr>
            `;
            $('.skillTbl').append($tr);
            swal("Skill Created Successfully", "Thank You For Your Trust!", "success");
           
        }else{
            swal("Skill Not Created", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.deleteSkill',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this skill file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/about/skills/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Skill Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Skill file is safe!");
        }
      });
  });

  /*$(document).on('click','.updateSkill',function(event){
    $form =$(this);
    event.preventDefault();
    $id  =   $('.id').val();
    $name  = $('.nameSkill').val(); 
    $perc  = $('.percSkill').val();
    $.ajax({
      url: '/admin/about/skills/update/'+$id+'/'+$name+'/'+$perc,
      type: 'post',
      dataType: 'JSON',
      success: function(response){
        if(response == true){
            swal("Skill Updated", "Thank You For Your Trust!", "success");
        }else{
            swal("Skill Mission Not Updated", "There is something wrong!", "warning");

        }

      },
  });
  });*/

  $(document).on('click','.add-new-slider',function(event){
        $('.newSlider').slideToggle();
  });

  $(document).on('submit','#addSlider',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/slider/store',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
            swal("Slider Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Slider Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.delete-slider',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/slider/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('.card').fadeOut();
                  }
            }
        });
          swal("The Admin Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Admin file is safe!");
        }
      });
  });

  $(document).on('click','.addFeature',function(event){
    $('.FeatureContainer').slideToggle();
  });
  
  
  
  $(document).on('submit','#storeFeature',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/features/store',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
            <tr>
            <th class="text-center p-4">`+response['title']+`</th>
            <td class="text-center"><i style="font-size: 34px" class="fa `+response['icon']+`"></i></td>
            <td class="text-center">
                <a href="{{ route('edit.feature', ['id'=>`+response['id']+`]) }}" class="btn btn-primary btn-sm">Edit Feature</a>
                <button id=`+response['id']+` class="btn btn-danger btn-sm">Delete Feature</button>
            </td>
        </tr>
            `;

            $('.Featuretbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });


  $(document).on('click','.delete-feature',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/features/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Feature Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Feature file is safe!");
        }
      });
  });

  $(document).on('submit','#addService',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/service/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
                <th class="text-center p-4">`+response['title']+`</th>
                <td class="text-center">
                    <a class="btn btn-primary" href="{{ route('edit.service', ['id'=>`+response['id']+`]) }}">Edit Service</a>
                    <button class="delete-service btn btn-danger" id=`+response['id']+` title="">Delete Service</button>
                </td>
            </tr>
            `;

            $('.servicetbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });
  
  
  $(document).on('click','.delete-service',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this service!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/services/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Service Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Service file is safe!");
        }
      });
  });

  $(document).on('click','.addContainerContainer',function(event){
    $('.counterContainer').slideToggle();
  });

  $(document).on('submit','#AddCounter',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/counter/store',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
                <th class="text-center p-4">`+response['title']+`</th>
                <td class="text-center">`+response['number']+`</td>
                <td class="text-center">
                    <a class="btn btn-primary" href="{{ route('edit.service', ['id'=>`+response['id']+`]) }}">Edit Counter</a>
                    <button class="delete-counter btn btn-danger" id=`+response['id']+` title="">Delete Counter</button>
                </td>
            </tr>
            `;

            $('.countertbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });
  


  $(document).on('click','.delete-counter',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this counter!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/counter/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Counter Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Counter file is safe!");
        }
      });
  });


  $(document).on('submit','#AddPartner',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/partner/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
          <th class="text-center">
             `+response['name']+`
          </th>
          <td class="text-center">
              Uploading
          </td>
          <td class="text-center">
              <a href="{{ route('edit.partner',['id'=> `+response['id']+`]) }}" class="btn btn-primary">Edit Partner</a>
              <button id="`+response['id']+`" class="btn btn-danger">Delete Partner</button>
          </td>
      </tr>
            `;

            $('.Partnertbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });


  $(document).on('click','.delete-partner',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this counter!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/partner/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Partner Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Partner file is safe!");
        }
      });
  });


  $(document).on('submit','#AddPricing',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/package/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
          <th style="vertical-align:middle;" class="text-center">`+response['title']+`<br><i style="margin-top:20px;font-size: 32px;"class="fa `+response['icon']+`"></i></th>
          <td style="vertical-align:middle;"  class="text-center">
              <a class="btn btn-primary btn-sm" href="/admin/package/edit/`+response['id']+`">Edit Package Infos</a><hr>
              <a class="btn btn-info btn-sm" href="/admin/package/features/edit/`+response['id']+`">Add & Edit Package Features</a><hr>
              <button class="delete-package btn btn-danger btn-sm" id=`+response['id']+` title="">Delete Package</button>
          </td>
      </tr>
            `;

            $('.pricingtbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.delete-package',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this package!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/package/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Package Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Package file is safe!");
        }
      });
  });

  
  $(document).on('submit','#addTestmonial',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/testimonial/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
          <th class="text-center">
              `+response['name']+`
          </th>
          <td class="text-center">
              <a href="/admin/testimonials/edit/`+response['id']+`" class="btn btn-primary">Edit Testimonial</a>
              <button id="`+response['id']+`" class="delete-testmonial btn btn-danger">Delete Testimonial</a>
          </td>
      </tr>
            `;

            $('.testmonialtbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });


  $(document).on('click','.delete-testmonial',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this package!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/testimonial/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Testmonial Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Testmonial file is safe!");
        }
      });
  });

  $(document).on('submit','#addTeam',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/team/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
          <th class="text-center">
              `+response['lname']+` `+response['fname']+`
          <td class="text-center">
              <a href="/admin/team/edit/`+response['id']+`" class="btn btn-primary">Edit Member</a>
          <button id="`+response['id']+`" class="delete-member btn btn-danger">Delete Member</button>
          </td>
      </tr>
            `;

            $('.teamtbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.delete-member',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this member!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/team/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                  }
            }
        });
          swal("The Member Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Member file is safe!");
        }
      });
  });

  $(document).on('submit','#addCategory',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/projects/category/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
              <th class="text-center">`+response['name']+`</th>
              <td class="text-center">
                  <a class="btn btn-primary btn-sm" href="/admin/projects/category/edit/`+response['id']+`">Edit Category</a>
                  <button class="delete-category btn btn-danger btn-sm" id="`+response['id']+`" >Delete Category</button>
              </td>
          </tr>
            `;

          $catTr = `<option value=`+response['id']+`>`+response['name']+`</option>`;
          $('.categorySelect').append($catTr);

            $('.categorytbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.delete-category',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Category!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/projects/category/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                     $(".categorySelect option[value="+$id+"]").remove();
                  }
            }
        });
          swal("The Category Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Category file is safe!");
        }
      });
  });

  $(document).on('submit','#addProject',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/projects/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
          <th class="text-center">`+response['name']+`</th>
          <td class="text-center">
              <a class="btn btn-primary btn-sm" href="/admin/projects/edit/`+response['id']+`">Edit Project</a>
              <button class="delete-project btn btn-danger btn-sm" id="`+response['id']+`" >Delete Project</button>
          </td>
      </tr>
            `;

            $('.projecttbl').append($tr);
            swal("Feature Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Feature Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.delete-project',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Category!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/projects/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                     
                  }
            }
        });
          swal("The Project Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Project file is safe!");
        }
      });
  });

  $(document).on('submit','#addpost',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/posts/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
            <td class="text-center">
                Uploading Please Refresh
            </td>
            <th style="vertical-align: middle;" class="text-center">
                `+response['title']+`
            </th>
            <td class="text-center" style="vertical-align: middle;">
                <a href="/admin/posts/edit/`+response['id']+`" class="btn btn-primary btn-sm">Edit Post</a>
            <button id="`+response['id']+`" class="delete-post btn btn-danger btn-sm">Delete Post</button>
            </td>
        </tr>
            `;

            $('.posttbl').append($tr);
            swal("Post Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Post Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.delete-post',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Category!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/posts/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                     
                  }
            }
        });
          swal("The Post Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Post file is safe!");
        }
      });
  });

  $(document).on('submit','#addfaq',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/faqs/add',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
          <th class="text-center p-4">`+response['question']+`</th>
          <td class="text-center">
              <a class="btn btn-primary" href="/admin/faqs/edit/`+response['id']+`">Edit Faq</a>
          <button class="delete-faq btn btn-danger" id="`+response['id']+`" title="">Delete Faq</button>
          </td>
      </tr>
            `;

            $('.faqtbl').append($tr);
            swal("Faq Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Faq Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('click','.delete-faq',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this FAQ!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/admin/faqs/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                     
                  }
            }
        });
          swal("The Post Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Post file is safe!");
        }
      });
  });

  $(document).on('click','.delete-sub',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Subscriber!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/subscriber/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                     
                  }
            }
        });
          swal("The Subscriber Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Subscriber file is safe!");
        }
      });
  });

  $(document).on('click','.delete-message',function(event){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Message!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $this =$(this);
            event.preventDefault();
            $id = $this.attr('id');
            $.ajax({
                url: '/messages/delete/'+$id,
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                  if(response == true){
                     $this.closest('tr').fadeOut();
                     
                  }
            }
        });
          swal("The Message Was Deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Message file is safe!");
        }
      });
  });

  $(document).on('submit','#subscribeMail',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/addsubscriber',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
   
            swal("Mail Sent", "Thank You For Your Trust!", "success");
        }else{
            swal("Mail Not Send", "There is something wrong!", "warning");

        }

      },
  });
  });

  $(document).on('submit','#sendMessage',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/sendmessage',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response == true){
    
            swal("Message Sent", "Thank You For Your Trust!", "success");
        }else{
            swal("Message Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });
  
  /*$(document).on('click','.newPage',function(event){
    $('.pageContainer').slideToggle();
  });
  
  $(document).on('submit','#addpage',function(event){
    $form =$(this);
    event.preventDefault();
    $.ajax({
      url: '/admin/pages/add/store',
      method: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response){
        if(response['status'] == true){
          $tr=  `
          <tr>
          <th class="text-center p-4">`+response['title']+`</th>
          <td class="text-center">
              <a href="/admin/pages/edit/`+response['id']+`" class="btn btn-primary btn-sm">Edit Page</a>
              <button id="`+response['id']+`" class="delete-page btn btn-danger btn-sm">Delete Page</button>
          </td>
      </tr>
            `;

            $('.faqtbl').append($tr);
            swal("Faq Added", "Thank You For Your Trust!", "success");
        }else{
            swal("Faq Not Added", "There is something wrong!", "warning");

        }

      },
  });
  });*/

  // Control About Visisablity 
 
    $('#ChangeAboutVis').change(function () {
        let status = $(this).prop('checked') === true ? 'show' : 'hide';
        let navId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/about/status',
            data: {'status': status, 'nav_id': navId},
            success: function (data) {
              swal("Updated", "Thank You For Your Trust!", "success");
       
            }
        });
    });

  // Control Slider Visisablity 

    $('#ChangeSliderVis').change(function () {
      let status = $(this).prop('checked') === true ? 'show' : 'hide';
      let homeId = $(this).data('id');
      $.ajax({
          type: "GET",
          dataType: "json",
          url: '/admin/slider/status',
          data: {'status': status, 'home_id': homeId},
          success: function (data) {
            swal("Updated", "Thank You For Your Trust!", "success");
          }
      });
  });

// Control Feature Visisablity  

  $('#ChangeFeatureNavVis').change(function () {
    let status = $(this).prop('checked') === true ? 'show' : 'hide';
    let navId = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '/admin/features/Navstatus',
        data: {'status': status, 'nav_id': navId},
        success: function (data) {
          swal("Updated", "Thank You For Your Trust!", "success");
   
        }
    });
});

$('#ChangeFeatureVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let homeId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/features/Homestatus',
      data: {'status': status, 'home_id': homeId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
      }
  });
});

// Control Services Visisablity  
$('#ChangeServicesNavVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let navId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/services/Navstatus',
      data: {'status': status, 'nav_id': navId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
 
      }
  });
});

$('#ChangeServicesVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let homeId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/services/Homestatus',
      data: {'status': status, 'home_id': homeId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
      }
  });
});

// Control Counter Visiability

$('#ChangeCounterVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let homeId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/counter/Homestatus',
      data: {'status': status, 'home_id': homeId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
      }
  });
});

  // Control Partner Visiability
  $('#ChangePartnerVis').change(function () {
    let status = $(this).prop('checked') === true ? 'show' : 'hide';
    let homeId = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '/admin/partner/Homestatus',
        data: {'status': status, 'home_id': homeId},
        success: function (data) {
          swal("Updated", "Thank You For Your Trust!", "success");
        }
    });

});

// Control Pricing Visiabilty

$('#ChangePriceNavVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let navId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/package/Navstatus',
      data: {'status': status, 'nav_id': navId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
 
      }
  });
});

$('#ChangePriceVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let homeId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/package/Homestatus',
      data: {'status': status, 'home_id': homeId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
      }
  });
});

// Control Testmonials Visiability
$('#ChangeTestimonialNavVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let navId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/testimonials/Navstatus',
      data: {'status': status, 'nav_id': navId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
 
      }
  });
});

$('#ChangeTestimonialVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let homeId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/testimonials/Homestatus',
      data: {'status': status, 'home_id': homeId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
      }
  });
});

// Control Team Visiability

$('#ChangeProjectNavVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let navId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/projects/Navstatus',
      data: {'status': status, 'nav_id': navId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
 
      }
  });
});

$('#ChangeProjectVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let homeId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/projects/Homestatus',
      data: {'status': status, 'home_id': homeId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
      }
  });
});

// Control FAQ Visiability
$('#ChangeFaqNavVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let navId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/Faq/Navstatus',
      data: {'status': status, 'nav_id': navId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
 
      }
  });
});

$('#ChangeFaqVis').change(function () {
  let status = $(this).prop('checked') === true ? 'show' : 'hide';
  let homeId = $(this).data('id');
  $.ajax({
      type: "GET",
      dataType: "json",
      url: '/admin/Faq/Homestatus',
      data: {'status': status, 'home_id': homeId},
      success: function (data) {
        swal("Updated", "Thank You For Your Trust!", "success");
      }
  });
});

});
