<script src="/js/jquery.min.js"></script>             
<script src="/js/main.js"></script>
  
<script>
  var url = '/api/shop';
  
  fetch(url).then((response) => response.json())
  .then((data) => {
    
    var shoppingCart = [];

    function showCart(){
        if (shoppingCart.length == 0) {
            console.log("Your Shopping Cart is Empty!");
            return;
        }
        else {
            $(".cart-items").empty();
            for (var i in shoppingCart) {
                var $template = $($('#cartItem').html());
                var item = shoppingCart[i];
                $template.attr('id', item.Id);
                $template.find("span.item-quantities").text(item.Quantity);
                $template.find(".item-name").text(item.Product); 
                $template.find('.item-price').text(item.Price);
                $template.find('.item-prices').text(item.Quantity * item.Price);
                $template.find('span.qty').attr('style', 'background-image:'+ 'url('+item.Picture+')');
                $(".cart-items").append($template);
            }
        }
        updateTotal();
    }

    function saveCart(){
        if (window.localStorage) {
            localStorage.shoppingCart = JSON.stringify(shoppingCart);
        }
    }
    
    $(function(){
        for (var i=0; i<Object.keys(data).length; i++){
          var $template = $($('#productItem').html());
          $(".grid-layout").append(makeProductItem($template, data[i]));
        }

        if (localStorage.shoppingCart){
            shoppingCart = JSON.parse(localStorage.shoppingCart);
        }
        
        $("#cart-trigger").on('click', function () {
            showCart();
            toggle_panel($('#cart-sidebar'), $('#shadow-layer'));
        });
        
        $("#cart-sidebar .remove").on('click', function () {
            toggle_panel($('#cart-sidebar'), $('#shadow-layer'));
        });

        $("#menu-toggle").on('click', function () {
            $('.flexmenu').toggleClass('active');
        });
        
        $("#catalog").on('click', function () {
            $('.mega-menu').toggleClass('mega-active');
        });
        $(".mega-menu .close").on('click', function () {
            $('.mega-menu').removeClass('mega-active');
        });
    
        $(".buy-now").each(function(index, element){
            $(element).on('click', function (e) {
                $(e.target).parents('.product').find('.product-name')
                .css('display', 'none');
                $(e.target).parents('.product').find('.icon').css('display', 'none');
                $(e.target).parents('.product').find('.buy-now').css('display','none');
                $(e.target).parents('.product').find(' .product-detail').css('display', 'block');
                $(e.target).parents('.product-menu').css('top', '40%');
            });
        });
    
        $(".cancel").each(function(index, element){
            $(element).on('click', function (e) {
                $(e.target).parents('.product').find('.product-name').css('display', 'block');
                $(e.target).parents('.product').find('.icon').css('display', 'block');
                $(e.target).parents('.product').find('.buy-now').css('display','block');
                $(e.target).parents('.product').find(' .product-detail').css('display', 'none');
                $(e.target).parents('.product-menu').css('top', '80%');
            });
        });
      
        $(".product-detail").each(function(index, element){
            $(element).on('click', function () {
                var $template = $($('#productDetail').html());
                $template.find('.product-price').text($(this).parents(".product").find(".product-price").text());
                $template.find('.productDescription').text($(this).parents(".contentItem").find(".productDescription").text());
                $template.find('.product-name').text($(this).parents(".product").find(".product-name").text());
                $template.find('figcaption').attr('productId', $(this).parents(".product-menu").attr("productId"));
                $template.find('.product-description').text($(this).parents(".product").find(".product-description").text());
                var pics = data[$(this).parents(".product-menu").attr("productId")]['picture'];
                for (var j=0; j<pics.length; j++){
                    $template.find('img').eq(j).attr('src', '/images/'+pics[j]);
                }

                $(".grid-layout").empty();
                $(".grid-layout").append($template);

                let slideIndex = 1;

                const prev = $(".prev");
                const next = $(".next");

                function showSlide(n) {
                    let i;
                    let x = $(".slide");
                    if (n > x.length) {
                        slideIndex = 1
                    }    
                    if (n < 1) {
                        slideIndex = x.length
                    }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";  
                    }
                    x[slideIndex-1].style.display = "block";  
                }

                showSlide(slideIndex);

                function nextPrev(n) {
                    showSlide(slideIndex += n);
                }

                next.click(function() {
                    nextPrev(1);
                });

                prev.click(function() {
                    nextPrev(-1);
                });

                $(".addtocart").on('click', function(){
                    console.log('Add to cart');
                });
            });
        });
      
        $(".add-to-cart").each(function(index, element){
            $(element).on('click', function (e) {
                let id = $(this).parents('.product-menu').attr("productId");
                let price = $(this).parents(".product-menu").find(".product-price").text();
                let name = $(this).parents(".product").children(".product-name").text();
                let quantity = $(this).parents(".product-menu").find(".quantity").val();
                let picture = $(this).parents(".product").find("img").attr('src');

                for (let i in shoppingCart) {
                    if(shoppingCart[i].Id == id) {
                        shoppingCart[i].Quantity = parseInt(shoppingCart[i].Quantity) + parseInt(quantity);
                        saveCart();
                        $(this).parents('.product').find('.product-name')
                        .css('display', 'block');
                        $(this).parents('.product').find('.icon').css('display', 'block');
                        $(this).parents('.product').find('.buy-now').css('display','block');
                        $(this).parents('.product').find(' .product-detail').css('display', 'none');
                        $(this).parents('.product-menu').css('top', '80%');
                        return;
                    }
                }

                let item = { 
                    Id: id, 
                    Product: name,  
                    Price: price, 
                    Quantity: quantity, 
                    Picture: picture 
                }; 

                shoppingCart.push(item);

                saveCart();

                var y = 180;    
                $(e.target).parents('.product-wrapper')
                .css('transform', 'rotateY(' + y + 'deg)');
                $(e.target).parents('.grid-item').find('.product-back').addClass('back-is-visible');
                var imgtodrag = $(e.target).parents('.product').find("img").eq(0);
                if (imgtodrag) {
                    var imgclone = imgtodrag.clone()
                        .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                        .css({
                        'opacity': '0.5',
                            'position': 'absolute',
                            'height': '150px',
                            'width': '150px',
                            'z-index': '100'
                    })
                    .appendTo($('body'))
                        .animate({
                        'top': $('.shopping-cart').offset().top + 10,
                            'left': $('.shopping-cart').offset().left + 10,
                            'width': 75,
                            'height': 75
                    }, 1000);
            }

            $('.shoppingcart').fadeOut(1000, function() {
                $(this).css({
                    'backgroundColor':'rgba(255,0,0,0.5)',
                    'borderRadius': '50%',
                    'transform': 'scale(2, 2)'
                    });
            });

            $('.shoppingcart').fadeIn(500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });  

            $(e.target).parents('.product-wrapper').delay(3000).queue(function() {
                $(this).css({
                    'transform': 'rotateY(0deg)'
                }).dequeue();
                $(e.target).parents('.product').find('p').slideDown();
                $(e.target).parents('.product').find('.product-menu').css('top', '80%');
                $(e.target).parents('.product').find('.product-detail').toggle();
                $(e.target).parents('.product').find('.buy-now').toggle();
                $(e.target).parents('.product').find('.icon').toggle();
            });
            
            });
        });

        $('body').on('click', '.cart-items .item-remove', function () {
            var index = $(this).parent().attr("id");
            shoppingCart.splice(shoppingCart.indexOf(shoppingCart.find(x => x.Id === index)),1); 
            $(this).parents('li').remove();
            saveCart();
            updateTotal();
            }
        );

        $('body').on('click', '.cart .clear-cart', function () {
            localStorage.removeItem('shoppingCart');
            $(".cart-items").empty();
            shoppingCart = [];
            updateTotal();
        });


        $('.checkout__trigger').on('click',function(){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'check',
                success: function(d) {
                    if (d.r == "fail") {
                        window.location.href = d.url;
                    } else {
                        // console.log(d.msg);
                        toggle_panel($('#cart-sidebar'), $('#shadow-layer'));
                        $('.main-container').empty();
                        
                        let $template = $($('#order-form').html());
                        $template.find("#first_name").val(d.first_name);
                        $template.find("#last_name").val(d.last_name);
                        $template.find("#phone_number").val(d.phone_number);
                        $(".main-container").append($template);

                        $('#complete').on('click',function(){
                            $.ajax({
                                type: 'POST',
                                url: 'cart',
                                dataType: 'json',
                                data: { 'val': JSON.stringify(shoppingCart),
                                        'user_props': $("form#payorder").serialize() }
                            })
                            .then( function(data){
                                // console.log('succsess');
                                console.log(data);
                                localStorage.removeItem('shoppingCart');
                                $(".cart-items").empty();
                                shoppingCart = [];
                                updateTotal();
                                $(location).attr('href', 'profile')
                            });
                    
                        });
                    }
                }
            });
        });

        let plus = document.getElementsByClassName('plus');
        plus = Array.prototype.slice.call(plus); // теперь plus - массив
        plus.forEach(function(elem) {
            elem.addEventListener('click', function() {
                let val = parseInt(this.previousElementSibling.getAttribute('value'));
                this.previousElementSibling.setAttribute('value', val+1);
                });
        });

        let minus = document.getElementsByClassName('minus');
        minus = Array.prototype.slice.call(minus); // теперь minus - массив
        minus.forEach(function(elem) {
            elem.addEventListener('click', function() {
                let val = parseInt(this.nextElementSibling.getAttribute('value'));
                this.nextElementSibling.setAttribute('value', val-1);
                });
        });

    });

});

</script>
  