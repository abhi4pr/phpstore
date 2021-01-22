  

    $(document).ready(function(){
        $(".addItemBtn").click(function(e){
          e.preventDefault();
          var $form = $(this).closest(".form-submit");
          var pid = $form.find(".pid").val();
          var pname = $form.find(".pname").val();
          var pprice = $form.find(".pprice").val();
          var pimage = $form.find(".pimage").val();
          //var pqty = $form.find(".pqty").val();
          $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage},
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
                url:'action.php',
                method:'get',
                data: {cartItem:'cart_item'},
                success: function(response){
                    $('#cart-item').html(response);
                }
            });
          }
    });
