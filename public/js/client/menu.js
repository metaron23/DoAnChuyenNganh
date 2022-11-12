$(document).ready(function () {
    function createFoodList(listFoods) {
        let content = "";
        content += `<a class="nav-tab nav-tab-all" href="">Tất cả</a>`;
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
            content += `<div class="single__food__list d-flex wow fadeInUp">`;
            content += `<div class="food__list__thumbv">`;
            content += `<a href="#">`;
            content += `<img src="` + food.hinh_anh + `" alt="list food images" style="max-width:468px">`;
            content += `</a>`;
            content += `</div>`;
            content += `<div class=" responsive-menu-item food__list__inner d-flex align-items-center justify-content-between " >`;
            content += `<div class="food__list__details">`;
            content += `<h2><a href="/menu/detailFood/` + food.id + `">`+food.ten_mon_an+`</a></h2>`;
            content += `<p>` + food.mo_ta_ngan + `</p>`;
            content += `<div class="list__btn">`;
            content += `<a class="food__btn grey--btn theme--hover btn-menu-list">Đặt món</a>`;
            content += `</div>`;
            content += `</div>`;
            content += `<div class="food__rating">`;
            content += `<div class="list__food__prize">`;
            content += `<span style="font-size: 32px">` + (food.don_gia_khuyen_mai == 0 ? food.don_gia_ban : food.don_gia_khuyen_mai).toLocaleString() + ` VND</span>`;
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
    function getDataFoods(id) {
        axios
            .get("/menu/getFood/" + id + "?page=1")
            .then((res) => {
                console.log(res.data.listFood.data);
                $('#nav-all').html(createFoods(res.data.listFood.data));
            });
    }

    getDataFoods(0);
});


// new Vue({
//     el: '#menu_client',
//     data: {
//         listCategoryFood: [],
//         listFood: [],
//         totalPage: 0,
//         page: 1,
//         id: 0,
//         keySearch: "",
//         dataSearch: [],
//     },
//     created() {
//         this.loadListCategoryFood();
//         this.loadListFood(0);
//     },
//     methods: {
//         loadListFood(id, event) {
//             this.id = id;
//             this.page = 1;
//             axios
//                 .get("/menu/getFood/" + id + "?page=" + this.page)
//                 .then((res) => {
//                     this.listFood = res.data.listFood.data;
//                     this.totalPage = res.data.listFood.last_page;
//                     $('.nav-tab').removeAttr("style");
//                     try {
//                         event.target.setAttribute("style", "color:#d50c0d;font-weight:600;");
//                     } catch {
//                         $('body .nav-tab-all').attr("style", "color:#d50c0d;font-weight:600;");
//                     }
//                 });
//             setTimeout(function() {
//                 $('.food__pagination li>a[data-id="1"]').parentsUntil("ul").addClass('active');
//             }, 2000);
//         },
//         loadPaginate(page, event) {
//             $('.food__pagination li').removeClass('active');
//             axios
//                 .get("/menu/getFood/" + this.id + "?page=" + page)
//                 .then((res) => {
//                     this.listFood = res.data.listFood.data;
//                     event.target.parentElement.setAttribute("class", "active");
//                 });
//         },
//         loadListCategoryFood() {
//             axios
//                 .get("/menu/category")
//                 .then((res) => {
//                     this.listCategoryFood = res.data.category;
//                 });
//         },
//         getDataSearch() {
//             if (this.keySearch == "") this.keySearch = null;
//             axios
//                 .get("/menu/search/" + this.keySearch)
//                 .then((res) => {
//                     this.dataSearch = res.data.foodSearch;
//                 });
//         },
//         detailFood(id) {
//             axios
//                 .get("/menu/detailFood/" + id)
//                 .then((res) => {
//                     window.location.href = "/menu/detailFood/"+id;
//                 });
//         },
//     }
// });
