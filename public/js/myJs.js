function showAjaxLoading() {
    $('#ajaxLoadingBar').show();
}
function hideAjaxLoading() {
    $('#ajaxLoadingBar').hide();
}

var clickDangNhap = false;
function DangNhap() {
	if (clickDangNhap == false) {
        showAjaxLoading();
        clickDangNhap = true;
        var frmData = $('#frmDangNhap').serialize();

    	$.ajax({
            url : base_url + '/taikhoan/xulydangnhap',
            type : 'POST',
            data : frmData,
            dataType: 'json',
            success : function(res){
                hideAjaxLoading();
                clickDangNhap = false;
            	if (res.status == false) {
                    $('#errDangNhap').removeClass('text-success');
                    $('#errDangNhap').addClass('text-danger');
                    $('#errDangNhap').html(res.message);
                    $('#errDangNhap').slideDown(200);
                    
                    setTimeout(function(){
                        $('#errDangNhap').slideUp(200);
                    }, 3000);
                } else {
                    $('#frmDangNhap')[0].reset();
                    $('#errDangNhap').removeClass('text-danger');
                    $('#errDangNhap').addClass('text-success');
                    $('#errDangNhap').html(res.message);
                    $('#errDangNhap').slideDown(200);
                    setTimeout(function(){
                        window.location.href = base_url;
                    }, 1000);
                }
            }
        });
    }
}