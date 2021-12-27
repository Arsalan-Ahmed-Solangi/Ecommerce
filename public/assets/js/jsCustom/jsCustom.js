//Menu
function AjaxPage(url, containerid)
{
   $("#"+containerid).html('<br /><br /><div align="center"><i style="color: #6495ED">Please wait </i><img src="http://localhost/barabr/public/assets/img/loading.gif"/></div><br /><br />');
   $("#"+containerid).load(url,function(){
   });
}

//Global Delete Method for every one
function Delete(Route, id) {
   var _token = $('input[name="_token"]').val();
    swal({
  title: 'Are you sure?',
  text: "You won't be able to revert this, you will loss this entry and all related records with it forever!",
  type: 'error',
  showCancelButton: true,
  confirmButtonColor: '#d9534f',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Delete it!',
  cancelButtonText: 'No, cancel!',
  confirmButtonClass: 'btn btn-danger',
  buttonsStyling: false
        },
        function() {
      $.ajax({
      type: "DELETE",
      url: Route+'/'+id,
      data: { _token : _token },
      success: function(msg) {
         if(msg == 'SUCCESS')
             {
              $("#fa-delete"+id).closest('tr').fadeOut("fast");
             }else if(msg == "AccessIsDenied")
             {
              swal("Sorry..!","Access is Denied");
             }
      }
    });
    });
    $(".sweet-alert").addClass('notranslate');
};

function SelectSubLedger(iDefaultId, iLedgerType)
{
    sData = "IDefaultId="+iDefaultId+"&iLedgerType="+iLedgerType;
    $.ajax({
        type: "GET",
        url: "ChartOfAccountsHierarchize", data: sData,
        success: function(data)
        {
            $("#sl").html(data);
        }
    });
}

function AjaxFillList(router, sData, sTarget)
{
    sData = sData;
    $.ajax({
        type: "POST",
        url: router, data: sData,
        success: function(data)
        {

          //General Journal entries Code
          var table = document.getElementById("gjEntries"); //GeneralJournal Entries
          if(table != "null" && table != null && table != "" && table != "undefined" && sTarget != 'l')
          {
            tbodyRowCount = table.tBodies[0].rows.length;
            tbodyRowCount = (tbodyRowCount+1);

            for(i=0; i<tbodyRowCount;i++)
            {
              $("#"+sTarget + i).html(data);
              if(sTarget == "wa"){
                $("#wa"+i).multiselect("refresh");
                $("#wa"+i).multiselect().multiselectfilter();
                $('.ui-multiselect').css('width', '130px');
                $('.ui-multiselect').css('background', 'white');
                $('.ui-multiselect-menu').css('width', '250px');
              }
            }
            //Closing General Journal entries Code here
          }else
          {
            $("#"+sTarget).html(data);
          }
      
        }
    });
}

//add new chart of account row
function AddNewRow()
{
    alert("hey");
    $("#addNewCRow").html('<i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 24px; color: #87ceeb;"></i>');
  iVisibleLenTr = $('tr:visible').length;

    var inputs = $("#AppendTr").find($("input") );
   
    iNumber = inputs.length;
    
        $.ajax({ 
            type: "GET", 
            url: "AddNewChartOfAccountsRow/"+iNumber,
             success: function(data)
            {
                //alert(data);
               var arr=JSON.parse(data);
               $('#AppendTr').append(arr[0]);

               $("#addNewCRow").html('<a href="javascript:void(0);"" onclick="AddNewRow()" title="Add More"><i class="fa fa-plus-square" aria-hidden="true" style="font-size: 24px; color: #87ceeb;"></i></a>');
            }
        });
}

//add new General J Row
function AddNewGJRow()
{
  $("#addMore").html('<i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 24px; color: #87ceeb;"></i>');
  iVisibleLenTr = $('tr:visible').length;

  if(iVisibleLenTr > 100)
  {
    toastr["info"]("maximum limit reached, if need more rows contact barabr team", "Barabr Alert")
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

    $("#addMore").html('<a href="javascript:void(0);"" onclick="AddNewGJRow()" title="Add More"><i class="fa fa-plus-square" aria-hidden="true" style="font-size: 24px; color: #87ceeb;"></i></a>');
    return false;
  }else
  {
    iNumber = $('tr:visible:last','#gjEntriesTbody').attr('id');
    var iNumber = iNumber.replace(/\D/g, ""); 
    iNumber = (parseFloat(iNumber)+1);
    var iTownId = 0;
    var iLocationId = 0;
    var sStockDate = '';

    iTownId     = $("#town").val();
    iLocationId = $("#l").val();
    sStockDate  = $("#sdate").val();

    $.ajax({ 
            type: "GET", 
            url: "AddNewGJERow/"+iNumber+'/'+iTownId+'/'+iLocationId+'/'+sStockDate,
             success: function(sData)
            {
              sData = decodedStringAtoB = atob(sData);
              sData = decodeURIComponent(sData.replace(/\+/g, ' '));
              sData = decodedStringAtoB = atob(sData);
              sData = JSON.parse(sData);
              $('#gjEntriesTbody').append(sData[0]);
              $("#wa"+iNumber).multiselect().multiselectfilter(); //Multi select worker account
              $(".ui-multiselect").css("width", "130px");
              $(".ui-multiselect-menu").css("width", "250px");
              $(".ui-multiselect").css("background", "white");
              $('.select21').select2();

              $("#addMore").html('<a href="javascript:void(0);"" onclick="AddNewGJRow()" title="Add More"><i class="fa fa-plus-square" aria-hidden="true" style="font-size: 24px; color: #87ceeb;"></i></a>');
              
            }
        });

  }
}

function DeleteRow(iNumber){
  $("#"+iNumber).remove();
}

function DeleteRuleRow(iNumber){
  $("."+iNumber).remove();
  gtotal();
}

function CheckDuplicate(sValue, sFieldName, sModelName, sTarget, sPrintMsg, iRecordId)
  {
      ierror = 0;
      
    if(sFieldName == "UserName")
      {
        var UserNameformat = /^[0-9a-zA-Z]+$/;
        if(sValue.match(UserNameformat) && sValue.length >= 4)
        {
          $("#"+sTarget).parent().removeClass('has-error');
          $("#"+sTarget).parent().addClass('has-success');
          $("#"+sTarget).css("display", "none");
          $("#"+sTarget).empty();
          ierror--;

        }else
        {
          $("#"+sTarget).parent().addClass('has-error');

          if(sValue == "")
            $("#"+sTarget).html("username is required");
          else if(sValue.length <= 3)
            $("#"+sTarget).html("maximum 4 characters are required");
          else
            $("#"+sTarget).html("space & symbols are not allowed");

          $("#"+sTarget).css("display", "block");

          key = "warning";
          sMessage = "space & symbols are not allowed";
          ierror++;
        }
      }

    if (sValue)
    {

          if(sFieldName == "UserContactNumber")
            {
              if(sValue == "")
                $("#"+sTarget).parent().removeClass('has-error');

              if(sValue.length > 11 || sValue.length < 11)
              {
                $("#"+sTarget).parent().addClass('has-error');
                $("#"+sTarget).html("number length should be 11");
                $("#"+sTarget).css("display", "block");

                key = "warning";
                sMessage = "number length should be 11";

                ierror++;

              }else
              {
                $("#"+sTarget).parent().removeClass('has-error');
                $("#"+sTarget).parent().addClass('has-success');
                $("#"+sTarget).css("display", "none");
                $("#"+sTarget).empty();

                ierror--;
              }
            }else if(sFieldName == "UserEmail")
            {
              if(sValue == "")
                $("#"+sTarget).parent().removeClass('has-error');

              var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              if(sValue.match(mailformat))
              {
                $("#"+sTarget).parent().removeClass('has-error');
                $("#"+sTarget).parent().addClass('has-success');
                $("#"+sTarget).css("display", "none");
                $("#"+sTarget).empty();
                ierror--;
              }else
              {
                $("#"+sTarget).parent().addClass('has-error');
                $("#"+sTarget).html("invalid email");
                $("#"+sTarget).css("display", "block");

                key = "warning";
                sMessage = "invalid email";
                ierror++;
                
              }
            }
            

        if(ierror <= 0 )
        {
          $.ajax({
               type: 'post',
               url: 'CheckDuplication',
               data: {
                   '_token' : $('input[name=_token]').val(),
                   'sFieldName' : sFieldName,
                   'sValue' : sValue,
                   'sModelName' : sModelName,
                   'sPrintMsg' : sPrintMsg,
                   'iRecordId' : iRecordId
                  },
             success : function (msg)
             {
               var aMessage = msg.split("|");

                key = aMessage[0];

                sMessage = aMessage[1];

                if(key == "warning")
                {
                  $("#"+sTarget).parent().addClass('has-error');
                  $("#"+sTarget).html(sMessage);
                  $("#"+sTarget).css("display", "block");
                }else
                {
                    $("#"+sTarget).parent().removeClass('has-error');
                    $("#"+sTarget).parent().addClass('has-success');
                    $("#"+sTarget).css("display", "none");
                    $("#"+sTarget).empty();
                }

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

             },
            }); //ajax end 
        }
        
    }
  }

// if (typeof jQuery == 'undefined') {
//     alert("no jquery");
// }

$(window).ready(function () {
    $('#loading').fadeOut();
 });

function OpenModel()
{
  $('body').addClass('OpenModelSet');
}

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}