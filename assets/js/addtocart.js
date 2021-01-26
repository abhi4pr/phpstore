    
    $(document).ready(function(){
        $(document).on("click","#addItem",function(e){
          e.preventDefault();
          var form = $(this).closest(".form-submit");
          var id = form.find(".pid").val();
          var name = form.find(".pname").val();
          var price = form.find(".pprice").val();
          var image = form.find(".pimage").val();
          $.ajax({
            url: 'manage_cart.php',
            method: 'POST',
            data: {pid:id,pname:name,pprice:price,pimage:image},
            success: function(response){
                $("#message").html(response);
                window.scrollTo(0,0);
                load_cart_item_number();
            }
          });
        });

        load_cart_item_number();
        function load_cart_item_number(){
          $.ajax({
              url:'manage_cart.php',
              method:'get',
              data: {cartItem:'cart_item'},
              success: function(response){
                $('#cart-item').html(response);
            }
          });
        }
    });