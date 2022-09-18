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
                        <select class="form-control form-control-sm" v-model="limit">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="all">All</option>
                        </select>
                    </div>

                    <div class="float-left">
                        <label>&nbsp; entries &nbsp;</label>
                    </div>

                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search By Title" v-model="keyword"/>
                            </div>
                        </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>Status</th>
                            </tr>

                            <tbody v-if="Object.keys(totalCategoriy).length > 0">
                                <tr v-for="(category, key) in getAllCategory.data" :key="key">
                                    <td>{{ key + 1 }}</td>
                                    <td>
                                        {{ category.category_name }}
                                    </td>
                                    <td>{{ category.created_at.split('T')[0] }}</td>
                                    <td>
                                        <!-- <div class="badge badge-primary"> -->
                                            {{ category.status }}
                                        <!-- </div> -->
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

                     <pagination-component :pageData="getAllCategory" :limit="limit" :keyword="keyword"></pagination-component>
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
            return this.$store.dispatch("category/geDatatList", [
                this.page,
                newLimit,
                this.keyword,
            ]);
        },
        keyword(newKeyword, oldKeyword) {
            return this.$store.dispatch("category/geDatatList", [
                this.page,
                this.limit,
                newKeyword,
            ]);
        },
    },

    mounted() {
        return this.$store.dispatch("category/geDatatList", [
            this.page,
            this.limit,
            this.keyword,
        ]);
    },

    computed: {

        getAllCategory() {
            this.$store.state.pageData = this.$store.state.category.categories;
            return this.$store.state.category.categories;
        },

        totalCategoriy() {
            return this.$store.getters["category/totalCategory"];
        },

        isLoading() {
            return this.$store.getters["category/isLoading"];
        },
    },

    methods: {},
};
</script>
