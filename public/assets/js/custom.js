(function ($) {
    "use strict"; // Start of use strict

// Preloader Start
  $(window).on('load',function () {
    $('#preloader-status').fadeOut();
    $('#preloader')
      .delay(350)
      .fadeOut('slow');
    $('body')
      .delay(350)
  });
// Preloader End

    /*---------------------------------
    Brand Logo Slider
   -----------------------------------*/
  $('.brand-carousel-1').owlCarousel({
        items: 6,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        margin: 5,
        nav: false,
        dots: false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        smartSpeed: 3000,
        autoplayTimeout:3000,
        responsive:{
        0:{
            items:1
        },
        575:{
            items:2
        },
        991:{
            items:3
        },
        1199:{
          items:4
        },
        1200:{
          items:6
        }
      }
    })
  $('.brand-carousel-2').owlCarousel({
        items: 6,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        margin: 5,
        nav: false,
        dots: false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        smartSpeed: 3000,
        autoplayTimeout:3000,
        responsive:{
        0:{
            items:1
        },
        575:{
            items:2
        },
        991:{
            items:3
        },
        1199:{
          items:4
        },
        1200:{
          items:6
        }
      }
    })

    /*---------------------------------
    Customer Testimonial JS
   -----------------------------------*/
    $('.customer-testimonial-slider').owlCarousel({
      items: 3,
      loop: true,
      autoplay: false,
      autoplayTimeout: 1500,
      margin: 25,
      nav: false,
      dots: true,
      navText: [
        "<span class=\"iconify\" data-icon=\"bi:arrow-left\"></span>",
        "<span class=\"iconify\" data-icon=\"bi:arrow-right\"></span>",
    ],
      smartSpeed: 3000,
      autoplayTimeout:3000,
      responsive:{
        0:{
            items:1
        },
        575:{
            items:1
        },
        991:{
            items:2
        },
        1199:{
          items:2
        },
        1200:{
          items:3
        }
      }
    });

    /*---------------------------------
    Blog Slider JS
   -----------------------------------*/
    $('.blog-slider').owlCarousel({
      items: 3,
      loop: true,
      autoplay: false,
      autoplayTimeout: 1500,
      margin: 25,
      nav: false,
      dots: true,
      navText: [
        "<span class=\"iconify\" data-icon=\"bi:arrow-left\"></span>",
        "<span class=\"iconify\" data-icon=\"bi:arrow-right\"></span>",
    ],
      smartSpeed: 3000,
      autoplayTimeout:3000,
      responsive:{
        0:{
            items:1
        },
        575:{
            items:1
        },
        991:{
            items:2
        },
        1199:{
          items:2
        },
        1200:{
          items:3
        }
      }
    });

  /*---------------------------------
    Show/Hide Password/ Toggle Password JS
  -----------------------------------*/
  $(".toggle").on("click", function () {

    if ($(".password").attr("type") == "password")
    {
        //Change type attribute
        $(".password").attr("type", "text");
        $(this).removeClass("fa-eye");
        $(this).addClass("fa-eye-slash");
    } else
    {
        //Change type attribute
        $(".password").attr("type", "password");
        $(this).addClass("fa-eye");
        $(this).removeClass("fa-eye-slash");
    }
});
/*---------------------------------
Show/Hide Password/ Toggle Password JS
-----------------------------------*/

})(jQuery); // End of use strict

// Sidebar Cart JS
function toggleCart() {
  document.getElementById('cartSidebar').classList.toggle('active');
}

// Update the add to cart form submission
document.querySelectorAll('.add-to-cart-form').forEach(form => {
  form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      fetch(this.action, {
          method: 'POST',
          headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
              'Content-Type': 'application/json',
              'Accept': 'application/json'
          },
          body: JSON.stringify({
              id: this.querySelector('input[name="id"]').value,
              name: this.querySelector('input[name="name"]').value,
              price: this.querySelector('input[name="price"]').value,
              features: this.querySelector('input[name="features"]').value,
          })
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              toggleCart();
              updateCartItems(data.cart, data.total);
          } else {
              alert('Failed to add item to cart');
          }
      });
  });
});

function updateCartItems(items, total) {
  const cartItemsContainer = document.querySelector('.cart-items');
  cartItemsContainer.innerHTML = '';  // Clear existing items

  if (Object.keys(items).length > 0) {
      for (const id in items) {
          const item = items[id];
          const itemHTML = `
              <div class="cart-item">
                  <div class="item-details">
                      <h5>${item.name}</h5>
                      <p>$${item.price}</p>
                  </div>
              </div>`;
          cartItemsContainer.insertAdjacentHTML('beforeend', itemHTML);
      }

      const totalHTML = `<div class="cart-total">
                              <h5>Total: $${total}</h5>
                              <a href="/cart" class="theme-btn w-100">View Cart</a>
                         </div>`;
      cartItemsContainer.insertAdjacentHTML('beforeend', totalHTML);
  } else {
      cartItemsContainer.innerHTML = '<p>Your cart is empty</p>';
  }
}
