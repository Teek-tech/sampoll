function payWithPaystack(){
   //var nameu = "{{ env('PAYSTACK_KEY') }}";
    var handler = PaystackPop.setup({
    key:'pk_test_4e1a285859f273d837b6f3a1aae6afc0adf46b2e', // "{{ env('PAYSTACK_KEY') }}", //'pk_test_4e1a285859f273d837b6f3a1aae6afc0adf46b2e', 
    email: document.getElementById("email").value,
    amount: document.getElementById("getFee").value,
    currency: "NGN",
    ref: 'KOTY-'+(Math.random().toString(36).substring(2, 16) + Math.random().toString(36).substring(2, 16)).toUpperCase(),
   
    callback: function(response){
      
    //  alert('success. registration ref is ' + response.reference);
    //  //alert(hello);
      document.getElementById("refcode").value = response.reference;
    document.getElementById('kotyform').submit();
       
    },
    onClose: function(){
       alert('window closed');
    }
    });
    handler.openIframe();
    
    }
    
//      $('select[name="ticket_type"]').change(function(){ // $( "#eventfee" ).click(function() {
//   var eventfee = parseInt( $( '#eventfee' ).val());
//   var quantity = parseInt( $('#ticketqty').val());
//    var total = eventfee * quantity;
//    $('#ticketAmount').val(total*0.015+total);
   
//   $('select[name="ticket_quantity"]').change(function(){  //  $('#ticketqty').click(function(){ 
//   var quantity = parseInt( $('#ticketqty').val());
//    var total = eventfee * quantity;
//    $('#ticketAmount').val(total*0.015+total);
//   });
// });
    
      
    window.setTimeout(function() {  
        $(".alert-success").animate({opacity: 0}, 500).hide('slow');
    }, 6000);
    
    $("div.alert").on("click", "button.close", function() {
        $(this).parent().animate({opacity: 0}, 500).hide('slow');
    }); 