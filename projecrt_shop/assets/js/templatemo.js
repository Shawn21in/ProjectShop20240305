/*

TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

*/

/*test*/
var ProductLoader = {
  user_id: 1,
  product_type1: "",
  product_type2: "",
  product_type3: "",
  currentPage: 1,
  itemsPerPage: 12,
  totalPages: 0,
  products: [],

  init: function (user_id, product_type1, product_type2, product_type3) {
    this.user_id = user_id;
    this.product_type1 = product_type1;
    this.product_type2 = product_type2;
    this.product_type3 = product_type3;
    this.loadProducts();
    this.setupEventHandlers();
  },

  loadProducts: function () {
    var self = this;
    $.ajax({
      url: "./shop/product_list.php",
      type: "post",
      data: {
        user_id: self.user_id,
        product_type1: self.product_type1,
        product_type2: self.product_type2,
        product_type3: self.product_type3
      },
      dataType: "json",
      success: function (response) {
        self.products = response.products;
        self.updatePagination();
        self.renderProducts();
      },
      error: function (xhr, status, error) {
        console.error('Error fetching products:', error);
      }
    });
  },

  setupEventHandlers: function () {
    var self = this;
    $('#pagebutton.row').on('click', '.page-link', function () {
      var page = $(this).data('page');
      self.currentPage = page;
      self.renderProducts();
      self.updateActivePage(page);
    });

    $('a[data-type1-id]').click(function () {
      var type1Id = $(this).data('type1-id');
      console.log(self.user_id);
      console.log(type1Id);
      self.product_type1 = type1Id; // 更新產品類型
      self.loadProducts(); // 重新加載產品數據
    });

    $('a[data-type2-id]').click(function () {
      var type2Id = $(this).data('type2-id');
      console.log(self.user_id);
      console.log(type2Id);
      self.product_type2 = type2Id; // 更新產品類型
      self.loadProducts(); // 重新加載產品數據
    });

    $('a[data-type3-id]').click(function () {
      var type3Id = $(this).data('type3-id');
      console.log(self.user_id);
      console.log(type3Id);
      self.product_type3 = type3Id; // 更新產品類型
      self.loadProducts(); // 重新加載產品數據
    });
  },

  updatePagination: function () {
    this.totalPages = Math.ceil(this.products.length / this.itemsPerPage);
    this.renderPagination();
  },

  renderPagination: function () {
    var paginationHTML = '<ul class="pagination pagination-lg justify-content-end">';
    for (var i = 1; i <= this.totalPages; i++) {
      paginationHTML += '<li class="page-item">';
      paginationHTML += '<a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" data-page="' + i + '">' + i + '</a>';
      paginationHTML += '</li>';
    }
    paginationHTML += '</ul>';
    $('#pagebutton.row').html(paginationHTML);
  },

  renderProducts: function () {
    var startIndex = (this.currentPage - 1) * this.itemsPerPage;
    var endIndex = startIndex + this.itemsPerPage;
    var productsToShow = this.products.slice(startIndex, endIndex);

    var productListHTML = '';
    productsToShow.forEach(function (single_product) {
      const product_id = single_product.id;
      const isFavorite = single_product.favorite == true;
      const isCarts = single_product.carts == true;

      productListHTML +=
        '<div class="col-md-4" style="">' +
        '<div class="card mb-4 product-wap rounded-0">\n' +
        '<a href="shop-single.php?product_id=' + product_id + '" class="h3 text-decoration-none">' +
        '<div class="card rounded-0">\n' +
        '<img class="card-img rounded-0 img-fluid" src="' + single_product.img + '">\n' +
        '</div>' +
        '</a>' +
        '<div class="card-body">' +
        '<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">' +
        '<li class="pt-2" style="display: flex;">' +
        '<span id="boot-icon" class=""></span>' +
        '<span class="product-color-dot color-dot-red float-left rounded-circle mx-1" style="display: block; width:1rem; height: 1rem;"></span>' +
        '<span class="product-color-dot color-dot-blue float-left rounded-circle mx-1" style="display: block; width:1rem; height: 1rem;"></span>' +
        '<span class="product-color-dot color-dot-black float-left rounded-circle mx-1" style="display: block; width:1rem; height: 1rem;"></span>' +
        '<span class="product-color-dot color-dot-light float-left rounded-circle mx-1" style="display: block; width:1rem; height: 1rem;"></span>' +
        '<span class="product-color-dot color-dot-green float-left rounded-circle mx-1" style="display: block; width:1rem; height: 1rem;"></span>' +
        '<li><span id="favorite-btn-' + product_id + '" data-product-id="' + product_id + '" data-favorite="' + isFavorite + '">' +
        '<a class="btn text-white   heart-icon"><i class="far fa-heart"></i></a>' +
        '</span></li>' +
        '</li>' +
        '</ul>' +
        '<ul class="w-100 list-unstyled d-flex justify-content-between mb-0 mt-2">' +
        '<li>男裝</li>' +
        '<li>M/L/X/XL1true</li>' +
        '</ul>' +


        '<a href="shop-single.php?product_id=' + product_id + '" class="h3 text-decoration-none">' + single_product.name + '</a>' +
        '<p class="text-center mb-0 mt-2">' + single_product.price + '</p>' +
        '</div>' + '</div>' + '</div>';

    });

    $("#product_area").html(productListHTML);

    $('[id^="favorite-btn-"]').each(function () {
      const btn = $(this);
      const isFavorite = btn.data('favorite') == true;
      updateFavoriteIcon(btn, isFavorite);
      //  console.log("helloFavorite");
      //  console.log(isFavorite);
    });

    $('[id^="cart-btn-"]').each(function () {
      const btn1 = $(this);
      const isCarts = btn1.data('carts') == true;
      updateCartsIcon(btn1, isCarts);
      //  console.log("helloCarts");
      //  console.log(isCarts);
    });
  },

  updateActivePage: function (page) {
    $('.page-link').removeClass('active');
    $('[data-page="' + page + '"]').addClass('active');
  }
};
/*test*/












function Categories() {
  var all_panels = $('.templatemo-accordion > li > ul').hide();

  $('.templatemo-accordion > li > a').click(function () {
    //console.log('Hello world!');
    var target = $(this).siblings('ul');
    //  var isOpen = target.hasClass('active');
    if (target.hasClass('active')) {
      target.removeClass('active').slideUp();
    } else {
      if (!target.hasClass('active')) {
        all_panels.removeClass('active').slideUp();
        target.addClass('active').slideDown();
      }
    }

    return false;
  })
}

'use strict';
$(document).ready(function () {

  // Accordion
  var all_panels = $('.templatemo-accordion > li > ul').hide();

  $('.templatemo-accordion > li > a').click(function () {
    //console.log('Hello world!');
    var target = $(this).siblings('ul');
    //  var isOpen = target.hasClass('active');
    if (target.hasClass('active')) {
      target.removeClass('active').slideUp();
    } else {
      if (!target.hasClass('active')) {
        all_panels.removeClass('active').slideUp();
        target.addClass('active').slideDown();
      }
    }

    return false;
  });

  function Categories() {
    var all_panels = $('.templatemo-accordion > li > ul').hide();

    $('.templatemo-accordion > li > a').click(function () {
      //console.log('Hello world!');
      var target = $(this).siblings('ul');
      //  var isOpen = target.hasClass('active');
      if (target.hasClass('active')) {
        target.removeClass('active').slideUp();
      } else {
        if (!target.hasClass('active')) {
          all_panels.removeClass('active').slideUp();
          target.addClass('active').slideDown();
        }
      }

      return false;
    })
  }
  // End accordion



  // Product detail
  $('.product-links-wap a').click(function () {
    var this_src = $(this).children('img').attr('src');
    $('#product-detail').attr('src', this_src);
    return false;
  });
  $('#btn-minus').click(function () {
    var val = $("#var-value").html();
    val = (val == '1') ? val : val - 1;
    $("#var-value").html(val);
    $("#product-quanity").val(val);
    return false;
  });
  $('#btn-plus').click(function () {
    var val = $("#var-value").html();
    val++;
    $("#var-value").html(val);
    $("#product-quanity").val(val);
    return false;
  });
  $('.btn-color').click(function () {
    var this_name = $(this).data('color-name');
    var this_val = $(this).data('color-id');
    $("#product-color-name").html("Clothes style :" + this_name);
    $("#product-color").val(this_val);
    // $(".btn-color").removeAttr( 'style' ,'border: 1rem solid;');
    // $(".btn-color").attr("style", 'border: 1rem solid;');
    // $(".btn-color").addClass( 'a');
    $(".btn-color").removeClass('shopitemcolor');
    $(this).addClass('shopitemcolor');
    // $(this).attr("style", 'border: 1rem solid;');
    return false;
  });
  $('.btn-size').click(function () {
    var this_val = $(this).data('size-id');;
    $("#product-size").val(this_val);
    $(".btn-size").removeClass('btn-secondary');
    $(".btn-size").addClass('btn-success');
    $(this).removeClass('btn-success');
    $(this).addClass('btn-secondary');
    return false;
  });
  // End roduct detail

});
