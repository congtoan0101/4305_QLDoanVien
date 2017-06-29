var App = App || {};

$(function() {
    App.Site.init();
});

App.Site = function(){

	var init = function(){
		$('select').select2();
		$('#datepicker,#datepicker2,#chonNgayXemHD').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy'
		});

		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue'
		});

		$('input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue'
		});

		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			checkboxClass: 'icheckbox_flat-green',
			radioClass: 'iradio_flat-green'
		});

		$('[data-toggle="tooltip"], [data-toggle="offcanvas"], [data-toggle="modal"]').tooltip();
	};

	var showAjaxLoading = function(){
		$('#ajaxLoadingBar').show();
	};
	var hideAjaxLoading = function(){
		$('#ajaxLoadingBar').hide();
	};

	var clickChangeSBMenu = false;
	var changeSidebar = function(){
		if(!clickChangeSBMenu){
			clickChangeSBMenu = true;
			var sidebar;
			if($('body').hasClass('sidebar-collapse')){
				sidebar = 1;
			}else{
				sidebar = 0;
			}
	        $.ajax({
	            url: baseurl + 'caidat/changeSidebar',
	            type: 'post',
	            dataType: 'json',
	            data: {sidebar: sidebar},
	            success: function(){
	                clickChangeSBMenu = false;
	            }
	        });
		}
	};

	return {
        init:init,
        showAjaxLoading:showAjaxLoading,
        hideAjaxLoading:hideAjaxLoading,
        changeSidebar:changeSidebar
    };
}();