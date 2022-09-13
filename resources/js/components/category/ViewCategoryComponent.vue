<template>
    <div class="row mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <label> Show &nbsp; </label>
                    </div>
                    <div class="float-left">
                        <select class="form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="500">500</option>
                            <option value="all">All Show</option>
                        </select>
                    </div>

                    <div class="float-left">
                        <label>&nbsp; entries &nbsp;</label>
                    </div>

                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Search By Title"
                                />
                            </div>
                        </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center pt-2">
                                    <div
                                        class="custom-checkbox custom-checkbox-table custom-control"
                                    >
                                        <input
                                            type="checkbox"
                                            data-checkboxes="mygroup"
                                            data-checkbox-role="dad"
                                            class="custom-control-input"
                                            id="checkbox-all"
                                        />
                                        <label
                                            for="checkbox-all"
                                            class="custom-control-label"
                                            >&nbsp;</label
                                        >
                                    </div>
                                </th>
                                <th>SL No</th>
                                <th>Title</th>
                                <th>Tag</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Status</th>
                            </tr>

                            <tbody>
                                <tr>
                                    <td>
                                        <div
                                            class="custom-checkbox custom-control"
                                        >
                                            <input
                                                type="checkbox"
                                                data-checkboxes="mygroup"
                                                class="custom-control-input"
                                                id="checkbox-2"
                                            />
                                            <label
                                                for="checkbox-2"
                                                class="custom-control-label"
                                                >&nbsp;</label
                                            >
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        fdshh
                                        <div class="table-links">
                                            <a href="#">View</a>
                                            <div class="bullet"></div>
                                            <a href="#">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="#" class="text-danger"
                                                >Trash</a
                                            >
                                        </div>
                                    </td>
                                    <td>fdssss</td>
                                    <td>
                                        <a href="#"> asvafdb </a>,
                                        <a href="#">Tutorial</a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img
                                                alt="image"
                                                :src="'/images/post/demo.jpg'"
                                                class="rounded-circle"
                                                width="35"
                                                data-toggle="title"
                                                title=""
                                            />
                                            <div class="d-inline-block ml-1">
                                                Masud
                                            </div>
                                        </a>
                                    </td>
                                    <td>10.20.10</td>
                                    <td>
                                        <div class="badge badge-primary">
                                            Published
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <h4>Todo</h4>

                        <h4>Total Book : {{finaltotalBooks}}</h4>
                        <input
                            type="text"
                            v-model="bookName"
                            placeholder="Book name"
                        />
                        <button @click="addBook(bookName)">Add Book</button>

                        <ul>
                            <li v-for="(book, index) in getbookList" :key="index">
                                {{ book }} <button @click="deleteBook(index)">Delete</button>

                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState, mapActions, mapGetters } from 'vuex';
export default {

    data() {
        return {
            bookName: "",
        };
    },

    mounted() {},

    computed: {


        ...mapState({
            getbookList: state => state.category.bookList,
        }),

        // bookList(){
        //     return this.$store.state.category.bookList
        // },
        // cart(){
        //     return this.$store.state.category.cart
        // }


        //Getter using namespace
        ...mapGetters('category',{
            finaltotalBooks: "totalBooks",
        })

        //using namespace
        // finaltotalBooks(){
        //     return this.$store.getters['category/totalBooks'];
        // },

        // //using without namespace
        // finaltotalBooks(){
        //     return this.$store.getters.totalBooks;
        // }


    },

    methods: {

        ...mapActions('category',{
            deleteBook: "deleteBook",
            addBook: "addBook",
        })

       //using without namespace
        // addBook(){
        //     this.$store.dispatch('addBook',this.bookName);
        // },

        // deleteBook(index){
        //     this.$store.dispatch('deleteBook',index);
        // },

        //using namespace
        //  addBook(){
        //     this.$store.dispatch('category/addBook',this.bookName);
        // },

        // deleteBook(index){
        //     this.$store.dispatch('category/deleteBook',index);
        // },


    },
};
</script>
