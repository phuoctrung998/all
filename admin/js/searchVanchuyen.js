function getUrlVars()
	{
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}
	
	$('.select2').select2();
	 $('#ajaxAddKhachhang').on('click', function(e) {
		var form = $("#form-add-khachhang");
		var formData = form.serialize();
		$.ajax({
			url: form.attr("action"),
			type: form.attr("method"),
			data: formData,
			success: function (response) {
				var result = $.parseJSON(response);
				
				var newOption = new Option(result.data.company, result.data.id, false, false);
				$('#company_id').append(newOption).trigger('change');
				$('#company_id').val(result.data.id).trigger('change');
				
				$("#modal-themkhachhang").modal("hide");  
				form.trigger("reset");
			},
			error: function () {
				alert("Có lỗi xảy ra vui lòng thông báo cho quản trị viên");
				e.preventDefault();
			}
		});
	}).on('submit', function(e){
		e.preventDefault();
	});
	 
	 
	 $('#company_id').select2({
		"language": {
		   "noResults": function(){
			   return "Không tìm thấy khách hàng nào <a href='javascript:;' data-toggle='modal' data-target='#modal-themkhachhang' class='btn btn-danger'>Thêm khách hàng</a>";
		   }
	   },
		escapeMarkup: function (markup) {
			return markup;
		}
	})
	 
	//Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
	 
	 $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
	 $('[data-mask]').inputmask()
	
	function QueryStringToJSON() {            
		var pairs = location.search.slice(1).split('&');
		
		var result = {};
		pairs.forEach(function(pair) {
			pair = pair.split('=');
			result[pair[0]] = decodeURIComponent(pair[1] || '');
		});

		return JSON.parse(JSON.stringify(result));
	}


	
	//Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
             'Hôm nay': [moment(), moment()],
             'Hôm qua': [moment().subtract('days', 1), moment().subtract('days', 1)],
             '7 ngày trước': [moment().subtract('days', 6), moment()],
             '30 ngày trước': [moment().subtract('days', 29), moment()],
             'Tháng này': [moment().startOf('month'), moment().endOf('month')],
             'Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        }
		},
		function (start, end) {
			
			$('#daterange-btn span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
			$('#search_begin_time').val(start.format('DD-MM-YYYY'));
			$('#search_end_time').val(end.format('DD-MM-YYYY'));
		}
    );
	
	//Date picker
    $('#datepicker').datepicker({
		autoclose: true,
		format: 'dd-mm-yyyy'
    })
	
	 //Date range picker
    $('#date-reservation').daterangepicker({
		autoclose: true,
		format: 'DD-MM-YYYY',
	},function (start, end) {
		$('#search_begin_time').val(start.format('DD-MM-YYYY'));
		$('#search_end_time').val(end.format('DD-MM-YYYY'));
	});
	
	
	
	$('body').delegate('#flag_anhson','change',function(e){
		if($('#flag_anhson').is(':checked')){
			$('#vanchuyen-khachhang').prop( "disabled", false );
			$("#company_id").prop("disabled", false); 
		}
		else{
			$('#vanchuyen-khachhang').prop( "disabled", true );
			$("#company_id").prop("disabled", true); 
		}
	});