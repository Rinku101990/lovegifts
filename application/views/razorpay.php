<?php echo form_open_multipart('orders/addcredit/'); ?>
    <div class="form-group">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="razorpay_key">
        </script>
    </div>
<?php echo form_close(); ?>