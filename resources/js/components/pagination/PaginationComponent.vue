<template>
    <div class="float-left">
        <div
            class="dataTables_info"
            id="table-2_info"
            role="status"
            aria-live="polite"
        >
            Showing {{startFrom}} to {{endTo}} of {{totalCountData}} entries
        </div>
    </div>

    <div class="float-right">
        <nav v-if="pageData.last_page > 1">
            <ul class="pagination">
                <li
                    :class="[
                        pageData.current_page == 1 ? 'page-item disabled' : '',
                    ]"
                >
                    <a
                        class="page-link"
                        :href="'?page=' + pageData.current_page"
                        @click.prevent="pageClicked(pageData.current_page - 1)"
                        aria-label="Previous"
                        v-if="pageData.current_page != 1"
                    >
                        Previous
                    </a>
                    <a v-else> Previous </a>
                </li>
                &nbsp;

                <li
                    :class="[
                        pageData.current_page == pageNo
                            ? 'page-item active'
                            : 'page-item',
                    ]"
                    v-for="pageNo in range(paginateLoop, numberOfPage)"
                    :key="pageNo"
                >
                    <a
                        :class="[
                            pageData.current_page == pageNo
                                ? 'page-link'
                                : 'page-link',
                        ]"
                        :href="'?page=' + pageNo"
                        @click.prevent="pageClicked(pageNo)"
                        >{{ pageNo }}</a
                    >
                </li>

                <li
                    class="page-item"
                    :class="[
                        pageData.current_page == pageData.last_page
                            ? 'page-item disabled'
                            : '',
                    ]"
                >
                    <a
                        class="page-link"
                        :href="'?page=' + pageData.current_page"
                        @click.prevent="pageClicked(pageData.current_page + 1)"
                        aria-label="Next"
                        v-if="pageData.current_page != pageData.last_page"
                    >
                        Next
                    </a>
                    <a v-else> Next </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    props: ["pageData", "limit", "keyword"],

    data() {
        return {};
    },

    methods: {
        range(start, count) {
            return Array.apply(0, Array(count)).map(function (element, index) {
                return index + start;
            });
        },

        pageClicked(page) {
            //console.log(keyword);
            return this.$store.dispatch("post/geDatatList", [
                page,
                this.limit,
                this.keyword,
            ]);
            // history.pushState(null, null, "?page=" + page);
        },
    },

    computed: {
        paginateLoop() {
            let pageData = this.pageData;
            if (pageData.last_page > 11) {
                if (pageData.last_page - 5 <= pageData.current_page) {
                    return pageData.last_page - 10;
                }
                if (pageData.current_page > 6) {
                    return pageData.current_page - 5;
                }
            }
            return 1;
        },
        numberOfPage() {
            if (this.pageData.last_page < 11) {
                return this.pageData.last_page;
            } else {
                return 11;
            }
        },

        totalCountData(){
            return this.$store.state.post.posts.total;
        },
        startFrom(){
            return this.$store.state.post.posts.from;
        },
        endTo(){
            return this.$store.state.post.posts.to;
        }

    },
};
</script>

<style></style>
