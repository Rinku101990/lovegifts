<!-- footer end here -->
<div class="container">
    <p class="text-center"><strong> ©<?php echo date('Y');?> Kraft Point Technologies</strong></p>
</div>
<div class="sticky d-md-none">
    <div id="outer">
        <div class="inner"><a href="tel:+91 99886 55011" class="btn btn-lg btn-block btn-primary"><strong><span><i class="fa fa-phone" style="color:#fff;"></i></span>&nbsp&nbsp Call Now</strong></a></div>
        <div class="inner"><a href="https://api.whatsapp.com/send?phone=919988655011&text=Hi%20Love%20Gifts%20%E2%9D%A4%0AI%20want%20to%20Buy%20a%20Gift." class="btn btn-lg btn-block btn-success"><strong><span><i class="fa fa-whatsapp" style="color:#fff;"></i></span>&nbsp&nbsp Live Chat</strong></a></div>
    </div>
</div> 

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.touchSwipe.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/touchswipe.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/custom1.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/webslidemenu.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/process.js');?>"></script>
<script>
$(document).ready(function() {  
    $( ".widget h2" ).click(
        function() {
            $(this).parent().toggleClass('active');
        }
    );      
});
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script>
    $(document).ready(function(){
        var base_url = "http://localhost/lovegifts/";
        $("#checkPinCodeMini").click(function(){
            // alert("ok");
            //var proid = $("#productid").val();
            var cod = $("#cod1").val();
            //alert(cod);https://www.ordiusits.com/lovegifts/assets/images/cod.gif">');
            if(cod.length != '6'){
                $('#checkOutPincodeMini').modal('hide');
                $("#codMsg1").html("<div class='text-danger' style='margin-top:5px'><b>Invalid Pincode Format.</b></div>");
            }else{
                $.ajax({
                    method:'post',
                    url:base_url+'products/check_product_available',
                    data:{cod:cod},
                    dataType:"json",
                    beforeSend: function(){
                        $("#codMsg1").html('<img src="http://localhost/lovegifts/assets/images/cod.gif">');
                    },
                    success:function(data){
                        //console.log(data.status.pin_pick_up);
                        if(data.status==null){
                            $('#checkOutPincodeMini').modal('hide');
                            $("#codMsg1").html("<div class='text-success' style='margin-top:5px'><p><b>Shipping Not Available</b></p></div>");
                        }else if(data.status.pin_pick_up=="cod"){
                            $('#checkOutPincodeMini').modal('hide');
                            $("#codMsg1").html("<div class='text-success' style='margin-top:5px'><p><b>PREPAID/COD both are Available.</b></p></div>");
                        }else if(data.status.pin_pick_up=="prepaid"){
                            $('#checkOutPincodeMini').modal('hide');
                            $("#codMsg1").html("<div class='text-success' style='margin-top:5px'><p><b>PREPAID Only Available.</b></p></div>");
                        }else{
                            
                        }
                    }
                });
            }
        });
        $("#productSize1").on("change", function(){
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
                    $("#productPrice1").html(data.price.size_related_price);
                }
            });
        });

        $(".btnProductCheckout1").click(function(){
            var product_id = $(this).attr("chkout1");
            var pro_category = $("#pro_category").val()
            var product_slug = $("#product_slug").val()
            var product_size = $("#productSize").val();
            var product_cod = $("#cod1").val();
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

        $("#btnPlaceOrder").on("submit", function(){
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
            data: {tmp_id:tmp_id,fname:fname,add1:add1,add2:add2,landmark:landmark,pincode:pincode,city:city,state:state,cmob:cmob,wmob:wmob,email:email,messagetxt:messagetxt,product:product,product_size:product_size,price:price,offerAmount:offerAmount,qty:qty,shipping:shipping,paymentmode:paymentmode,total:total},
            dataType:"json",
            success: function (data) {
              if(data.mode !='0'){
                window.location.href=base_url+'payumoney/index/'+data.ord_id;
              }else if(data.mode=='0'){
                window.location.href=base_url+'orders/orderSummery/'+data.ord_id;
              }else{

              }
            }
          });
          return false;
        });
        
        
        // AUTO SAVE CUSTOMER FORM DATA //
        function autoSaveCustomerDraftInfo(){ 
            $.ajax({  
                   url:base_url+"checkout/tempCustomerInfo",  
                   method:"post", 
                   data:$("#formCustomer").serialize(), 
                   dataType:"text",  
                   success:function(data){
                   //alert(data);  
                      if(data != ''){ 
                           $('#tmp_hidden_custo_id').val(data);
                           //window.setTimeout(autoSaveCustomerDraftInfo(), 100);  
                      }  
                      $('#autoSave').text("Post save as draft");  
                      setInterval(function(){  
                           $('#autoSave').text('process');  
                      }, 5800);  
                   }  
              });           
      }
      setInterval(function(){  autoSaveCustomerDraftInfo(); }, 12000); 
      // END OF THE AUTO SAVE CUSTOMER FORM DATA //
        
    });
</script>
</body>
</html>
		
		