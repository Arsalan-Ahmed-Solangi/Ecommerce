<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/vendors/bootstrap-table/css/bootstrap-table.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/custom_css/bootstrap_tables.css')}}">

<style type="text/css">
/*th{ max-width:5px; }*/

.ellipsis
{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 90px;
  margin-right: -5px;
}
.garage-title {
    clear: both;
    overflow: hidden;
    white-space: nowrap;
}
.action
{
  white-space: nowrap;
  overflow: hidden;
}

.bootstrap-table .table:not(.table-condensed), .bootstrap-table .table:not(.table-condensed)>tbody>tr>td, .bootstrap-table .table:not(.table-condensed)>tbody>tr>th, .bootstrap-table .table:not(.table-condensed)>tfoot>tr>td, .bootstrap-table .table:not(.table-condensed)>tfoot>tr>th, .bootstrap-table .table:not(.table-condensed)>thead>tr>td
{
  padding: 2px;
  font-size: 1em;
  color:purple;
  text-align: center;
}

.selectric .label
{
  margin: 0 120px 0 0px;
}

.fixed-table-container tbody td .th-inner, .fixed-table-container thead th .th-inner
{
  padding: 4px;
  text-align: center;
}
.panel-body .btn:not(.btn-block){
  background-color: purple;
  color: white;
}
.fixed-table-pagination .pagination-detail, .fixed-table-pagination div.pagination{
  margin-top: 40px;
}
.text-danger {
    color: #FB8678 !important;
}
.text-primary {
    color: #428BCA !important;
}
.text-success {
    color: #22D69D !important;
}
.modal-dialog {
  width: 100%;
  height: auto;
  padding-right: 28px;
  padding-left: 28px;
}
.modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
    text-align: center;
    color: purple;
}
.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
border: 1px solid #999999/*{borderColorHover}*/;
background: #dadada/*{bgColorHover}*/ url(images/ui-bg_glass_75_dadada_1x400.png)/*{bgImgUrlHover}*/ 50%/*{bgHoverXPos}*/ 50%/*{bgHoverYPos}*/ repeat-x/*{bgHoverRepeat}*/;
font-weight: normal/*{fwDefault}*/;
color: #212121/*{fcHover}*/;
}
.ui-state-hover a,
.ui-state-hover a:hover,
.ui-state-hover a:link,
.ui-state-hover a:visited {
color: #212121/*{fcHover}*/;
text-decoration: none;
}
.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
border: 1px solid #aaaaaa/*{borderColorActive}*/;
background: #ffffff/*{bgColorActive}*/ url(images/ui-bg_glass_65_ffffff_1x400.png)/*{bgImgUrlActive}*/ 50%/*{bgActiveXPos}*/ 50%/*{bgActiveYPos}*/ repeat-x/*{bgActiveRepeat}*/;
font-weight: normal/*{fwDefault}*/;
color: #212121/*{fcActive}*/;
}
.ui-state-active a,
.ui-state-active a:link,
.ui-state-active a:visited {
color: #212121/*{fcActive}*/;
text-decoration: none;
}

.ui-accordion .ui-accordion-header {
display: block;
cursor: pointer;
position: relative;
margin-top: 1px;
padding: .5em .5em .5em .7em;
min-height: 0; /* support: IE7 */
border-top: 2px solid #cccccc; 
border-bottom: 1px solid #cccccc;
background-color: #F0F8FF;
}

#accordion .ui-accordion-header { background: #F5F5F5; padding: 18px; }

.ui-accordion .ui-accordion-icons {
padding-left: 2.2em;
}
.ui-accordion .ui-accordion-noicons {
padding-left: .7em;
}
.ui-accordion .ui-accordion-icons .ui-accordion-icons {
padding-left: 2.2em;
}
.ui-accordion .ui-accordion-header .ui-accordion-header-icon {
position: absolute;
left: .5em;
top: 50%;
margin-top: -8px;
}
.ui-accordion .ui-accordion-content {
padding: 1em 0em;
border-top: 0;
overflow: auto;
height: -1px;
margin-top: 0px;
top: 1px;
margin-bottom: 1px;
}


input[type='checkbox'] {
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeSpeed;
  width: 13px;
  height: 13px;
  margin: 4px;
  margin-right: 1px;
  display: block;
  float: left;
  position: relative;
  cursor: pointer;
}

input[type='checkbox']:after {
  content: "";
  vertical-align: middle;
  text-align: center;
  line-height: 13px;
  position: absolute;
  cursor: pointer;
  height: 13px;
  width: 13px;
  left: 0;
  top: 0;
  font-size: 10px;
  -webkit-box-shadow: inset 0 1px 1px #5F95FC, 0 1px 0 #5F95FC;
  -moz-box-shadow: inset 0 1px 1px #5F95FC, 0 1px 0 #5F95FC;
  box-shadow: inset 0 1px 1px #5F95FC, 0 1px 0 #5F95FC;
  background: #5F95FC;
}

input[type='checkbox']:hover:after, input[type='checkbox']:checked:hover:after {
  background: #5F95FC;
  content: '\2714';
  color: #fff;
}

input[type='checkbox']:checked:after {
  background: #5F95FC;
  content: '\2714';
  color: #fff;
}
#accordioncontent{
  border-bottom: 2px solid #F5F5F5;
  border-width: 2px;
  margin-top: 4px;
}
</style>

    <!-- Main content -->
<section class="content">  
  <!-- third table start -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-success filterable">
              <div class="panel-heading">
                  <h3 class="panel-title">
                      <i class="fa fa-fw fa-columns"></i>  <i class="fa {{ $ModuleIcon }} fa-th-large" style="color:purple"> </i> {{ $Module }} <i class="fa fa-fw fa-arrow-right"></i> <i class="fa {{ $ComponentIcon }} fa-th-large" style="color:purple"> </i> {{ $Component }}
                  </h3>
              </div>

              <div class="panel-body">
                  <table data-toggle="table" data-sort-name="age" data-sort-order="desc"
                         data-pagination="true" data-search="true" data-height="450" id="MyTable">
                      {{ csrf_field() }}

                     <thead>
                            <tr>
                            @foreach($Columns AS $Column)
                            <th> {{ $Column }} </th>
                            @endforeach
                            <th>#</th>
                            </tr>
                    </thead>
                    <tbody>
                          
                        @foreach($Grids AS $iId=>$Grid)

                        <tr id="{{$iId.'|'.$Component}}">

                          @foreach($Grid AS $index=>$Value)
                            <td class="ellipsis">{{ $Value }}</td>
                          @endforeach
                          <td class="action">
                            
                              <a href="#barabr" title="{{ ' View ' }}" onclick="AjaxPage('{{ $Component }}/{{ $iId }}', 'DivMainContainer')"><i class="fa fa-fw fa-star text-success" style="color:purple; font-size: 9px;"></i></a>&nbsp;|&nbsp;

                              <a href="#barabr" title="{{ ' Edit ' }}" onclick="AjaxPage('{{ $Component }}/{{ $iId }}/edit', 'DivMainContainer')"><i class="fa fa-fw fa-pencil text-primary" style="color:purple; font-size: 9px;"></i></a>

                              @if($Component != "SellerProfile")
                              &nbsp;|&nbsp;
                              <a href="javascript:Delete('{{ $Component }}', {{ $iId }});" title="Delete..!">
                              <i class="fa fa-fw fa-times text-danger" style="color:purple; font-size: 9px;" id="fa-delete{{ $iId }}"></i>
                              </a>
                              @endif

                              @if($Component == "UserDesignation")
                              &nbsp;|&nbsp;
                              <i onclick="SetRules('{{ $iId }}', '{{ $Grid[0] }}');" class="fa fa-align-center" style="color:purple; font-size: 10px; cursor: pointer;" data-toggle="modal" data-target="#myModal"></i>
                              @endif
                           
                          </td>
                        </tr>

                        @endforeach
                    
                  </tbody>
                  </table>

              @if($Component != "SellerProfile")
                <div class="col-md-6 col-sm-6" style="padding-top: 12px;">
                  <button onclick="AjaxPage('{{$Component}}/create', 'DivMainContainer')" type="button" class="button button-rounded button-highlight-flat hvr-pop">
                      Add New
                  </button>
                </div>
              @endif
            </div>
             
          </div>
          
      </div>
  </div>
        <!-- third table end -->
       
       <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" id="modal-title"></h4>
                </div>
                <div class="modal-body">
                  {!! Form::open(array('url'=>'SetRules','class'=>'form-horizontal', 'id'=>'form-validation', 'files'=>true )) !!} 
                  <input type="hidden" id="DesignationId" name="DesignationId">
                  <div class="panel-body center-block" style="max-width: 100%;">
                    
                  <div id="accordion2">
                    
                  </div> 

                  <div class="form-group form-actions" style="padding-top: 24px;">
                    <div class="col-md-8 col-md-offset-5">
                      <button type="button" id="SetUserRules" name="SetUserRules" class="button button-rounded button-highlight-flat hvr-pop">
                      Update
                      </button>
                    </div>
                  </div>

                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
  
</section>

<script type="text/javascript" src="{{ asset('public/assets/vendors/editable-table/js/mindmup-editabletable.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/vendors/bootstrap-table/js/bootstrap-table.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/vendors/tableExport/tableExport.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/custom_js/bootstrap_tables.js')}}"></script>
    
<script>
  $( "tr" ).dblclick(function()
  {
    var id = (this.id);
    var routename = id.lastIndexOf('|');
    var route = id.substring(routename+1);
    AjaxPage(route+'/'+id, 'DivMainContainer')
  });
</script>

 <script>
function SetRules(iDesignationId, sDesignation)
{
  $("#accordion2").html("");
  $("#modal-title").html("");
  
  $.ajax({
   type:'post',
   url: 'ViewRules',
   data:{
       '_token' : $('input[name=_token]').val(),
       'DesignationId' : iDesignationId
        },
     success : function (sData)
      {
        sData = decodedStringAtoB = atob(sData);
        aData = decodeURIComponent(sData.replace(/\+/g, ' '));
        aData = decodedStringAtoB = atob(aData);
        aData = JSON.parse(aData);
        $("#accordion2").html(aData);
        RefreshAccordion();
      },

  });

  $("#DesignationId").val(iDesignationId);
  $("#modal-title").append("Set Rules " + sDesignation);
  ClearConsole();
  
}


</script>

<script type="text/javascript">
  function ClearConsole()
  {
    if(window.console ) 
     {     
       console.clear();   
     }
  }
</script>

<script>

$("#SetUserRules").click(function ()
{

  swal({
        title: "are you sure?",
        text: "do you want to Update Rules..!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Update!",
        cancelButtonText: "No, Cancel!",
        closeOnConfirm: true,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm) {

          $("#SetUserRules").prepend("<i class='fa fa-refresh fa-spin' id='LoaderIcon'></i>");
          $("#SetUserRules").attr("disabled", true);

            route = 'SetRules';

            iDesignationId = $("#DesignationId").val();

            var ComponentName = new Array();
            $("input[name^='ComponentName']").each(function(){
                ComponentName.push($(this).val());
            });

            var View = new Array();
            $("input[name^='view']").each(function(){
               
                if($(this).prop("checked") == true)
                  View.push('1');
                else if($(this).prop("checked") == false)
                  View.push('0');
                
            });

            var Add = new Array();
            $("input[name^='add']").each(function(){

                if($(this).prop("checked") == true)
                  Add.push('1');
                else if($(this).prop("checked") == false)
                  Add.push('0');
            });

            var Update = new Array();
            $("input[name^='update']").each(function(){

                if($(this).prop("checked") == true)
                  Update.push('1');
                else if($(this).prop("checked") == false)
                  Update.push('0');
            });

            var Delete = new Array();
            $("input[name^='delete']").each(function(){

                if($(this).prop("checked") == true)
                  Delete.push('1');
                else if($(this).prop("checked") == false)
                  Delete.push('0');
            });
              
                $.ajax({
                 type: 'post',
                 url: 'SetRules',
                 data: {
                     '_token' : $('input[name=_token]').val(),
                     'DesignationId' : iDesignationId,
                     'ComponentName' : ComponentName,
                     'View' : View,
                     'Add' : Add,
                     'Update' : Update,
                     'Delete' : Delete
                    },
                   success : function (msg)
                   {
                     var aMessage = msg.split("|");

                     key = aMessage[0];

                     sMessage = aMessage[1];

                     iRecordId = aMessage[2];

                      toastr[key](sMessage, "Barabr Alert")

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

                      $("#LoaderIcon").remove();
                      $("#SetUserRules").removeAttr("disabled");
                        
                     },
                });
              
                $("#LoaderIcon").remove();
                $("#SetUserRules").removeAttr("disabled");
              }else
              {
              return false;
              }
              
            
        })
});

</script>

<script type="text/javascript">

  function RefreshAccordion()
  {
    $( "#accordion" ).accordion({
      collapsible: true
    });
    $("#accordion div").css({ 'height': 'auto' });
  }

</script>