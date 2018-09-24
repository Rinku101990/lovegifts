$(document).ready(function(){
	var base_url = "http://localhost/lovegifts/";

	$flag = 1;
   
    /***** Email Validation ****/
    function validateEmail(sEmail) {
        var filter = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/;
        if (filter.test(sEmail)) {
            return true;
        } else {
            return false;
        }
    }	
	function validateFname(fName){
			var regex = /^[a-zA-Z ]*$/;
			if (regex.test(fName)) {
				return true;
			} else {
				return false;
        }
    }

	$("#productSize").on("change", function(){
		var pro_size_id = $(this).val();
		//alert(pro_size_id);
		//$("#productPrice").html(pro_size_id);
		$.ajax({
	    	method:'POST',
    		url:base_url+'products/getPriceListByProductId',
    		data:{pro_size_id:pro_size_id},
    		dataType:"json",
	    	success:function(data){
	    		//console.log(data.price.size_related_price);
	    		// alert(data);
	    		$("#productPrice").html(data.price.size_related_price);
	    	}
	    });
	});

	// CHECK OUT NOTIFICATION //
	$("#notification").modal('show');

	// CHECK OUT PAGE ACCORDING CUSTOMER REQUIREMENTS //
	$(".btnProductCheckout").click(function(){
		var product_id = $(this).attr("chkout");
		var pro_category = $("#pro_category").val()
		var product_slug = $("#product_slug").val()
		var product_size = $("#productSize").val();
		var product_cod = $("#cod").val();
		//alert(product_slug);

		if(product_id !=''){
			$.ajax({
		    	method:'POST',
	    		url:base_url+'checkout/saveCustomerCheckoutParam',
	    		data:{product_id:product_id,pro_category:pro_category,product_slug:product_slug,product_size:product_size,product_cod:product_cod},
		    	success:function(data){
		    		//alert(data);
		    		if(data !=''){
		    			window.location.href = base_url+'checkout/express/'+data;
		    		}else{
		    			alert("Failed");
		    		}
		    	}
		    });
		}else{
			alert("Please click on checkout link");
		}
		
	});

	// UPDATE SHIPPING METHOD AND PAYMENT MODE //
	$("input[name=shipping], input[name=paymentmode]").change(function(){
		var shipping = $('input[name=shipping]:checked').val();
		var discount = $('input[name=paymentmode]:checked').val();

		if(!!shipping){}
		else{
			shipping=0;
		}
		if(!!discount){}
		else{
			discount=0;
		}
		updateTotalPrice(shipping, discount)
	});

	function updateTotalPrice(shipping, discount){
		var basePrice = $("#totalPrice").val();

		var grandTotal = (parseInt(basePrice) + parseInt(shipping))-parseInt(discount) ;
		$("#grandTotal").html(grandTotal);
	}
	// END OF THE SHIPPING METHOD AND PAYMENT MODE //

	// CHECK CASH ON DELIVERY //
	$("#checkPinCode").click(function(){
		// alert("ok");
		//var proid = $("#productid").val();
		var cod = $("#cod").val();
		//alert(cod);
		if(cod.length != '6'){
			$('#checkOutPincode').modal('hide');
			$("#codMsg").html("<div class='text-danger' style='margin-top:5px'><b>Invalid Pincode Format.</b></div>");
		}else{
			$.ajax({
				method:'post',
				url:base_url+'products/check_product_available',
				data:{cod:cod},
				dataType:"json",
				beforeSend: function(){
                    $("#codMsg").html('<img src="http://localhost/lovegifts/assets/images/cod.gif">');
                },
				success:function(data){
					//console.log(data.status.pin_pick_up);
					if(data.status==null){
						$('#checkOutPincode').modal('hide');
						$("#codMsg").html("<div class='text-danger' style='margin-top:5px'><p><b>Shipping Not Available</b></p></div>");
					}else if(data.status.pin_pick_up=="cod"){
						$('#checkOutPincode').modal('hide');
						$("#codMsg").html("<div class='text-success' style='margin-top:5px'><p><b>PREPAID/COD both are Available.</b></p></div>");
					}else if(data.status.pin_pick_up=="prepaid"){
						$('#checkOutPincode').modal('hide');
						$("#codMsg").html("<div class='text-success' style='margin-top:5px'><p><b>PREPAID Only Available.</b></p></div>");
					}else{
						
					}
				}
			});
		}
	});

	// VALIDATE CHECKOUT PAGE AND USER INFORMATION //
	// $("#fname").focusout(function () {
	//     var fname = $('#fname').val();
	// 	if ($.trim(fname).length == 0) {
	// 		$(this).css("border-color", "#cd2d00");
	// 		$('#btnPlaceOrder').attr('disabled', true);
	// 		$("#error_fname").text("Please enter valid first name");
	// 		e.preventDefault();
	// 	}
			
	// 	if (validateFname(fname)) {
	// 		$(this).css("border-color", "#2eb82e");
 //            $('#btnPlaceOrder').attr('disabled', false);
 //            $("#error_fname").text("");
 //        } else {
 //            $(this).css("border-color", "#cd2d00");
 //            $('#btnPlaceOrder').attr('disabled', true);
 //            $("#error_fname").text("Please enter name and space only");
 //            e.preventDefault();
 //        }
	// });
	// $("#add1").focusout(function () {
	//     var add1 = $('#add1').val();
	// 	if ($.trim(add1).length == 0) {
	// 		$(this).css("border-color", "#cd2d00");
	// 		$('#btnPlaceOrder').attr('disabled', true);
	// 		$("#error_add1").text("Please enter address 1");
	// 		e.preventDefault();
	// 	}
			
	// 	if (validateFname(add1)) {
	// 		$(this).css("border-color", "#2eb82e");
 //            $('#btnPlaceOrder').attr('disabled', false);
 //            $("#error_add1").text("");
 //        } else {
 //            $(this).css("border-color", "#cd2d00");
 //            $('#btnPlaceOrder').attr('disabled', true);
 //            $("#error_add1").text("Please enter name and space only");
 //            e.preventDefault();
 //        }
	// });
	// $("#add2").focusout(function () {
	//     var add2 = $('#add2').val();
	// 	if ($.trim(add2).length == 0) {
	// 		$(this).css("border-color", "#cd2d00");
	// 		$('#btnPlaceOrder').attr('disabled', true);
	// 		$("#error_add2").text("Please enter address 2");
	// 		e.preventDefault();
	// 	}
			
	// 	if (validateFname(add2)) {
	// 		$(this).css("border-color", "#2eb82e");
 //            $('#btnPlaceOrder').attr('disabled', false);
 //            $("#error_add2").text("");
 //        } else {
 //            $(this).css("border-color", "#cd2d00");
 //            $('#btnPlaceOrder').attr('disabled', true);
 //            $("#error_add2").text("Please enter name and space only");
 //            e.preventDefault();
 //        }
	// });
	// $("#landmark").focusout(function () {
	//     var landmark = $('#landmark').val();
	// 	if ($.trim(landmark).length == 0) {
	// 		$(this).css("border-color", "#cd2d00");
	// 		$('#btnPlaceOrder').attr('disabled', true);
	// 		$("#error_landmark").text("Please enter landmark");
	// 		e.preventDefault();
	// 	}
			
	// 	if (validateFname(landmark)) {
	// 		$(this).css("border-color", "#2eb82e");
 //            $('#btnPlaceOrder').attr('disabled', false);
 //            $("#error_landmark").text("");
 //        } else {
 //            $(this).css("border-color", "#cd2d00");
 //            $('#btnPlaceOrder').attr('disabled', true);
 //            $("#error_landmark").text("Please enter name and space only");
 //            e.preventDefault();
 //        }
	// });
	$("#cmob").focusout(function () {
        var cmob = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

          if (filter.test(cmob)) {
            if(cmob.length==10){
               $(this).css("border-color", "#2eb82e");
                $('#btnPlaceOrder').attr('disabled', false);
                $("#error_cmob").text("");
             } else {
                 $("#error_cmob").text("Please put 10  digit mobile number");
                 $(this).css("border-color", "#cd2d00");
                 $('#btnPlaceOrder').attr('disabled', true);
                return false;
              }
            }
            else {
                 $("#error_cmob").text("Not a valid number");
                 $("#error_cmob").text("Please put 10  digit mobile number");
                 $(this).css("border-color", "#cd2d00");
              return false;
           }
    });
    $("#wmob").focusout(function () {
        var wmob = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

          if (filter.test(wmob)) {
            if(wmob.length==10){
               $(this).css("border-color", "#2eb82e");
                $('#btnPlaceOrder').attr('disabled', false);
                $("#error_wmob").text("");
             } else {
                 $("#error_wmob").text("Please put 10  digit whatspp mobile number");
                 $(this).css("border-color", "#cd2d00");
                 $('#btnPlaceOrder').attr('disabled', true);
                return false;
              }
            }
            else {
                 $("#error_wmob").text("Not a valid number");
                 $("#error_wmob").text("Please put 10  digit whatsapp mobile number");
                 $(this).css("border-color", "#cd2d00");
              return false;
           }
    });

    //	GET STATE AND CITY NAME ACCORDING PINCODE //
	$("#pincode").on('change',function(){

		var cod = $(this).val();

		if(cod.length != '6'){
			$("#PinMsg").html('<p style="color:red">Invalid pincode.</p>');
		}else{
			$.ajax({
				method:'post',
				url:base_url+'orders/fillStateCity',
				data:{cod:cod},
				dataType:"json",
				beforeSend: function(){
					$("#codMsg1").html('<img src="http://localhost/lovegifts/assets/images/cod.gif">');
				},
				success:function(data){
					//console.log(data);
					if((data.stateCity)==null){
						$("#PinMsg").html('<p style="color:red">shipping not available</p>');
					}else if((data.stateCity.pin_pick_up)=="cod"){
						$("#PinMsg").html('<p style="color:green">Cash on delivery available</p>');
					}else if((data.stateCity.pin_pick_up)=="prepaid"){
						$("#PinMsg").html('<p style="color:green">Only online available</p>');
					}else{

					}
					$("#state").val(data.stateCity.pin_state_name);
					$("#city").val(data.stateCity.pin_city_name);
				}
			});
		}
	});
    // END OF THE STATE AND CITY ACCORDING PINCODE //
	
	/***+* Submit Validation ****/
  $(document).on('submit','#formCustomer', function (e) {

        if ($("#cmob").val() == '') {
            $("#cmob").css("border-color", "#cd2d00");
            $('#btnPlaceOrder').attr('disabled', true);
            $("#error_cmob").text("* You have to enter your calling mobile no");
        }

        if ($("#wmob").val() == '') {
            $("#wmob").css("border-color", "#cd2d00");
            $('#btnPlaceOrder').attr('disabled', true);
            $("#error_wmob").text("* You have to enter your whatsapp mobile no");
        }

        document.getElementById("btnPlaceOrder").innerHTML ='<div><i class="ball-clip-rotate-multiple" style="font-size:24px"></i>Please wait..</div><div style="height:20px"></div>';
		  var tmp_customer_id = $("#tmp_hidden_custo_id").val();
		  var tmp_cate_id = $("#cate_id").val();
		  var tmp_id = $("#temp_pro_id").val();
		  var fname = $("#fname").val();
		  var add1 = $("#add1").val();
		  var add2 = $("#add2").val();
		  var landmark = $("#landmark").val();
		  var pincode = $("#pincode").val();
		  var city = $("#city").val();
		  var state = $("#state").val();
		  var cmob = $("#cmob").val();
		  var wmob = $("#wmob").val();
		  var email = $("#email").val();
		  var messagetxt = $("#messagetxt").val();
		  var product = $("#product").val();
		  var product_size = $("#product_size").val();
		  var price = $("#price").val();
		  var offerAmount = $("#offerAmount").val();
		  var qty = $("#qty").val();
		  var shipping = $("input[name=shipping]:checked").val();
		  var paymentmode = $("input[name=paymentmode]:checked").val();
		  var total = $("#grandTotal").text();
		  //alert(tmp_id);
		  $.ajax({
			type: 'post',
			url: base_url+'orders/saveOrders',
			data: {tmp_customer_id:tmp_customer_id,tmp_cate_id:tmp_cate_id,tmp_id:tmp_id,fname:fname,add1:add1,add2:add2,landmark:landmark,pincode:pincode,city:city,state:state,cmob:cmob,wmob:wmob,email:email,messagetxt:messagetxt,product:product,product_size:product_size,price:price,offerAmount:offerAmount,qty:qty,shipping:shipping,paymentmode:paymentmode,total:total},
			dataType:"json",
			success: function (data) {
              if(data.mode !='0'){
              	window.location.href=base_url+'Ccavenue/index/'+data.reference_id.ord_reference_id;
              }else if(data.mode=='0'){
              	window.location.href=base_url+'orders/orderSummary/'+data.reference_id.ord_reference_id;
              }else{

              }
			}
		  });
		  return false;
	});
	// SEND QUERY TO LOVEGIFTS
	$("#btnContactUs").click(function(){
		$.ajax({
			method:"post",
			url:base_url+"contacts/send_query",
			data:$("#contactQueryForm").serialize(),
			dataType:"json",
			beforeSend: function(){
				$("#queryStatus").html('<img src="http://localhost/lovegifts/assets/images/cod.gif">');
			},
			success:function(data){
				if(data.status=="status"){
					$("#queryStatus").html(data.msg);
				}else{
					$("#queryStatus").html(data.msg);
				}
			}
		});
	});

});