<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/bootstrap-table/css/bootstrap-table.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/custom_css/bootstrap_tables.css')}}">

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
</style>

    <!-- Main content -->
<section class="content">
  <!-- third table start -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-success filterable">
              <div class="panel-heading">
                  <h3 class="panel-title">
                      <i class="fa fa-fw fa-columns"></i> {{ $component }}
                  </h3>
              </div>

              <div class="panel-body">
                  <table data-toggle="table" data-sort-name="age" data-sort-order="desc"
                         data-pagination="true" data-search="true" data-height="450" id="MyTable">
                      {{ csrf_field() }}

                     <thead>
                            <tr>
                            @foreach($columns as $index => $column)
                            <th> {{ $column }} </th>
                            @endforeach
                            <th>#</th>
                            </tr>
                    </thead>
                    <tbody>

                    @foreach($grids as $id=>$grid)

                    <tr id="{{$id.'|'.$component}}">

                      @foreach($grid AS $index=>$value)
                        <td class="ellipsis">{{ $value }}</td>
                      @endforeach

                      <td class="action ellipsis">
                          <a href="javascript:void(0)" title="{{ ' View ' }}" onclick="AjaxPage('{{ $component }}/{{ $id }}', 'DivMainContainer')"><i class="fa fa-fw fa-star text-success" style="color:purple; font-size: 9px;"></i></a>
                          &nbsp;|&nbsp;
                          <a href="javascript:void(0)" title="{{ ' Edit ' }}" onclick="AjaxPage('{{ $component }}/{{ $id }}/edit', 'DivMainContainer')"><i class="fa fa-fw fa-pencil text-primary" style="color:purple; font-size: 9px;"></i></a>
                           |&nbsp;
                          <a href="javascript:Delete('{{ $component }}', {{ $id }});" title="Delete..!">
                          <i class="fa fa-fw fa-times text-danger" style="color:purple; font-size: 9px;" id="fa-delete{{ $id }}"></i>
                          </a>
                      </td>
                    </tr>

                    @endforeach

                  </tbody>
                  </table>

                <div class="col-md-6 col-sm-6" style="padding-top: 12px;">
                    <button onclick="AjaxPage('{{$component}}/create', 'DivMainContainer')" type="button" class="button button-rounded button-highlight-flat hvr-pop">
                        Add {{$component}}
                    </button>
                </div>


            </div>

          </div>

      </div>
  </div>
        <!-- third table end -->

</section>

<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/editable-table/js/mindmup-editabletable.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/bootstrap-table/js/bootstrap-table.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/tableExport/tableExport.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/custom_js/bootstrap_tables.js')}}"></script>

<script>
  $( "tr" ).dblclick(function()
  {
    var id = (this.id);
    var routename = id.lastIndexOf('|');
    var route = id.substring(routename+1);
    AjaxPage(route+'/'+id, 'DivMainContainer')
  });
</script>
