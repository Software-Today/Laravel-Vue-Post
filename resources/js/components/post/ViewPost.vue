<template>
    <div class="row mt-1">

        <loader-component :loading="isLoading"></loader-component>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <label> Show &nbsp; </label>
                    </div>
                    <div class="float-left">
                        <select
                            class="form-control form-control-sm"
                            v-model="limit"
                        >
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
                                    v-model="keyword"
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

                            <tbody v-if="Object.keys(totalPost).length > 0">
                                <tr
                                    v-for="(post, key) in getAllPost.data"
                                    :key="key"
                                >
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
                                    <td>{{ key + 1 }}</td>
                                    <td>
                                        {{ post.title }}
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
                                    <td>{{ post.tag }}</td>
                                    <td>
                                        <a href="#">{{
                                            post.category.category_name
                                        }}</a
                                        >,
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
                            <tbody v-else>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        Data not found
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                     <pagination-component :pageData="getAllPost" :limit="limit" :keyword="keyword"></pagination-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            limit: 10,
            keyword: "",
            page: 1,
        };
    },

    watch: {
        limit(newLimit, oldValue) {
            //console.log(newValue,oldValue)
            return this.$store.dispatch("post/geDatatList", [
                this.page,
                newLimit,
                this.keyword,
            ]);
        },
        keyword(newKeyword, oldKeyword) {
            return this.$store.dispatch("post/geDatatList", [
                this.page,
                this.limit,
                newKeyword,
            ]);
        },
    },

    mounted() {
        return this.$store.dispatch("post/geDatatList", [
            this.page,
            this.limit,
            this.keyword,
        ]);
    },

    computed: {

        getAllPost() {
            return this.$store.state.post.posts;
        },

        totalPost() {
            return this.$store.getters["post/totalPost"];
        },

        isLoading() {
            return this.$store.getters["post/isLoading"];
        },
    },

    methods: {},
};
</script>
