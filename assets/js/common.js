var App = App || {};

$(function() {
    App.Site.init();
});

App.Site = function(){

	var init = function(){
		$('select').select2();
		$('#datepicker,#datepicker2').datepicker({
			autoclose: false,
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

// Tài khoản
App.TaiKhoan = function(){

	var dangXuLy = false;

	var DangNhap = function(){
		if (dangXuLy == false) {
			dangXuLy = true;
	        App.Site.showAjaxLoading();
	        var frmData = $('#frmDangNhap').serialize();
	        $.ajax({
	            url: baseurl + 'taikhoan/xulyDangNhap',
	            type: 'post',
	            dataType: 'json',
	            data: frmData,
	            success: function(res){
	                dangXuLy = false;
	                App.Site.hideAjaxLoading();
	                if(res.status){
	                	$('.login-box-body').slideUp(100);
	                    $('.login-box-body').html('<div class="text-center text-success">' + res.message + '</div>').slideDown(100);
	                	setTimeout(function() {
							window.location.href = baseurl;
						},1200);
	                }else{
	                	$('#errDangNhap').html(res.message).slideDown();
	                	setTimeout(function() {
							$('#errDangNhap').slideUp();
						},3000);
	                }
	            }
	        });
		}
	};

	var ThemTK = function() {
	    if (dangXuLy == false) {
	        App.Site.showAjaxLoading();
	        dangXuLy = true;
	        var frmData = $('#frmThemTK').serialize();

	        $.ajax({
	            url : baseurl + 'taikhoan/xulyThemTK',
	            type : 'POST',
	            data : frmData,
	            dataType: 'json',
	            success : function(res){
	                App.Site.hideAjaxLoading();
	                dangXuLy = false;
	                if (res.status == false) {
	                    $('#errThemTK').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        $('#errThemTK').slideUp(200);
	                    }, 3000);
	                } else {
	                    $('#frmDangNhap').slideUp(200);
	                    $('#errThemTK').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        location.reload();
	                    }, 700);
	                }
	            }
	        });
	    }
	};

	return {
		ThemTK:ThemTK,
		DangNhap:DangNhap
	};
}();

// Đoàn cơ sở
App.DoanCS = function(){

	var dangXuLy = false;

	var ThemDCS = function() {
	    if (dangXuLy == false) {
	        App.Site.showAjaxLoading();
	        dangXuLy = true;
	        var frmData = $('#frmThemDCS').serialize();

	        $.ajax({
	            url : baseurl + 'doancs/xulyThemDCS',
	            type : 'POST',
	            data : frmData,
	            dataType: 'json',
	            success : function(res){
	                App.Site.hideAjaxLoading();
	                dangXuLy = false;
	                if (res.status == false) {
	                    $('#errThemDCS').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        $('#errThemDCS').slideUp(200);
	                    }, 3000);
	                } else {
	                    $('#errThemDCS').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        location.reload();
	                    }, 700);
	                }
	            }
	        });
	    }
	};

	return {
		ThemDCS:ThemDCS
	};
}();

// Chi đoàn
App.ChiDoan = function(){

	var dangXuLy = false;

	var ThemCD = function() {
	    if (dangXuLy == false) {
	        App.Site.showAjaxLoading();
	        dangXuLy = true;
	        var frmData = $('#frmThemCD').serialize();

	        $.ajax({
	            url : baseurl + 'chidoan/xulyThemCD',
	            type : 'POST',
	            data : frmData,
	            dataType: 'json',
	            success : function(res){
	                App.Site.hideAjaxLoading();
	                dangXuLy = false;
	                if (res.status == false) {
	                    $('#errThemCD').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        $('#errThemCD').slideUp(200);
	                    }, 3000);
	                } else {
	                    $('#errThemCD').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        location.reload();
	                    }, 700);
	                }
	            }
	        });
	    }
	};

	return {
		ThemCD:ThemCD
	};
}();

// Đoàn viên
App.DoanVien = function(){

	var dangXuLy = false;

	var ThemDV = function() {
	    if (dangXuLy == false) {
	        App.Site.showAjaxLoading();
	        dangXuLy = true;
	        var frmData = $('#frmThemDV').serialize();

	        $.ajax({
	            url : baseurl + 'doanvien/xulyThemDV',
	            type : 'POST',
	            data : frmData,
	            dataType: 'json',
	            success : function(res){
	                App.Site.hideAjaxLoading();
	                dangXuLy = false;
	                if (res.status == false) {
	                    $('#errThemDV').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        $('#errThemDV').slideUp(200);
	                    }, 3000);
	                } else {
	                    $('#errThemDV').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);
	                    
	                    setTimeout(function(){
	                        location.reload();
	                    }, 700);
	                }
	            }
	        });
	    }
	};

	return {
		ThemDV:ThemDV
	};
}();