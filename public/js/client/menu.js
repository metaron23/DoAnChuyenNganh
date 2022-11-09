new Vue({
    el: '#menu_client',
    data: {
        listCategoryFood: [],
        listFood: [],
        totalPage: 0,
        page: 1,
        id: 0,
        keySearch: "",
        dataSearch: [],
    },
    created() {
        this.loadListCategoryFood();
        this.loadListFood(0);
    },
    methods: {
        loadListFood(id, event) {
            this.id = id;
            this.page = 1;
            axios
                .get("/menu/getFood/" + id + "?page=" + this.page)
                .then((res) => {
                    this.listFood = res.data.listFood.data;
                    this.totalPage = res.data.listFood.last_page;
                    $('.nav-tab').removeAttr("style");
                    try {
                        event.target.setAttribute("style", "color:#d50c0d;font-weight:600;");
                    } catch {
                        $('body .nav-tab-all').attr("style", "color:#d50c0d;font-weight:600;");
                    }
                });
            setTimeout(function() {
                $('.food__pagination li>a[data-id="1"]').parentsUntil("ul").addClass('active');
            }, 2000);
        },
        loadPaginate(page, event) {
            $('.food__pagination li').removeClass('active');
            axios
                .get("/menu/getFood/" + this.id + "?page=" + page)
                .then((res) => {
                    this.listFood = res.data.listFood.data;
                    event.target.parentElement.setAttribute("class", "active");
                });
        },
        loadListCategoryFood() {
            axios
                .get("/menu/category")
                .then((res) => {
                    this.listCategoryFood = res.data.category;
                });
        },
        getDataSearch() {
            if (this.keySearch == "") this.keySearch = null;
            axios
                .get("/menu/search/" + this.keySearch)
                .then((res) => {
                    this.dataSearch = res.data.foodSearch;
                });
        },
        detailFood(id) {
            axios
                .get("/menu/detailFood/" + id)
                .then((res) => {
                    window.location.href = "/menu/detailFood/"+id;
                });
        },
    }
});
