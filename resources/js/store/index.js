//Install Vuex the createStore instance as a plugin

import { createStore } from 'vuex'
import categoryModule from './modules/category'
import postModule from './modules/post'

const store = createStore({
    modules: {
        post: postModule, //postModule r namespace hoycce = post
        category: categoryModule //categoryModule r namespace hoycce = category
    },

})

export default store