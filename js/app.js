$(document).ready(function() {
	$("a.scrollto").click(function() {
		var target = $(this).attr('href');
	    $('html, body').animate({
	        scrollTop: $(target).offset().top
	    }, 100);
	});
});

$(document).ready(function(){

	load_product();

	load_cart_data();
    
	function load_product()
	{
		$.ajax({
			url:"index.php",
			method:"POST",
			data:function(data)
			{
				$('#product_wrapper').html(data);
			}
		});
	}

	function load_cart_data()
	{
		$.ajax({
			url:"cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$(cart_count).html(data.cart_details);
				
			}
		});
	}

$(document).ready(function(){
    $("buy").click(function(){
        $.ajax({
        	url: "cart.php",
        	method:"POST", 
        	success: function(result){
            $("shopping_cart").html(result);
        }});
    });
});
	

    $(document).ready(function(){

      $.ajax({
        type:'post',
        url:'cart.php',
        data:{
          shopping_cart:"totalitems"
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });

    });

    function cart(id)
    {
	  var ele=document.getElementById(id);
	  var img_src=ele.getElementsByTagName("img")[0].src;
	  var name=document.getElementById(id+"_name").value;
	  var price=document.getElementById(id+"_price").value;
	
	  $.ajax({
        type:'post',
        url:'cart.php',
        data:{
          item_src:img_src,
          item_name:name,
          item_price:price
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });
	
    }



function work(event) {
			document.querySelector("#products").innerHTML = event; //sets or returns the content
		}
		function call(event) {
			return event.text();
		}
		function btnOne() {
			fetch("http://demo4296963.mockable.io/news-sport").call().then(work);
		}
		
		document.querySelector("#total_items").addEventListener("click", btnOne);
		document.querySelector("#total_items").click();

