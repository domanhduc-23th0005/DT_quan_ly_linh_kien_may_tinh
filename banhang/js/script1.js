$(document).ready(function() {

	// Hàm gửi Ajax
	function sendAjax(url, data) {
		$.ajax({
			url: url,
			method: "POST",
			data: data,
			dataType: "json",
			success: function(response) {
				var modal = response.status === 'success' ? "#modalSuccess" : "#modalFail";
				$(modal + " .modal-body").text(response.message);
				$(modal).modal("show");
				if (response.status === 'success') $(".gio-hang").load('xuly/giohang/soluong-giohang.php');
			},
			error: function() {
				$("#modalFail .modal-body").text("Có lỗi kết nối. Vui lòng thử lại.");
				$("#modalFail").modal("show");
			}
		});
	}

	// Thêm mặt hàng vào giỏ
	$(".add-to-cart").on("click", function(e) {
		e.preventDefault();
		const mahang = $(this).data("mahang");
		const soluong = $(this).closest(".product-item").find(".soluong-input").val() || 1;
		sendAjax("xuly/giohang/themvao-giohang.php", {
			mahang: mahang,
			soluong: soluong
		});
	});

	// Khi nhấn nút tăng/giảm
	$('.soluong-tang, .soluong-giam').click(function() {
		var mahang = $(this).data('mahang');
		var currentValue = parseInt($(this).closest(".product-item").find(".soluong-input").val());
		if (isNaN(currentValue)) currentValue = 1;
		var soluong = currentValue + ($(this).hasClass('soluong-tang') ? 1 : -1);
		if (soluong >= 0) {
			$(this).closest(".product-item").find(".soluong-input").val(soluong);
		} else {
			$(this).closest(".product-item").find(".soluong-input").val(0);
		}
	});

	// Thêm mặt hàng vào giỏ
	$(".add-to-cart-one").on("click", function(e) {
		e.preventDefault();
		const mahang = $(this).data("mahang");
		const soluong = 1;
		sendAjax("xuly/giohang/themvao-giohang.php", {
			mahang: mahang,
			soluong: soluong
		});
	});
});