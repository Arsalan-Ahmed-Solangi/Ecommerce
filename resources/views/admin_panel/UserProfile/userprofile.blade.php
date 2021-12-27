@extends('baseraUserDashboard/layouts/forms')

@section('formcontent')
<div class="panel panel-primary" id="panel">

    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-fw fa-star-half-empty"></i>
            @if($sAction == "AddNewData")
            Add New {{ $sTitle }}
            @endif
            
            @if($sAction == "EditData")
            Edit {{ $sTitle }}
            @endif
            @if($sAction == "ViewData")
            View {{ $sTitle }}
            @endif
        </h3>
        <span class="pull-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removepanel clickable"></i>
        </span>
    </div>

  <style type="text/css">
    button{
      margin-top: 5px;
    }
    .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group{
      margin-left: 2px;
    }

    .btn{
      padding: 0px 0px;
    }
    input[type="button"]
    {
        width:120px;
        height:60px;
        margin-left:35px;
        display:block;
        background-color:gray;
        color:white;
        border: none;
        outline:none;
    }

    .Short {  
    width: 100%;  
    margin-top: 5px;  
    height: 3px;  
    color: #dc3545;  
    font-weight: 500;  
    font-size: 12px;  
    text-align: center;
    }  
    .Weak {  
        width: 100%;  
        margin-top: 5px;  
        height: 3px;  
        color: #ffc107;  
        font-weight: 500;  
        font-size: 12px; 
        text-align: center; 
    }  
    .Good {  
        width: 100%;  
        margin-top: 5px;  
        height: 3px;  
        color: #28a745;  
        font-weight: 500;  
        font-size: 12px; 
        text-align: center; 
    }  
    .Strong {  
        width: 100%;
        margin-top: 5px;  
        height: 3px;  
        color: #d39e00;  
        font-weight: 500;  
        font-size: 12px; 
        text-align: center; 
    }
    .glyphicon{
      top:4px;
      background-color: white;
      color: purple;
    }

    /*Image Large Css*/

      /* Styles the thumbnail */

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: auto;
  top: auto;
  width: 90%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  width: 100%;
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  width: 8em
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 80px;
    right: 16px;
    color: white;
    font-size: 44px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}

.center {
  margin-left: auto;
  margin-right: auto;
}

    /*Closing Image Large Css*/
  </style>

     <div style="float: right; padding: 16px;"> <a href="#barabr" onclick="AjaxPage('Pages/BarabrSystemAdmin/Users/fa-User/fa-user', 'DivMainContainer');" title="back"><img src="{{asset('public/assets/img/back.png')}}" style="width:18px;"> Back </a></div>

      @if($sAction == "AddNewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Add New {{ $sTitle }} </div>
      @elseif($sAction == "ViewData")
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> View {{$aData['UserFullName'] }} </div>
      @else
        <div style="font-size: 1em; font-weight: bold; text-align: center; margin-top: 12px; color: purple;"> Edit {{$aData['UserFullName'] }} </div>
      @endif

     <div class="panel-body center-block" style="max-width: 70%;">

        @if($sAction == "AddNewData" || $sAction == "EditData")
         
        @if($sAction == "EditData")
        {!! Form::open(array('method'=>'PATCH','url'=>'SellerProfile','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}     
        <input type="hidden" name="hiddenVal" id="hiddenVal" value="{{ $aData['UserId'] }}">
        @else
        {!! Form::open(array('url'=>'SellerProfile','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!}

        <input type="hidden" name="hiddenVal" id="hiddenVal" value="0">

        @endif
        {!! csrf_field() !!}
        
          <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Full Name:</label>
                  <input type="text" name="ufname" id="ufname" class="form-control input-md input-xs GoSoftFinancialsForm input-sm" placeholder="Full Name" value="{{ $aData['UserFullName'] }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">Email:</label>
                  <input type="text" name="email" id="email" class="form-control input-md input-xs GoSoftFinancialsForm input-sm" placeholder="Full Name" value="{{ $aData['UserEmail'] }}" readonly="">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">User Password:</label>
                  <input type="password" name="upassword" id="upassword" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="******">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label required">Contact No:</label>
                  <input type="text" name="ucontactnumber" id="ucontactnumber" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="User Contact Number" value="{{$aData['ContactNo']}}" onblur="CheckDuplicate(this.value, 'UserContactNumber', 'Users', 'cinfo', 'number', $('#hiddenVal').val())" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <hr />
                    <label for="placement" class="control-label" style="font-weight: 700px; font-size: 18px;">Seller Info:</label>
                    <hr />
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">City:</label>
                  <input type="text" name="city" id="city" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="City" value="{{ $aData['UserCity'] }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">Address:</label>
                  <input type="text" name="address" id="address" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="address" value="{{ $aData['UserAddress'] }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">Account No:</label>
                  <input type="text" name="selleraccountno" id="selleraccountno" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="Account No" value="{{ $aData['SellerAccountNo'] }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">Sajal Tijari Certificate:</label>
                  <input type="file" name="sellersajaltijaricertificate[]" id="sellersajaltijaricertificate" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="seller Sajal Tijari Certificate">
                </div>
            </div>

            <div style="width: 100px;">

            <img id="myImg" src="{{ asset('public/assets/images/SellerSajalTijariNo/'.$aData['SajalTijariNo']) }}" alt="Snow" style="width:100%;max-width:300px">

            <!-- The Modal -->
            <div id="myModal" class="modal center">
              <span class="close" style="color: white;">&times;</span>
              <center>
              <img src="{{ asset('public/assets/images/SellerSajalTijariNo/'.$aData['SajalTijariNo']) }}"/>
              </center>
              <div id="caption"></div>
            </div>
      
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">VAT% No:</label>
                  <input type="text" name="vatno" id="vatno" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="VAT% No" value="{{ $aData['VatNo'] }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="placement" class="control-label">Location of Seller:</label>
                  <input type="text" name="Latitude" id="Latitude" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="Latitude" value="{{ $aData['Latitude'] }}">

                  <input type="text" name="Longitude" id="Longitude" class="form-control input-md input-xs GoSoftFinancialsForm" placeholder="Longitude" value="{{ $aData['Longitude'] }}">

                </div>
            </div>

           <div class="form-group form-actions">
               
              <div class="col-md-8 col-md-offset-4">
                <button type="button" id="ActionButtonEdit" name="ActionButtonEdit" class="button button-rounded button-highlight-flat hvr-pop">Update</button>
              </div>
               
            </div>

        {!! Form::close() !!}
                  
   
     @elseif($sAction == "ViewData")
      
     
      
      <table class="CustomeTable">

          <tr>
              <td> Full Name </td><td> {{ $aData['UserFullName'] }} </td>
          </tr>

          <tr>
              <td> Email </td><td> {{ $aData['UserEmail'] }} </td>
          </tr>

          <tr>
              <td> Contact No </td><td> {{ $aData['ContactNo'] }} </td>
          </tr>

          <tr>
              <td> City </td><td> {{ $aData['UserCity'] }} </td>
          </tr>

          <tr>
              <td> Latitude/Longitude: </td><td> {{ $aData['Latitude'] }} / {{ $aData['Longitude'] }}</td>
          </tr>
          
          
      </table>
     
       @endif
     
     </div>

                                           
  </div>

<script>

  $(function()
{
  $("#ActionButtonEdit").click(function ()
  {
    $("#ActionButton").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#ActionButton").attr("disabled", true);

    if($("#ufname").val() != "")
    {  
            let aFormData = new FormData();
            let ufname = $('#ufname').val();
            let ucontactnumber = $('#ucontactnumber').val();
            let city = $('#city').val();
            let address = $('#address').val();
            let selleraccountno = $('#selleraccountno').val();
            let vatno = $('#vatno').val();
            let Latitude = $('#Latitude').val();
            let Longitude = $('#Longitude').val();

            aFormData.append('_token', '{{csrf_token()}}');
            aFormData.append('_method', 'PATCH');
            aFormData.append('ufname', ufname);
            aFormData.append('ucontactnumber', ucontactnumber);
            aFormData.append('city', city);
            aFormData.append('address', address);
            aFormData.append('selleraccountno', selleraccountno);
            aFormData.append('vatno', vatno);
            aFormData.append('Latitude', Latitude);
            aFormData.append('Longitude', Longitude);

            let TotalImages = $('#sellersajaltijaricertificate')[0].files.length; 

            if(TotalImages > 0)
            {
                let images = $('#sellersajaltijaricertificate')[0]; 
                for (let i = 0; i < TotalImages; i++) {
                    aFormData.append('sellersajaltijaricertificate[]', images.files[i]);
                }

                aFormData.append('TotalImages', TotalImages);
            }

            var iId = $('#hiddenVal').val();
            route = 'SellerProfile';

            $.ajax(
            {
             type: 'post',
             url: 'SellerProfile/'+iId,
             data:aFormData,
             contentType: false,
             processData: false,
             success : function (msg)
             {
               var aMessage = msg.split("|");
              
               key = aMessage[0];

               sMessage = aMessage[1];

                toastr[key](sMessage, "Barabr Alert")

                toastr.options = 
                {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "timeOut": "6000",
                  "showEasing": "swing",
                  "hideEasing": "swing",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                if(key == "success")
                {
                  AjaxPage(route+'/'+iId, 'DivMainContainer');
                }

                $("#LoaderIcon").remove();
                $("#ActionButton").removeAttr("disabled");

             },
            }); //ajax close
        
      }
      else
      {

          toastr["error"]("fill in all the red star fields", "Basera Alert")

          toastr.options =
          {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "timeOut": "6000",
            "showEasing": "swing",
            "hideEasing": "swing",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }

          $("#LoaderIcon").remove();
          $("#ActionButton").removeAttr("disabled");

          return false;
      }
     
  });
});
    
</script>

<script type="text/javascript">
  
  $(document).ready(function () {  
    $('#upassword').keyup(function () {  
        $('#ps').html(checkStrength($('#upassword').val()))  
    })  

    function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) { 
            $("#ps").css("display", "block"); 
            $('#ps').removeClass()  
            $('#ps').addClass('Short')
            $("#ps").parent().addClass('has-error');  
            return 'Too short'  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $("#ps").css("display", "block");
            $('#ps').removeClass()  
            $('#ps').addClass('Weak')
            $("#ps").parent().removeClass('has-error');
            $("#ps").parent().addClass('has-success');  
            return 'Weak'  
        } else if (strength == 2) {  
            $("#ps").css("display", "block");
            $('#ps').removeClass()  
            $('#ps').addClass('Good')  
            $("#ps").parent().removeClass('has-error');
            $("#ps").parent().addClass('has-success');  

            return 'Good'  
        } else {  
            $("#ps").css("display", "block");
            $('#ps').removeClass()  
            $('#ps').addClass('Strong')
            $("#ps").parent().removeClass('has-error');
            $("#ps").parent().addClass('has-success');    
            return 'Strong'  
        }  
    }  
});  

</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


@stop