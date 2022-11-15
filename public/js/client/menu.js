$(document).ready(function () {
    function createFoodList(listFoods) {
        let content = "";
        content += `<a class="nav-tab nav-tab-all" href="" data-id="0">Tất cả</a>`;
        listFoods.forEach(listFood => {
            content += `<a class="nav-tab" data-id="` + listFood.id + `" href="">` + listFood.ten_danh_muc + `</a>`;
        });
        return content;

    }
    function getDataFoodList() {
        axios
            .get("/menu/category")
            .then((res) => {
                $('.food__nav').html(createFoodList(res.data.category));
            });
    }
    getDataFoodList();

    function createFoods(listFood) {
        let content = "";
        listFood.forEach(food => {
            content += `<div class="single__food__list d-flex wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">`;
            content += `<div class="food__list__thumb">`;
            content += `<a href="/menu/detailFood/` + food.id + `">`;
            content += `<img src="` + food.hinh_anh + `" alt="list food images">`;
            content += `</a>`;
            content += `</div>`;
            content += `<div class=" responsive-menu-item food__list__inner d-flex align-items-center justify-content-between " >`;
            content += `<div class="food__list__details">`;
            content += `<h2><a href="/menu/detailFood/` + food.id + `">` + food.ten_mon_an + `</a></h2>`;
            content += `<p>` + food.mo_ta_ngan + `</p>`;
            content += `<div class="list__btn">`;
            content += `<a class="food__btn grey--btn theme--hover btn-menu-list">Đặt món</a>`;
            content += `</div>`;
            content += `</div>`;
            content += `<div class="food__rating">`;
            content += `<div class="list__food__prize">`;
            content += `<span style="font-size: 34px">` + (food.don_gia_khuyen_mai == 0 ? food.don_gia_ban : food.don_gia_khuyen_mai).toLocaleString() + ` VND</span>`;
            content += `</div>`;
            content += `<ul class="rating">`;
            content += `<li><i class="zmdi zmdi-star"></i></li>`;
            content += `<li><i class="zmdi zmdi-star"></i></li>`;
            content += `<li><i class="zmdi zmdi-star"></i></li>`;
            content += `<li><i class="zmdi zmdi-star"></i></li>`;
            content += `<li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>`;
            content += `</ul>`;
            content += `</div>`;
            content += `</div>`;
            content += `</div>`;
        });
        return content;
    }
    function createPaginate(paginateFood) {
        let content = "";
        content += `<li>`;
        content += `<a href="#" class="head numberpage"><i class="zmdi zmdi-chevron-left"></i></a>`;
        content += `</li>`;
        for (let i = 1; i <= paginateFood.last_page; i++) {
            content += `<li>`;
            content += `<a href="" class="numberpage numberPaginate" data-id="` + i + `">` + i + `</a>`;
            content += `</li>`;
        };
        content += `<li><a href="#" class="last numberpage"><i class="zmdi zmdi-chevron-right"></i></a></li>`;
        return content;
    }
    var numberPage = 1;
    var idListFood = 0;
    var lastPage = 1;
    function getDataFoods(id, page) {
        axios
            .get("/menu/getFood/" + id + "?page=" + page)
            .then((res) => {
                $('#nav-all').html(createFoods(res.data.listFood.data));
                $('.food__pagination').html(createPaginate(res.data.listFood));
                let numberPages = $('.food__pagination .numberPaginate');
                $.each(numberPages, (key, value) => {
                    if ($(value).text() == page) {
                        $(value).closest('li').addClass('active');
                    }
                });
                lastPage = res.data.listFood.last_page;
                $('.food__nav .nav-tab').removeClass('active_food_nav');
                $('.food__nav .nav-tab[data-id="' + idListFood + '"]').addClass('active_food_nav');
            });
    }
    getDataFoods(idListFood, numberPage);
    $('body').on('click', '.food__pagination .numberPaginate', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        numberPage = id;
        getDataFoods(idListFood, numberPage);
    });
    $('body').on('click', '.head.numberpage', function (e) {
        e.preventDefault();
        if (numberPage == 1) {
            numberPage = 1;
            getDataFoods(idListFood, numberPage);
        } else {
            numberPage = numberPage - 1;
            getDataFoods(idListFood, numberPage);
        }
    });
    $('body').on('click', '.last.numberpage', function (e) {
        e.preventDefault();
        if (numberPage == lastPage) {
            numberPage = lastPage;
            getDataFoods(idListFood, numberPage);
        } else {
            numberPage = numberPage + 1;
            getDataFoods(idListFood, numberPage);
        }
    });
    $('body').on('click', '.food__nav .nav-tab', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        numberPage = 1;
        idListFood = id;
        getDataFoods(idListFood, numberPage);
    });
    function createContentSearch(foodSearchs) {
        let content = "";
        content += `<div class="row">`;
        foodSearchs.forEach(foodSearch => {
            content += `<div class="d-flex w--100 flex-row justify-content-between">`;
            content += `<a href="/menu/detailFood/`+foodSearch.id+`">`;
            content += `<img src="` + foodSearch.hinh_anh + `" alt="list food images" class="img-search img-thumbnail">`;
            content += `</a>`;
            content += `<div class="food__list__details">`;
            content += `<a href="/menu/detailFood/`+foodSearch.id+`"><h4>` + foodSearch.ten_mon_an + `</h4></a>`;
            content += `<span style="font-size: 16px">Giá: ` + (foodSearch.don_gia_khuyen_mai == 0 ? foodSearch.don_gia_ban : foodSearch.don_gia_khuyen_mai).toLocaleString() + ` VND</span>`;
            content += `</div>`;
            content += `</div>`;
        });
        content += `</div>`;
        return content;
    };

    // Create click event handler on the document.
    $(document).on("click", function (event) {
        if ($(event.target).closest(".food__search .serch__box input").length === 0) {
            $((".food__search .serch__box input")).val('');
            $('#content_search').empty();
            $('#content_search').attr('hidden', 'hidden');
        }
    });

    // Create click event handler on the container element.
    $(".food__search .serch__box input").on("click", function () {
        var timeout;
        var delay = 800;
        function delayFunction() {
            let data = $('.food__search .serch__box input').val();
            if (data == "") {
                $('#content_search').empty();
                $('#content_search').attr('hidden', 'hidden');
            } else {
                axios
                    .get("/menu/search/" + data)
                    .then((res) => {
                        if (res.data.foodSearch.length == 0) {
                            $('#content_search').html(`<p>Không tìm thấy!</p>`);
                        } else {
                            $('#content_search').empty();
                            $('#content_search').html(createContentSearch(res.data.foodSearch));
                        }
                    });
            }
        }
        $('body').on('keyup', '.food__search .serch__box input', function (e) {
            $('#content_search').removeAttr('hidden', 'hidden');
            $('#content_search').html(`<div class="loadSearch"><div class="circle-loading"></div></div>`);
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                delayFunction();
            }, delay);
        });
    });
});
