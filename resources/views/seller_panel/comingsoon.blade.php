@extends('barabrUserDashboard/layouts/forms')

@section('formcontent')
<style type="text/css">
  h1, .h1, h2, .h2, h3, .h3 {
    margin-top: 0px;
    margin-bottom: 10px;
}
</style>

<div class="alert alert-info" style="background-color: #fbfbfd; border-color: #006400; color: black; font-family: scandia-web,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji!important; text-align: center; height: 200px;">

	<div class="container">
		<div class="row">
			@if(isset($Module))
			    <i class="fa {{ $ModuleIcon }}" aria-hidden="true" style="font-size: 20px; color: #006400;"></i> {{ $Module }}
			@endif
		</div>
	</div>

  <i class="fa fa-user-secret" aria-hidden="true" style="font-size: 50px; color: #006400; padding-bottom: 30px; margin-top: 32px;"></i>
        <h3 style="color: #006400; font-style: italic;">Coming Soon..!</h3>
    </div>

@stop