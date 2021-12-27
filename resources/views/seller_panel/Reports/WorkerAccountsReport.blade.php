@extends('barabrUserDashboard/layouts/forms')

@section('formcontent')

<style type="text/css">
.filer{
  max-width: 100%;
  border: 0px solid;
  border-style: inset;
  border-radius: 24px;
  border-color: gray;
  box-shadow: 5px 10px 18px #888888;
}
.title{
  color: purple;
  text-align: center;
  font-family: Monospace;
  font-weight: bold;
  line-height: 40px;
}
.well{
  background-color:#f5f5f5;
}
.ui-multiselect-filter input{
  color: gray;
  font-size: xx-small;
}
.ui-multiselect {
    color: purple;
    font-size: small;
    padding-left: 12px;
}

.fa-filter{
  font-size: 18px;
  color: purple;
  float:right;
  padding-right: 46px;
  cursor: pointer;
  margin-top: 8px;
}

.fa-refresh{
  font-size: 14px;
  color: purple;
  cursor: pointer;
}
#ReportContent{
  border-left: 1px solid #3b5998;
  border-right: 1px solid #3b5998;
  border-top: none;
  border-bottom: none;
  border-radius: 4px;
  color: black;
}
.account-title{
  text-align: center;
  font-feature-settings: "tnum";
  font-variant-numeric: tabular-nums;
  font-variation-settings: 'wght' 50;
  font-weight: bold;
}
#AccountDetail{
  font-size: x-small;
  letter-spacing: 0.5px;
  border-left: 2px solid #3b5998;
  border-radius: 12px;
  padding-left: 12px;
}
#AccountSummary{
  border-left: 2px solid #3b5998;
  border-right: 2px solid #3b5998;
  border-radius: 12px;
  font-size: x-small;
}
.badge{
  float: none;
}
.badgeBtn{
    display: inline-block;
    padding: 10px 4px;
    font-size: x-small;
    color: #fff;
    line-height: 1;
    white-space: nowrap;
    text-align: center;
    border-radius: 6px;
    margin-top: 12px;
    margin-left: 2px;
    cursor: pointer;
}
.ellipsis
{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 90px;
  margin-right: -5px;
  cursor: pointer;
}
.float-leftDiv {
    float:left;
    width: -1px;
}
.DivControl{
	float: left;
	width: -1px;
}
a{
	color: black;
}
input[type="checkbox"] {
  margin: 0px 4px 4px 2px;
  -ms-transform: scale(1); /* IE */
  -moz-transform: scale(1); /* FF */
  -webkit-transform: scale(1); /* Safari and Chrome */
  -o-transform: scale(1); /* Opera */
  transform: scale(1);
}

</style>

<!--- Criteria --->
<section class="content">
<div class="row well">

  <i class="fa fa-filter" aria-hidden="true" onclick="ShowHideCriteria();"></i>

  <div class="panel-body center-block filer" id="Criteria">

    {!! Form::open(array('url'=>'','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!} 
    {!! csrf_field() !!}

      <div class="title">
        {{ $Module . ' - ' . $Component }}
      </div>

      <small>Note: <br />press <i class="fa fa-refresh" id="TownRefresh" aria-hidden="true" style="font-size: 12px;"></i> to populate selected data. </small>
      <br />
      <br />
    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label required">Towns</label>
          <div>
            <select multiple id="town" name="town" class="form-control">
                    @foreach($TownsList as $index=>$val)
                      <option value='{{$val->TownId}}'>{{$val->TownName}}</option>
                    @endforeach
            </select>
            <i class="fa fa-refresh" id="TownRefreshbtn" aria-hidden="true" onclick="getLocationList()"></i>
          </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label required">Locations</label>
          <div>
            <select multiple id="location" name="location" class="form-control"> 
            </select>
            <i class="fa fa-refresh" id="LocationRefreshbtn" aria-hidden="true" onclick="getWorkerAccountsList()"></i>
          </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label required">Worker Accounts</label>
          <div>
            <select multiple id="wa" name="wa" class="form-control">
            </select>
          </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label required" style="padding-bottom: 10px;">From:</label>
             <input type="text" name="fdate" id="fdate" class="form-control input-group-sm" value="" style="width:180px; color: purple; height: 24px; background-color: #dfeffc; border: 1px solid #c5dbec; font-weight: bold;">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label required" style="padding-bottom: 10px;">To:</label>
             <input type="text" name="tdate" id="tdate" class="form-control input-group-sm" value="" style="width:180px; color: purple; height: 24px; background-color: #dfeffc; border: 1px solid #c5dbec; font-weight: bold;">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="placement" class="control-label" style="padding-bottom: 10px;">Continued</label>
             <input type="checkbox" id="ContinuedAccounts" name="ContinuedAccounts" value="1" checked="checked">
             <label for="placement" class="control-label" style="padding-bottom: 10px;">Closed</label>
             <input type="checkbox" id="ClosedAccounts" name="ClosedAccounts" value="0">
        </div>
    </div>

    <div class="title" style="padding-top: 4px;">
        <button type="button" class="button button-rounded button-highlight-flat hvr-pop" id="GenerateReport" name="GenerateReport">Generate</button>
    </div>

  {!! Form::close() !!}

  </div>
  
</div>
</section>
<!--- Closing Criteria --->


<section class="content" id="ReportContent" style="display: none;">
     
</section>

 <div id="myModal" class="modal fade animated" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center; color: purple;">
                <h5 class="modal-title" id="ModelTitle"></h5>
                <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
            </div>
            <div>
            	&nbsp;&nbsp;<small>Note: click on description to read more detail</small>
        	</div>
            <div class="modal-body" id="ModelContent">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    d = new Date();
    $("#tdate").datepicker({ dateFormat: "dd-M-yy" }).val()
    $("#tdate").datepicker().datepicker("setDate", new Date());

    $("#fdate").datepicker({ dateFormat: "dd-M-yy" }).val()
    $("#fdate").datepicker().datepicker("setDate", d.getMonth()-30);
    $('.ui-datepicker').css('display','none');
 });
</script>

<script type="text/javascript">
  
  function ShowHideCriteria()
  {
    $("#Criteria").toggle("slow");
  }

function getLocationList(iSelectedLocationId="")
{
  iTownId = $("#town").val();

  if(iTownId != "" && iTownId != null)
  {
      $("#TownRefreshbtn").addClass("fa-spin");
      $.ajax({
           type: 'POST',
           url: 'getMultipleLocations',
           data: {
               '_token' : $('input[name=_token]').val(),
               'iTownId' : iTownId
              },
         success : function (sData)
         {
            $("#location option").remove();
            aLocations = JSON.parse(sData);
            if(aLocations.length > 0 )
              {   
                for(var s = 0; s < aLocations.length; s++)
                {
                    bSelectedFlag = "";
                    if(aLocations[s][0] == iSelectedLocationId)
                        bSelectedFlag = "selected";
                    $("#location").append("<option value=\'"+aLocations[s][0]+"\' "+bSelectedFlag+">"+aLocations[s][1]+"</option>");
                }
                $("#location").multiselect("refresh");
                $('.ui-multiselect').css('width', '180px');
                $('.ui-multiselect-menu').css('width', '280px');
              }
         },
        });

    $("#TownRefreshbtn").removeClass("fa-spin");
  }
}

function getWorkerAccountsList(iSelectedWorkerAccountsId="")
{
  
  iLocationId = $("#location").val();
  if(iLocationId != null && iLocationId != "")
  {
    $("#LocationRefreshbtn").addClass("fa-spin");
    $.ajax({
           type: 'POST',
           url: 'getMultipleWorkerAccounts',
           data: {
               '_token' : $('input[name=_token]').val(),
               'iLocationId' : iLocationId
              },
         success : function (sData)
         {
            $("#wa option").remove();
            aData = JSON.parse(sData);
            if(aData.length > 0 )
              {   
                for(var s = 0; s < aData.length; s++)
                {
                    bSelectedFlag = "";
                    if(aData[s][0] == iSelectedWorkerAccountsId)
                        bSelectedFlag = "selected";
                    $("#wa").append("<option value=\'"+aData[s][0]+"\' "+bSelectedFlag+">"+aData[s][1]+"</option>");
                }
                $("#wa").multiselect("refresh");
                $('.ui-multiselect').css('width', '180px');
                $('.ui-multiselect-menu').css('width', '280px');
              }
         },
        });
    $("#LocationRefreshbtn").removeClass("fa-spin");
  }
}

</script>

<script type="text/javascript">

  $("#town").multiselect().multiselectfilter();
  $("#location").multiselect().multiselectfilter();
  $("#wa").multiselect().multiselectfilter();
  $('.ui-multiselect').css('width', '180px');
  $('.ui-multiselect-menu').css('width', '280px');

</script>

<script>

$("#GenerateReport").click(function ()
{
    $("#GenerateReport").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
    $("#GenerateReport").attr("disabled", true);
    if ($("#town").val() && $("#town").val() != "")
    {  

      iTownId          = $("#town").val();
      iLocationId      = $("#location").val();
      iWorkerAccountId = $("#wa").val();
      dFromDate        = $("#fdate").val();
      dToDate          = $("#tdate").val();

      var iContinuedAccounts = 0;
      var iClosedAccounts    = 0;

      if($("#ContinuedAccounts").is(':checked'))
      {
        iContinuedAccounts = 1;
      }
      if($("#ClosedAccounts").is(':checked'))
      {
        iClosedAccounts = 1;
      }

      $.ajax({
           type: 'POST',
           url: 'GenerateWorkerAccountsSummaryReport',
           data:
              {
               '_token'             : $('input[name=_token]').val(),
               'iTownId'            : iTownId,
               'iLocationId'        : iLocationId,
               'iWorkerAccountId'   : iWorkerAccountId,
               'dFromDate'          : dFromDate,
               'dToDate'            : dToDate,
               'iContinuedAccounts' : iContinuedAccounts,
               'iClosedAccounts'    : iClosedAccounts,
              },
            cache   : false,
             success : function (sResponse)
             {
                var aMessage = sResponse.split("|");
                sMessagekey = aMessage[0];
                sData = aMessage[1];

                sData = decodedStringAtoB = atob(sData);

                aWorkerAccountsData = decodeURIComponent(sData.replace(/\+/g, ' '));
                aWorkerAccountsData = decodedStringAtoB = atob(aWorkerAccountsData);
                aWorkerAccountsData = JSON.parse(aWorkerAccountsData);

                $("#ReportContent").html("");
                
                tTable = "";
                for (var key in aWorkerAccountsData)
                {
                    var dSaving       = 0;
                    var dWorkerSaving = 0;
                    var dOwnerShare   = 0;
                    var dExpenses     = 0;
                    var dIncomes      = 0;
                    var sEarningRate  = 0;
                    var iLocationId   = 0;
                    var dAcReceivable = 0;
                    var btnStatus     = "";
                    var StatusbgColor = "#006400";

                    dFromDate = aWorkerAccountsData[key]['dFromDate'];
                    dToDate   = aWorkerAccountsData[key]['dToDate'];

                    WorkerAccountTitle  = aWorkerAccountsData[key]['WorkerAccountTitle'];
                    WorkerName          = aWorkerAccountsData[key]['WorkerName'];
                    TownName            = aWorkerAccountsData[key]['TownName'];
                    LocationTitle       = aWorkerAccountsData[key]['LocationTitle'];
                    AreaTypeTitle       = aWorkerAccountsData[key]['AreaTypeTitle'];
                    EarningRate         = aWorkerAccountsData[key]['EarningRate'];
                    WorkerAccountStatus = aWorkerAccountsData[key]['WorkerAccountStatus'];
                    dExpenses           = parseInt(aWorkerAccountsData[key]['Expenses']);
                    dWorkerPersonalExp  = parseInt(aWorkerAccountsData[key]['WorkerPersonalExp']);
                    dIncomes            = parseInt(aWorkerAccountsData[key]['Incomes']);
                    iLocationId         = parseInt(aWorkerAccountsData[key]['LocationId']);
                    dAcReceivable       = parseInt(aWorkerAccountsData[key]['AcReceivable']);

                    if(WorkerAccountStatus == "Closed"){
                      btnStatus = "disabled";
                      StatusbgColor = "#8B0000";
                    }

                    if(dExpenses < 0 || dExpenses == "" || dExpenses == "undefined")
                      dExpenses = 0;

                    if(dWorkerPersonalExp < 0 || dWorkerPersonalExp == "" || dWorkerPersonalExp == "undefined")
                      dWorkerPersonalExp = 0;

                    if(dIncomes < 0 || dIncomes == "" || dIncomes == "undefined")
                      dIncomes = 0;

                    if(dAcReceivable < 0 || dAcReceivable == "" || dAcReceivable == "undefined")
                      dAcReceivable = 0;

                    if(isNaN(dExpenses))
                      dExpenses = 0;

                    if(isNaN(dWorkerPersonalExp))
                      dWorkerPersonalExp = 0;

                    if(isNaN(dIncomes))
                      dIncomes = 0;
                    
                    if(isNaN(dAcReceivable))
                      dAcReceivable = 0;

                    if(dIncomes > 0)
                      dSaving = (dIncomes-dExpenses);

                    if(EarningRate == 1)
                      dWorkerSaving = (dSaving/2);
                    else if(EarningRate == 2)
                      dWorkerSaving = (dSaving/4);
                  	else if(EarningRate == 3){
                  		dWorkerSaving = dSaving;
                  	}

                    if(EarningRate == 1)
                        sEarningRate = '<img src="{{ asset("public/assets/img/barabr/barabr_assets/1-2.png") }}" alt="logo"/ style=" width: 10px;">';
                    else if(EarningRate == 2)
                        sEarningRate = '<img src="{{ asset("public/assets/img/barabr/barabr_assets/1-4.png") }}" alt="logo"/ style=" width: 10px;">';
                    else if(EarningRate == 3)
                        sEarningRate = 'Salary';

                    if(dWorkerSaving <= 0) //Loss will not be count in worker saving
                      dWorkerSaving = 0;

                    dWorkerSaving = (dWorkerSaving-dWorkerPersonalExp);

                    if(EarningRate != 3)
                    {
                    	dOwnerShare = (dSaving-dWorkerSaving-dWorkerPersonalExp);
                    }

                    if(dAcReceivable > 0){
                      dWorkerSaving = (dWorkerSaving-dAcReceivable);
                      dOwnerShare = (dOwnerShare+dAcReceivable);
                    }
                    
                    dWorkerPersonalExp = addCommas(dWorkerPersonalExp);
                    dExpenses 	  	   = addCommas(dExpenses);
                    dIncomes 	  	     = addCommas(dIncomes);
                    dSaving 	  	     = addCommas(dSaving);
                    dWorkerSaving 	   = addCommas(dWorkerSaving);
                    dOwnerShare   	   = addCommas(dOwnerShare);
                    dAcReceivable      = addCommas(dAcReceivable);

                    tTable = '<div class="row well">'+
                  '<nav aria-label="breadcrumb"><input type="hidden" name="todate" id="todate" value="'+dToDate+'"><input type="hidden" name="fromdate" id="fromdate" value="'+dFromDate+'">'+
                    '<ol class="breadcrumb">'+
                      '<li class="breadcrumb-item"><a href="#">Report</a></li>'+
                      '<li class="breadcrumb-item"><a href="#">Worker Account</a></li>'+
                    '</ol>'+
                  '</nav>'+
                  '<div class="account-title">'+
                    '<span class="badge bg-secondary" style="font-size: x-small;" id="actitle'+key+'" title="'+ WorkerAccountTitle +'">'+ WorkerAccountTitle +'</span> &nbsp;<i class="fa fa-clone" aria-hidden="true" title="Copy Title" onclick="CopyTitle('+key+');"></i><br /><span id="copymsg'+key+'" style="display:none; color: green; font-size: xx-small;">Copied</span>'+
                  '</div>'+
                    '<div class="col-md-12 ">'+
                        '<div class="col-md-12" id="AccountDetail">'+
                            '<div style="margin-left: 14px; margin-bottom:4px; color: gray;">'+
                              '<small>'+
                                'Account Detail'+
                             '</small>'+
                            '</div>'+
                            '<div>'+
                              '<table class="table table-borderless" style="width: 260px; background-color: #F5F5F5; box-shadow: 0px 2px 5px #888888; font-family: Arial, Helvetica, sans-serif;">'+
                                '<tbody>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td>Worker:</td>'+
                                    '<td>' + WorkerName + '</td>'+
                                  '</tr>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td>Area/Quantity:</td>'+
                                    '<td>' + AreaTypeTitle + '</td>'+
                                  '</tr>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td>Earning Rate:</td>'+
                                    '<td>'+ sEarningRate +'</td>'+
                                  '</tr>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td>Town:</td>'+
                                    '<td>'+ TownName +'</td>'+
                                  '</tr>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td>Location:</td>'+
                                    '<td>'+ LocationTitle +'</td>'+
                                  '</tr>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td>Status:</td>'+
                                    '<td><span class="badge bg-success" style="background-color:'+StatusbgColor+'; color: white; font-weight: bold;" id='+key+'>'+ WorkerAccountStatus +'</span></td>'+
                                  '</tr>'+
                                '</tbody>'+
                              '</table>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-12 col-12" style="padding-top: 18px;" id="AccountSummary">'+
                            '<div style="margin-left: 14px; margin-bottom:4px; color: gray;">'+
                              '<small>'+
                                'Account Summary'+
                              '</small>'+
                            '</div>'+
                            '<div class="row px-3">'+
                              '<table class="table table-borderless">'+
                                '<tbody>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">';

                                if(EarningRate == 3)
                                {
                                	tTable += '<td style="color: black;"> Total Salary: </td>';
                                }else
                                {
                                	tTable += '<td><a href="#" class="" data-toggle="modal" data-target="#myModal" data-animate-modal="fadeIn" id="ChartOfAccountDetail'+key+'" onclick="OpenModel(); ChartOfAccountsDetail($(this).attr(\'id\'),11,'+iLocationId+');">Total Income: </a> </td>';
                                }

                                tTable +=    
                                    '<td>Rs. '+ dIncomes +'</td>'+
                                  '</tr>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td><a href="#" class="" data-toggle="modal" data-target="#myModal" data-animate-modal="fadeIn" id="ChartOfAccountDetail'+key+'" onclick="OpenModel(); ChartOfAccountsDetail($(this).attr(\'id\'),13,'+iLocationId+');">Total Expenses:</a></td>'+
                                    '<td>Rs. '+ dExpenses +'</td>';

                                  if(EarningRate != 3)
                                  {
                                    tTable +=
                                    '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                      '<td>Total Saving:</td>'+
                                      '<td>Rs. '+ dSaving +'</td>'+
                                    '</tr>';
                                  }

                                  tTable += '</tr>'+
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td><a href="#" class="" data-toggle="modal" data-target="#myModal" data-animate-modal="fadeIn" id="ChartOfAccountDetail'+key+'" onclick="OpenModel(); ChartOfAccountsDetail($(this).attr(\'id\'),0,'+iLocationId+');">Worker Taken:</a></td>'+
                                    '<td>Rs. '+ dWorkerPersonalExp +'</td>'+
                                  '</tr>';

                                  if(EarningRate != 3)
                                  {
                                  tTable += '<tr><td><a href="#" class="" data-toggle="modal" data-target="#myModal" data-animate-modal="fadeIn" id="ChartOfAccountDetail'+key+'" onclick="OpenModel(); ChartOfAccountsDetail($(this).attr(\'id\'),6,'+iLocationId+');">Ac. Receivable(AR) </a></td>'+
                                  '<td>Rs. ' + dAcReceivable + '</td>'+
                                  '</tr>';
                                  }

                                  tTable +=
                                  '<tr style="box-shadow: 0px 1px 1px #888888;">'+
                                    '<td>Worker Saving:</td>'+
                                    '<td>Rs. '+ dWorkerSaving +'</td>'+
                                  '</tr>';

	                              if(EarningRate != 3)
	                              {
	                              	 tTable += 
	                                '<tr style="box-shadow: 0px 1px 1px #888888;">'+
	                                    '<td>Owner Share:</td>'+
	                                    '<td>Rs. '+ dOwnerShare +'</td>'+
	                                '</tr>';
	                              }

                                 tTable +=
                                '</tbody>'+
                              '</table>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<center>'+
                      '<button class="badge bg-danger badgeBtn button button-rounded button-highlight-flat hvr-pop" style="background-color: #8B0000;" onclick="ClosedAccount('+key+')" id="btn'+key+'" '+btnStatus+'>Close Account</button>'+
                      '<button class="badge bg-secondary badgeBtn button button-rounded button-highlight-flat hvr-pop" style="background-color: #6c757d!important;" onclick="SMSSummary()">SMS Summary</button>'+
                    '</center>'+
                '</div>';

                  $("#ReportContent").append(tTable);

                }
                
                if(sMessagekey == "success")
                  sMessage = "Report Loaded Successfully..!";
                else if(sMessagekey == "error")
                  sMessage = "something went wrong at our side please wait..!";

                if(tTable == "" && sMessagekey == "success")
                {
                  sMessage = "no data found..!";
                  sMessagekey = "info";
                }

                toastr[sMessagekey](sMessage, "Barabr Alert")
                toastr.options = 
                {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": true,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": true,
                  "timeOut": "6000",
                  "showEasing": "swing",
                  "hideEasing": "swing",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                if(tTable != "")
                {
                  $("#Criteria").toggle("slow");
                  $("#ReportContent").fadeIn();
                  clearconsole();
                }
                
                
                $("#LoaderIcon").remove();
                $("#GenerateReport").removeAttr("disabled");
                
              
             },
        }); 
    }
    else
    {
        toastr["error"]("fill in all the red star fields", "Barabr Alert")
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
        $("#GenerateReport").removeAttr("disabled");

        return false;
    }
        
});

function clearconsole() 
 {  
   console.log(window.console);   
   if(window.console ) 
   {     
     console.clear();   
   } 
 } 

function SMSSummary()
{
  swal({
      title: "Service Unavailable?",
      text: "sms service currently Unavailable..!",
      type: "info",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ok!",
      closeOnConfirm: true,
      closeOnCancel: true
    });
  return false;
}

function ClosedAccount(iAccountId){
  swal({
      title: "Close?",
      text: "do you want to close this account!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, Close!",
      cancelButtonText: "No!",
      closeOnConfirm: true,
      closeOnCancel: true
    },
    function(isConfirm){
      if (isConfirm)
      {
        $.ajax({
                   type :'POST',
                   url  :'UpdateWorkerAccountStatus',
                   data :{
                       '_token' : $('input[name=_token]').val(),
                       'WorkerAccountId' : iAccountId
                      },
                 success : function (sResponse)
                 {

                  toastr["info"]("Worker Account Closed Successfully..!", "Barabr Alert")
                  toastr.options = 
                  {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": true,
                    "timeOut": "6000",
                    "showEasing": "swing",
                    "hideEasing": "swing",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }

                  $("#btn"+iAccountId).attr("disabled", true);
                  $("#"+iAccountId).html("");
                  $("#"+iAccountId).html("Closed");
                  $("#"+iAccountId).css({"background-color":"#8B0000"});
                 }
              })
      }
    });
}

</script>

<script type="text/javascript">
  
function ChartOfAccountsDetail(id,iChartOfAccountControlId,iLocationId)
{

  dFromDate = $("#fromdate").val();
  dToDate   = $("#todate").val();
  flag = "false";

  var iWorkerAccountId = id.replace(/\D/g, "");
  $.ajax({
           type: 'POST',
           url: 'GetChartOfAccountsDetails',
           data:
              {
               '_token'           : $('input[name=_token]').val(),
               'iChartOfAccountControlId' : iChartOfAccountControlId,
               'iLocationId'      : iLocationId,
               'iWorkerAccountId' : iWorkerAccountId,
               'dFromDate'        : dFromDate,
               'dToDate'          : dToDate
              },
              cache   : false,
             success : function (sResponse)
             {
                $("#ModelTitle span").remove();
                $("#ModelContent div").remove();
                $("#ModelContent table").remove();

               	var sSeprator = "";

                var aMessage = sResponse.split("|");
                sMessagekey = aMessage[0];
                sData = aMessage[1];
                sWorkerAccountTitle = aMessage[2];

                sWorkerAccountTitle = decodeURIComponent(sWorkerAccountTitle.replace(/\+/g, ' '));
                aWorkerAccountsData = sWorkerAccountTitle = atob(sWorkerAccountTitle);
                sWorkerAccountTitle = JSON.parse(sWorkerAccountTitle);

                sData = decodedStringAtoB = atob(sData);
                aWorkerAccountsData = decodeURIComponent(sData.replace(/\+/g, ' '));
                aWorkerAccountsData = decodedStringAtoB = atob(aWorkerAccountsData);
                aWorkerAccountsData = JSON.parse(aWorkerAccountsData);

                if(sWorkerAccountTitle != "")
                	sSeprator = " | ";

                if(iChartOfAccountControlId == 11)
                 sTitle = "<span>Incomes" + sSeprator + ' ' + sWorkerAccountTitle + "</span>";
                else if(iChartOfAccountControlId == 13)
                  sTitle = "<span>Expenses" + sSeprator + ' ' + sWorkerAccountTitle + "</span>";
                else if(iChartOfAccountControlId == 0)
                  sTitle = "<span>Worker Taken" + sSeprator + ' ' + sWorkerAccountTitle + "</span>";
                else if(iChartOfAccountControlId == 6)
                  sTitle = "<span>Ac. Receivable" + sSeprator + ' ' + sWorkerAccountTitle + "</span>";

                $("#ModelTitle").append(sTitle);

                iNo = 1;
                console.log(aWorkerAccountsData);
                for (var key in aWorkerAccountsData)
                {
                	sSeprator = "";
                  AccountsTitle            = aWorkerAccountsData[key]['AccountsTitle'];
                  ConsolidatedExp          = aWorkerAccountsData[key]['ConsolidatedExp'];
                  ShortDescription         = aWorkerAccountsData[key]['ShortDescription'];
                  ChartOfAccountsControlId = aWorkerAccountsData[key]['ChartOfAccountsControlId'];
                  aGJEEntries              = aWorkerAccountsData[key]['ChartOfAccountsEntries'];

                  if(ShortDescription != "" && ShortDescription != '-')
                  	sSeprator = " | ";

                  ConsolidatedExp = addCommas(ConsolidatedExp);

                  tTable = "<div style='width: 100%; height:36px; padding: 8px; background-color: #F5F5F5; border-bottom: 1px solid #F5F5F5; color: black; box-shadow: 0px 2px 5px #888888; font-family: Arial, Helvetica, sans-serif;'><div align='center' class='DivControl'>" + iNo + " . </div> <div align='center' class='DivControl ellipsis'><a href='#' onclick='ShowTitle($(this).text())' style='color: black;'>"+AccountsTitle+"</a></div><div align='center' class='float-leftDiv ellipsis'>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick='ShowTitle($(this).text())' style='color: black;'>"+ sSeprator + ShortDescription+"</a></div><div align='center' class='DivControl' style='float: right; padding-right: 4px;'>Rs. "+ConsolidatedExp+"</div></div>";

                  if(ChartOfAccountsControlId == 11 || ChartOfAccountsControlId == 12){
                   tTable += '<table class="table table-borderless" style="width: 100%; font-size: x-small;" id=t'+iNo+'>'+
                    '<thead><th>Description</th><th>Date</th><th>Amount</th></thead><tbody>'; 
                  }else{
                    tTable += '<table class="table table-borderless" style="width: 100%; font-size: small;" id=t'+iNo+'>'+
                    '<thead><th>Description</th><th>Date</th><th>Stock</th><th>Quantity</th><th>Amount</th></thead><tbody>';
                  }

                  iSubNo = 1;
                  
                  for (var Subkey in aGJEEntries)
                  {
                    ShortDescription = aGJEEntries[Subkey]['ShortDescription'];
                    TransactionDate = aGJEEntries[Subkey]['TransactionDate'];
                    var d = new Date(TransactionDate);
                    var dDay = d.getDate();
                    if(dDay <= 9){
                      dDay = ("0"+dDay);
                    }

                    var dMonth = d.getMonth();
                    if(dMonth <= dMonth)
                      dMonth = ("0"+dMonth);

                    var dYear = d.getFullYear();

                    TransactionDate = dDay+"-"+dMonth+"-"+dYear;

                    StockQuantity = aGJEEntries[Subkey]['StockQuantity'];
                    StockSubCategoriesTitle = aGJEEntries[Subkey]['StockSubCategoriesTitle'];
                    DRCR = aGJEEntries[Subkey]['DRCR'];

                    DRCR = addCommas(DRCR);

                    if(ChartOfAccountsControlId == 11 || ChartOfAccountsControlId == 12)
                    {
                      tTable += '<tr style="box-shadow: 0px 1px 1px #888888; font-family: Arial, Helvetica, sans-serif;"><td class="ellipsis" onclick="ShowTitle($(this).text())"> <a href="#">'+ShortDescription+'</a></td><td> '+TransactionDate+' </td><td>Rs. '+DRCR+' </td></tr>';
                    }else
                    {
                      tTable += '<tr style="box-shadow: 0px 1px 1px #888888; font-family: Arial, Helvetica, sans-serif;"><td class="ellipsis" onclick="ShowTitle($(this).text())"> <a href="#">'+ShortDescription+'</a></td><td> '+TransactionDate+' </td><td class="ellipsis"> '+StockSubCategoriesTitle+' </td><td> '+StockQuantity+' </td><td>Rs. '+DRCR+' </td></tr>';
                    }
                  }

                  tTable += '</tbody></table>';
                  $("#ModelContent").append(tTable);
                  iNo++;
                  flag = "true";
                }
                tTable += '</table>';
                if(flag == "false")
                {
                  $("#ModelContent").append("<center><div>no record found</div></center>");
                }
              
             }
        });
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

function ShowTitle(sTitle){
  sTitle = sTitle.trim();
  if(sTitle != "" && sTitle != "-")
  {
    swal('Detail',sTitle);
  }
}

function CopyTitle(id)
{
  try
  {
      var r = document.createRange();
      r.selectNode(document.getElementById("actitle"+id));
      window.getSelection().removeAllRanges();
      window.getSelection().addRange(r);
      document.execCommand('copy');

      $("#copymsg"+id).show().delay(3000).fadeOut();

  }
  catch(e)
  {
      alert(e);
  }
}

</script>

@stop