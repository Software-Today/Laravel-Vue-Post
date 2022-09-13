export default {

    state: {
        postDataArr: [],
        postList: ['post 10', 'post 11'],
        totalCount: 0,
        from: 0,
        to: 0,
    },

    getters: {
        getPostData(state) {
            return state.postDataArr;
        }
    },

    actions: {
        async getDataList(data, [page, limit, keyword]) {
            await axios
                .get(
                    base_url +
                    "post/post/list?page=" +
                    page + "&limit=" + limit + "&keyword=" + keyword
                )
                .then((response) => {
                    //console.log(response.data.post);
                    console.log(response.data.post.to);
                    this.isLoading = true;
                    data.commit('getAllPost', response.data.post);
                    data.commit('totalRowCount', response.data.post.total); //total row count from database
                    data.commit('totalRowfrom', response.data.post.from);
                    data.commit('totalRowTo', response.data.post.to);
                })
                .catch((error) => {
                    console.log(error);
                });
            history.pushState(null, null, "?page=" + page + "&limit=" + limit);
        },

        addPost(contex, payload) {
            contex.commit('add_post', payload);
        }
    },



    mutations: {
        getAllPost(state, data2) {
            state.postDataArr = data2;
        },
        totalRowCount(state, rowcount) {
            state.totalCount = rowcount;
        },
        totalRowfrom(state, from) {
            state.from = from;
        },
        totalRowTo(state, to) {
            state.to = to;
        },

        add_post(state, data) {
            state.postList.push(data);
        }
    },
};