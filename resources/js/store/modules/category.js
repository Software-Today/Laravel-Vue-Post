import Mixin from "../../helper/mixin"

export default {

    mixins: [Mixin],
    namespaced: true,

    state: {
        categories: [],
        isLoading: false,

        button_name: "Create Category",
        validation_error: null,
        elementVisible: true,
    },

    getters: {
        totalCategory(state) {
            return state.categories;
        },

        isLoading(state) {
            return state.isLoading;
        }
    },

    mutations: {
        getAllCategory(state, data) {
            state.categories = data;
            state.isLoading = false;
        }
    },

    actions: {
        async geDatatList({ commit, state }, [page, limit, keyword]) {
            if (keyword != '') {
                state.isLoading = false;
            } else {
                state.isLoading = true;
            }
            await axios.get(base_url + 'category/category/list?page=' + page + '&limit=' + limit + "&keyword=" + keyword).then((response) => {
                commit('getAllCategory', response.data.categories);
                
                console.log(response.data)
            }).catch((error) => {
                console.log(error)
                this.isLoading = false;
            });
            history.pushState(null, null, "?page=" + page + "&limit=" + limit + "&keyword=" + keyword);
        },

        saveData({ commit, state }, CategoryData) {

            state.button_name = "Saving Category...";

            axios.post(base_url + "category/category-create", CategoryData).then((response) => {
                if (response.data.status == "success") {
                    console.log(response.data.status);
                    $("#modal-form").modal("hide");
                    this.button_name = "Create Category";
                } else {
                    this.button_name = "Create Category";
                }
            }).catch((err) => {
                console.log(err);
                //state.isloading = false;
                state.button_name = "Create Category";

            });
        }

    }
}
