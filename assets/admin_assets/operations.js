$(document).ready(function(){
	var base_url = "http://localhost/lovegifts/admin/";
    	var base_url1 = "http://localhost/lovegifts/";
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
    // CHECK DUPLICATE SLUG WITH PRODUCT TITLE //
    $("#pro_title").on("change",function(){
        var pro_title = $(this).val();
        $.ajax({
            method:'post',
            url:base_url+'products/checkProductSlugValue',
            data:{pro_title:pro_title},
            beforeSend: function(){
                    $("#pro_title").html('<img src="http://localhost/lovegifts/assets/images/cod.gif">');
                },
            success: function(data){
                //alert(data);
                if(data=="fail"){
                    $("#error_title1").text('this product title already exist.try one');
                    $("#error_title1").delay(3000).hide('slow');
                }else{
                    $("#error_title").text('Its good procced now.');
                    $("#error_title").delay(3000).hide('slow');
                }
            }
        });
    });
    // SAVE EXTRA FIELD IN ADD CATEGORY ORDER TRACKING STAGE //

    var max_fields_limit_cate__ord_track = 10; //set limit for maximum input fields
    var x_size_cate_ord = 1; //initialize counter for text box
    $('.input_fields_container_cate_ord_track_button').click(function(e){ 
        e.preventDefault();
        if(x_size_cate_ord < max_fields_limit_cate__ord_track){ //check conditions
            x_size_cate_ord++; //counter increment
            $('.input_fields_container_cate_ord_track').append('<div><input type="text" name="pro_cate_ord_track[]" placeholder="Enter Field Title" class="form-control"  required="required" style="width:64%;margin-left:4%"/><a href="#" class="btn btn-danger remove_field_size_cate_ord_track" style="margin-left:70%;margin-top:-16%;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container_cate_ord_track').on("click",".remove_field_size_cate_ord_track", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x_size_cate_ord--;
    });

    //  SAVE CATEGORY //
    $("#btnSaveCategory").click(function(){
        $.ajax({
            method:"post",
            url:base_url+"products/saveCategory",
            data:$("#formCategory").serialize(),
            success:function(data){
                //alert(data);
                if(data=="done"){
                    window.location.href = base_url+"products/category";
                }else{
                    window.location.href = base_url+"products/category";
                }
            }
        });
    });
    $(".viewCate").click(function(){
        var cat_id = $(this).attr("eyeCate");
        $.ajax({
            method:'POST',
            url:base_url+'products/viewCategory',
            data:{cat_id:cat_id},
            dataType:"json",
            success: function(data){
                $("#cate_name").html(data.cat_info.cate_name);
                if((data.cat_info.cate_status)=='0'){
                    $("#cate_status").html('<span class="badge bg-green">Active</span>');
                }else{
                    $("#cate_status").html('<span class="badge bg-red">Inactive</span>');
                }
                $("#created").html(data.cat_info.cate_created);
            }
        });
    });
    $("#btnUpdateCategory").click(function(){
        $.ajax({
            method:"post",
            url:base_url+"products/updateCategoryInfo",
            data:$("#formUpdateCategory").serialize(),
            success:function(data){
                //alert(data);
                if(data=="done"){
                    window.location.href = base_url+"products/category";
                }else{
                    window.location.href = base_url+"products/category";
                }
            }
        });
    });
    $(".removeCate").click(function(){
        var cate_id = $(this).attr("deleteCate");
        if (confirm("Are you sure?")) {
            //alert(pro_id);
            $.ajax({
                method:'post',
                url:base_url+'products/deleteCategory',
                data:{cate_id:cate_id},
                success: function(data){
                    if(data=="ok"){
                        window.location.href = base_url+'products/category';
                    }else{
                        window.location.href = base_url+'products/category';
                    }
                }
            });
        }
        return false;
    });

    //  SAVE SUB CATEGORY //
    $("#btnSaveSubCategory").click(function(){
        $.ajax({
            method:"post",
            url:base_url+"products/saveSubCategory",
            data:$("#formSubCategory").serialize(),
            success:function(data){
                //alert(data);
                if(data=="done"){
                    window.location.href = base_url+"products/sub_category";
                }else{
                    window.location.href = base_url+"products/sub_category";
                }
            }
        });
    });
    $(".viewScate").click(function(){
        var scat_id = $(this).attr("eyeScate");
        $.ajax({
            method:'POST',
            url:base_url+'products/viewSubCategory',
            data:{scat_id:scat_id},
            dataType:"json",
            success: function(data){
                //console.log(data);
                $("#scate_name").html(data.scat_info.scate_name);
                $("#cate_name").html(data.scat_info.cate_name);
                if((data.scat_info.scate_status)=='0'){
                    $("#scate_status").html('<span class="badge bg-green">Active</span>');
                }else{
                    $("#scate_status").html('<span class="badge bg-red">Inactive</span>');
                }
                $("#screated").html(data.scat_info.scate_created);
            }
        });
    });
    $("#btnUpdateSubCategory").click(function(){
        $.ajax({
            method:"post",
            url:base_url+"products/updateSubCategoryInfo",
            data:$("#formUpdateSubCategory").serialize(),
            success:function(data){
                //alert(data);
                if(data=="done"){
                    window.location.href = base_url+"products/sub_category";
                }else{
                    window.location.href = base_url+"products/sub_category";
                }
            }
        });
    });
    $(".removeScate").click(function(){
        var scate_id = $(this).attr("deleteScate");
        if (confirm("Are you sure?")) {
            //alert(pro_id);
            $.ajax({
                method:'post',
                url:base_url+'products/deleteSubCategory',
                data:{scate_id:scate_id},
                success: function(data){
                    if(data=="ok"){
                        window.location.href = base_url+'products/sub_category';
                    }else{
                        window.location.href = base_url+'products/sub_category';
                    }
                }
            });
        }
        return false;
    });
    // HOME SLIDER //
    $("#formHomeSlider").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"products/save_home_slider",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                //alert(data);
                if(data=="upload"){
                    window.location.href=base_url+"products/banners";
                }else if(data=="failed"){
                     window.location.href=base_url+"products/banners";
                }else{

                }
            }
        });
    });

    // STATUS CHANGE OF BANNERS //
    $(".bannerStatusEnable").click(function(){
        var bann_id = $(this).attr("bannStatuseE");
        if (confirm("Are you sure to change banner status?")) {
            //alert(pro_id);
            $.ajax({
                method:'post',
                url:base_url+'products/manageBannerStatusEnable',
                data:{bann_id:bann_id},
                success: function(data){
                    if(data=="ok"){
                        window.location.href = base_url+'products/banners';
                    }else{
                        window.location.href = base_url+'products/banners';
                    }
                }
            });
        }
        return false;
    });
    // DISABLE BANNER STATUS //
    $(".bannerStatusDisable").click(function(){
        var bann_id = $(this).attr("bannStatusD");
        if (confirm("Are you sure to change banner status?")) {
            $.ajax({
                method:'post',
                url:base_url+'products/manageBannerStatusDisable',
                data:{bann_id:bann_id},
                success: function(data){
                    if(data=="ok"){
                        window.location.href = base_url+'products/banners';
                    }else{
                        window.location.href = base_url+'products/banners';
                    }
                }
            });
        }
        return false;
    });
    // DELETE HOME BANNERS //
    $(".bannerDelete").click(function(){
        var banner_id = $(this).attr("banDel");
        if(confirm("Are yor sure want to delete home banner.")){
            $.ajax({
                method:'post',
                url:base_url+'products/removeBanners',
                data:{banner_id:banner_id},
                success: function(data){
                    if(data=="ok"){
                        window.location.href = base_url+'products/banners';
                    }else{
                        window.location.href = base_url+'products/banners';
                    }
                }
            });
        }
        return false;
    });
    // SAVE EXTRA FIELD IN ADD PRODUCTS SECTION //

    var max_fields_limit_size_extra = 10; //set limit for maximum input fields
    var x_size_extra = 1; //initialize counter for text box
    $('.add_more_button_size_extra').click(function(e){ 
        e.preventDefault();
        if(x_size_extra < max_fields_limit_size_extra){ //check conditions
            x_size_extra++; //counter increment
            $('.input_fields_container_size_extra').append('<div><input type="text" name="extra_field_title[]" placeholder="Enter Field Title"  required="required"/>&nbsp;&nbsp;<input type="text" name="extra_field_value[]" placeholder="Enter Field Value"  required="required"/><a href="#" class="btn btn-primary btn-sm remove_field_size_extra" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container_size_extra').on("click",".remove_field_size_extra", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x_size_extra--;
    });

    // END OF THE CATEGORY //
	$("#formProduct").on('submit',function(e){
		e.preventDefault();
		$.ajax({
	    	method:"post",
	    	url:base_url+"products/saveProducts",
	    	data:new FormData(this),
	    	contentType: false,
            cache: false,
            processData:false,
	    	success:function(data){
	    		//alert(data);
	    		if(data=="done"){
	    			window.location.href=base_url+"products/add";
	    		}else{
	    			alert(data);
	    		}
	    	}
	    });
	});

	// ADD MORE DYNAMIC FIELD FOR SIZE //

	var max_fields_limit_size      = 10; //set limit for maximum input fields
    var x_size = 1; //initialize counter for text box
    $('.add_more_button_size').click(function(e){ 
        e.preventDefault();
        if(x_size < max_fields_limit_size){ //check conditions
            x_size++; //counter increment
            $('.input_fields_container_size').append('<div><input type="text" name="pro_size[]" placeholder="Enter product size"  required="required"/>&nbsp;&nbsp;<input type="text" name="pro_price[]" placeholder="Enter Product price"  required="required"/><a href="#" class="btn btn-primary btn-sm remove_field_size" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container_size').on("click",".remove_field_size", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x_size--;
    });

    // DELETE PRODUCT RECORD FROM TABLE //
    $(".btnProductsDelete").click(function(){
		var pro_id = $(this).attr("proDelete");
		if (confirm("Are you sure?")) {
        	//alert(pro_id);
        	$.ajax({
        		method:'post',
        		url:base_url+'products/deleteProducts',
        		data:{pro_id:pro_id},
        		success: function(data){
        			if(data=="ok"){
        				window.location.href = base_url+'products/view';
        			}else{
        				window.location.href = base_url+'products/view';
        			}
        		}
        	});
    	}
    	return false;
	});
    // ENABLE PRODUCTS //
    $(".btnProductsEnable").click(function(){
        var pro_id = $(this).attr("proEnable");
        if (confirm("Are you sure?")) {
            //alert(pro_id);
            $.ajax({
                method:'post',
                url:base_url+'products/enableProducts',
                data:{pro_id:pro_id},
                success: function(data){
                    if(data=="ok"){
                        window.location.href = base_url+'products/disabled';
                    }else{
                        window.location.href = base_url+'products/disabled';
                    }
                }
            });
        }
        return false;
    });

    // UPDATE PRODUCTS INOFRMATION //
    $("#formUpdateProduct").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            method:"post",
            url:base_url+"products/saveProductsChangeInfo",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                alert(data);
                // if(data=="done"){
                //     window.location.href=base_url+"products/view";
                // }else{
                //     alert(data);
                // }
            }
        });
    });

	// VIEW PRODUCT DETAILS FROM DATABASE //
	$(".btnProductView").click(function(){
		var pro_id = $(this).attr("proView");
    	$.ajax({
    		method:'POST',
    		url:base_url+'products/viewProductDetails',
    		data:{pro_id:pro_id},
    		dataType:"json",
    		success: function(data){
    			//data = JSON.parse(data);
                //console.log(data.price);
                var prImg='';
                prImg +=' <img alt="User Pic" src='+base_url1+''+data.pic.pic_param+' id="picture"  class="img-circle img-responsive">'
    			$("#proPic").html(prImg);
                $("#productName").html(data.info.pro_title);

                if((data.info.pro_theme)!=''){
                    $("#theme").html(data.info.pro_theme);
                }else{
                    $("#theme").html('NA');
                }

                if((data.info.pro_offers)!=''){
                    $("#offers").html(data.info.pro_offers);
                }else{
                    $("#offers").html('NA');
                }

                if((data.info.pro_videos)!=''){
                    $("#videos").html(data.info.pro_videos);
                }else{
                    $("#videos").html('NA');
                }
    			
    			$("#ReqPic").html(data.info.pro_required_picture);
    			$("#msgCard").html(data.info.pro_message_on_card);

                var i=0;
                var prHtm='';
                for(var key in data.price){
                    prHtm +='<tr><td>'+data.price[i].size_param+'</td><td>'+data.price[i].size_related_price+'</td></tr>';
                    i++;
                }
                $("#priceData").html(prHtm);
    		}
    	});
	});

	// MULTIPLE SELETION PINCODE //
	$(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 3,
            placeholder: 'Select Appointment Time',
            search: true,
            searchOptions: {
                'default': 'Search Appointment Time'
            },
            selectAll: true
        });

    });
    // END OF THE MULTIPLE SELECTION //

    // PHOTO RECEIVED OR NOT //
    // $(".photoReceivedYes").click(function(){
    // 	var ord_id = $(this).attr("photoyes");
    //     //alert(ord_id);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoReceivedYes",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="PhotoYes"){
    // 				$("#photono"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // $(".photoReceivedNo").click(function(){
    	
    // 	var ord_id = $(this).attr("photono");
    //     //alert(ord_id);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoReceivedNo",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="PhotoNo"){
    // 				$("#photoyes"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // // SHIPPING REQUIRED //

    // $(".shippingYes").click(function(){
    // 	var ord_id = $(this).attr("shippingyes");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/shippingYes",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="shipYes"){
    // 				$("#shipingNo"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });

    // $(".shippingNo").click(function(){
    // 	var ord_id = $(this).attr("shippingno");
    // 	//alert(ord_id);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/shippingNo",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="shipNo"){
    // 				$("#shippingYes"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // // PHOTO CROPED STATUS //

    // $(".photoCropYes").click(function(){
    // 	var ord_id = $(this).attr("photo_crop_yes");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoCropYes",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="cropYes"){
    // 				$("#photoCropNo"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // $(".photoCropNo").click(function(){
    // 	var ord_id = $(this).attr("photo_crop_no");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoCropNo",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="cropNo"){
    // 				$("#photoCropYes"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // // STATUS OF PHOTO PRINT OR NOT //
    // $(".photoPrintedYes").click(function(){
    // 	var ord_id = $(this).attr("photo_printed_yes");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoPrintedYes",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="printYes"){
    // 				$("#photoPrintedNo"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // $(".photoPrintedNo").click(function(){
    // 	var ord_id = $(this).attr("photo_printed_no");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoPrintedNo",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="printNo"){
    // 				$("#photoPrintedYes"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });

    // // STATUS OF PHOTO CUTTING //
    // $(".photoCuttingYes").click(function(){
    // 	var ord_id = $(this).attr("photo_cutting_yes");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoCuttingYes",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="cuttingYes"){
    // 				$("#photoCuttingNo"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // $(".photoCuttingNo").click(function(){
    // 	var ord_id = $(this).attr("photo_cutting_no"); 
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoCuttingNo",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="cuttingNo"){
    // 				$("#photoCuttingYes"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // // PHOTO PASTING STATUS //
    // $(".photoPastingYes").click(function(){
    // 	var ord_id = $(this).attr("photo_pasting_yes");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoPastingYes",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="pastingYes"){
    // 				$("#photoPastingNo"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // $(".photoPastingNo").click(function(){
    // 	var ord_id = $(this).attr("photo_pasting_no");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoPastingNo",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="pastingNo"){
    // 				$("#photoPastingYes"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // // PHOTO CHECKED STATUS //
    // $(".photoCheckedYes").click(function(){
    // 	var ord_id = $(this).attr("photo_checked_yes"); 
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoCheckedYes",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="checkedYes"){
    // 				$("#photoCheckedNo"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });
    // $(".photoCheckedNo").click(function(){
    // 	var ord_id = $(this).attr("photo_checked_no");
    // 	//alert(status);
    // 	$.ajax({
    // 		method:"post",
    // 		url:base_url+"products/photoCheckedNo",
    // 		data:{ord_id:ord_id},
    // 		success: function(data){
    // 			if(data=="checkedNo"){
    // 				$("#photoCheckedYes"+ord_id).hide();
    // 			}else{

    // 			}
    // 		}
    // 	});
    // });


    // UPDATE CATEGORY TRACK LEVEL BY THEIR STATUS //

    $(".trackLevelYes").click(function(){
        var cat_track_id = $(this).attr("tracklevelyes");
        var ord_id = $(this).attr("ordid");
        $.ajax({
    		method:"post",
    		url:base_url+"products/trackLevelYes",
    		data:{cat_track_id:cat_track_id,ord_id:ord_id},
    		success: function(data){
                //alert(data);
    			if(data=="trackYes"){
    				$("#trackLevelNo"+ord_id).hide();
    			}else{

    			}
    		}
    	});
    });
    // PHOTO PACKED STATUS //

    $(".photoPackedYes").click(function(){
    	var ord_id = $(this).attr("photo_packed_yes");
    	//alert(status);
    	$.ajax({
    		method:"post",
    		url:base_url+"products/photoPackedYes",
    		data:{ord_id:ord_id},
    		success: function(data){
    			if(data=="packedYes"){
    				$("#photoPackedNo"+ord_id).hide();
    			}else{

    			}
    		}
    	});
    });
    $(".photoPackedNo").click(function(){
    	var ord_id = $(this).attr("photo_packed_no");
    	//alert(status);
    	$.ajax({
    		method:"post",
    		url:base_url+"products/photoPackedNo",
    		data:{ord_id:ord_id},
    		success: function(data){
    			if(data=="packedNo"){
    				$("#photoPackedYes"+ord_id).hide();
    			}else{

    			}
    		}
    	});
    });

    // PHOTO DESPATCHED STATUS //

    $(".photoDespatchedYes").click(function(){
    	var ord_id = $(this).attr("photo_despatched_yes");
    	//alert(status);
    	$.ajax({
    		method:"post",
    		url:base_url+"products/photoDespatchedYes",
    		data:{ord_id:ord_id},
    		success: function(data){
    			if(data=="despatchedYes"){
    				$("#photoDespatchedNo"+ord_id).hide();
    			}else{

    			}
    		}
    	});
    });
    $(".photoDespatchedNo").click(function(){
    	var ord_id = $(this).attr("photo_despatched_no");

    	$.ajax({
    		method:"post",
    		url:base_url+"products/photoDespatchedNo",
    		data:{ord_id:ord_id},
    		success: function(data){
    			if(data=="despatchedNo"){
    				$("#photoDespatchedYes"+ord_id).hide();
    			}else{

    			}
    		}
    	});
    });


    // DISABLE ORDER //
    $(".disable").click(function(){
        var ord_id = $(this).attr("disable");
        $.ajax({
            method:"post",
            url:base_url+"products/orderDisable",
            data:{ord_id:ord_id},
            success: function(data){
                if(data=="done"){
                    window.location.href = base_url+"products/orders";
                }
            }
        });
    });

    // VIEW CUSTOMER DETAIL WITH  ORDERS //
    $(".info").click(function(){
        var order_id = $(this).attr("info");
        //alert(order_id);
        $.ajax({
            method:'POST',
            url:base_url+'products/viewCustomerDetailWithOrderId',
            data:{order_id:order_id},
            dataType:"json",
            success: function(data){

                $("#name").html(data.customers.pro_title);
                $("#theme").html(data.customers.pro_theme);
                $("#offer").html(data.customers.pro_offers);
                $("#required").html(data.customers.pro_required_picture);
                $("#msgOnCard").html(data.customers.pro_message_on_card);
                $("#sizes").html(data.customers.ord_product_size);
                $("#cname").html(data.customers.user_name);
                $("#email").html(data.customers.user_email);
                $("#mobile1").html(data.customers.user_mobile_no);
                $("#mobile2").html(data.customers.user_whatsapp_no);
                $("#scname1").html(data.customers.user_state);
                $("#scname2").html(data.customers.user_city);
                $("#addname1").html(data.customers.user_address1);
                $("#addname2").html(data.customers.user_address2);
                $("#pincode").html(data.customers.user_pincode);
                $("#lmname").html(data.customers.user_nearby_landmark);
                $("#ordno").html(data.customers.ord_reference_id);
                $("#qty").html(data.customers.ord_qty);
                $("#price").html(data.customers.ord_price);
                $("#discount").html(data.customers.ord_discound_price);
                $("#total").html(data.customers.ord_total_price);
                if(data.customers.ord_mode_of_payments=='0'){
                    $("#modeofpay").html("Cash On Delivery");
                }else{
                    $("#modeofpay").html("Online Payment");
                }
                
            }
        });
    });
    // SHOW ORDER LIST ACCORDING CATEGORIES //
    // $("#order_category").change(function(){
    //     var cate_id = $(this).val();
    //     //alert(cate_id);
    //     //$(".table").show();
    //     $.ajax({
    //         method:'post',
    //         url:base_url+'products/getOrderListByCategoryId/'+cate_id,
    //         success: function(data){
    //             alert(data);
    //             // if(data!=''){
    //             //     window.location.href = base_url+'products/order_list_by_category/'+data;
    //             // }else{
    //             //     alert(data);
    //             // }
    //         }
    //     });
    // });

    // DELETE TEMPORARY CUSTOMER RECORD //
    $(".deleteTempCustomers").click(function(){
        var temp_custo_id = $(this).attr("delTempCusto");
        if (confirm("Are you sure?")) {
            //alert(pro_id);
            $.ajax({
                method:'post',
                url:base_url+'products/deleteTempCustomersRecord',
                data:{temp_custo_id:temp_custo_id},
                success: function(data){
                    if(data=="ok"){
                        window.location.href = base_url+'products/temp_orders';
                    }else{
                        window.location.href = base_url+'products/temp_orders';
                    }
                }
            });
        }
        return false;
    });

    // VIEW TEMP CUSTOMER DETAILS //
    $(".viewtempCustomers").click(function(){
        var temp_custo_id = $(this).attr("viewTempCusto");
        //alert(customer_id);
        $.ajax({
            method:'POST',
            url:base_url+'products/viewTempCustomerRecordById',
            data:{temp_custo_id:temp_custo_id},
            dataType:"json",
            success: function(data){
                //console.log(data);
                //alert(data);
                //data = JSON.parse(data);
                $("#name").html(data.temp_record.tmp_custo_fname);
                $("#email").html(data.temp_record.tmp_custo_email);
                $("#mobile").html(data.temp_record.tmp_custo_cmob);
                $("#state").html(data.temp_record.tmp_custo_state);
                $("#city").html(data.temp_record.tmp_custo_city);
                $("#address").html(data.temp_record.tmp_custo_add1+','+data.temp_record.tmp_custo_landmark+','+data.temp_record.tmp_custo_add2);
                $("#pincode").html(data.temp_record.tmp_custo_pincode);
                if((data.temp_record.tmp_custo_status)!=''){
                    $("#status").html('<span class="badge bg-red">Incomplete Order</span>');
                }

                $("#pname").html(data.temp_record.pro_title);
                $("#psize").html(data.temp_record.tmp_custo_size);
                $("#pprice").html(data.temp_record.tmp_custo_price);
                
            }
        });
    });

    // CHECK ALL ORDER RECORDS FOR EXCEL DOWNLOAD //
    $(".downloadExcel").change(function(){
        //$(".minimal").prop("checked", $(this).prop("checked"));
        
    });
});