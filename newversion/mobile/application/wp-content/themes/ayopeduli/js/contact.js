jQuery(document).ready(function($){
    jQuery('#success').hide(); //menyembunyikan elemen div dengan is success
     jQuery('#contact_form').submit(function(){ //bila tombol submit pada form contact_form di tekan
     /*membuat variabel yang menampung data yang didapat dari contact form
     keyword this mengarah kepada contact_form , dan fungsi serialize akan
     mengembalikan data bertipe array */
       var str = jQuery(this).serialize(); 
       jQuery.ajax({
            type: "POST", 
            url: "wp-admin/admin-ajax.php",
            data: 'action=contact_form&' + str,
            success: function(msg){ 
                jQuery('#node').ajaxComplete(function(event, request, settings){
                    if(msg == 'sent'){
                        jQuery('#node').hide();
                        jQuery('#success').show();
                    }else {
                        result = msg;
                        jQuery(".contact #node").html(result);
                        jQuery(".contact #node").fadeIn("slow");
                    }
                });
            }
       });
       return false;
    });
});