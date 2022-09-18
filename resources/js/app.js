import './bootstrap'; //import bootstrap
import { createApp } from 'vue';
const app = createApp({}); //vue instance

//Install Vue Sweet alert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
app.use(VueSweetalert2);

//Install Vue Snotify
import 'vue3-snotify/style';
import snotify from 'vue3-snotify';
app.use(snotify);


//Install Vuex the store instance as a plugin
import store from "./store/index";
app.use(store);


//Dashboard
import DashboardComponent from './components/DashboardComponent.vue';
//Post Component
// import ViewPostComponent from './components/post/ViewPostComponent.vue';
// import CreatePostComponent from './components/post/CreatePostComponent.vue';
import ViewPost from './components/post/ViewPost.vue';
import CreatePost from './components/post/CreatePost.vue';
//Category Component
import CreateCategoryComponent from './components/category/CreateCategory.vue';
import ViewCategoryComponent from './components/category/ViewCategory.vue';
//Global register in Pagination
import PaginationComponent from './components/pagination/PaginationComponent.vue';
import PreloaderComponent from './components/pagination/Preloader.vue';
import SpinnerLoader from './components/SpinnerLoader.vue';
import Loader from './components/Loader.vue';


app.component('dashboard-component', DashboardComponent);
// app.component('view-post-component', ViewPostComponent);
// app.component('create-post-component', CreatePostComponent);
app.component('view-post', ViewPost);
app.component('create-post', CreatePost);
app.component('create-category-component', CreateCategoryComponent);
app.component('view-category-component', ViewCategoryComponent);
app.component('pagination-component', PaginationComponent);
app.component('preloader-component', PreloaderComponent);
app.component('spinner-loader', SpinnerLoader);
app.component('loader-component', Loader);
app.mount('#app');
