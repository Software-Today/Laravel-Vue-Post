import Mixin from "../../helper/mixin"

export default {

    mixins: [Mixin],
    namespaced: true,

    state: {
        posts: [],
        isLoading: false,

        button_name: "Create Post",
        validation_error: null,
        elementVisible: true,
    },

    getters: {
        totalPost(state) {
            return state.posts;
        },

        isLoading(state) {
            return state.isLoading;
        }
    },

    mutations: {
        getAllPost(state, data) {
            // console.log(data);
            state.posts = data;
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

            await axios
                .get(base_url + 'post/post/list?page=' + page + '&limit=' + limit + "&keyword=" + keyword)
                .then((response) => {
                    commit('getAllPost', response.data.post);
                })
                .catch((error) => {
                    console.log(error)
                    this.isLoading = false;
                })
            history.pushState(null, null, "?page=" + page + "&limit=" + limit + "&keyword=" + keyword);
        },

        saveData({ commit, state }, inputPostData) {

            state.button_name = "Saving Post...";

            axios
                .post(base_url + "post/post-create", inputPostData)
                .then((response) => {

                    if (response.data.status == "success") {
                        console.log(response.data.status);
                        $("#modal-form").modal("hide");
                        //this.resetForm();
                        //this.successMessage(response.data);
                        this.button_name = "Create Post";
                    } else {
                        //this.successMessage(response.data);
                        this.button_name = "Create Post";
                    }
                })
                .catch((err) => {
                    console.log(err);
                    //state.isloading = false;
                    state.button_name = "Create Post";

                });
        }

    }








}
