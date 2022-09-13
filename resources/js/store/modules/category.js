export default {
    namespaced: true,

    state: {
        bookList: ['Book 1', 'Book 2', 'Book 3'],
        cart: "Hello"
    },

    getters: {
        totalBooks(state) {
            return state.bookList.length;
        }
    },

    actions: {
        addBook(contex, payload) {
            contex.commit('ADD_BooK', payload);
        },
        deleteBook(contex, index) {
            contex.commit('delete_Book', index);
        }
    },

    mutations: {
        ADD_BooK(state, data) {
            state.bookList.push(data);
        },

        delete_Book(state, index) {
            state.bookList.splice(index, 1);
        },



    }




};