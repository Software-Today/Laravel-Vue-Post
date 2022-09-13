<template>
    <div class="float-left">
        <div class="dataTables_info" id="table-2_info" role="status" aria-live="polite">Showing {{ from }} to {{ to }} of  {{ totalRows }} entries</div>
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
                        @click.prevent="pageClicked(pageData.current_page - 1,limit,keyword)"
                        aria-label="Previous"
                        v-if="pageData.current_page != 1"
                    >
                        <!-- <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span> -->
                        Previous
                    </a>
                    <a v-else>
                        <!-- <span aria-hidden="true"> «</span>
                        <span class="sr-only">Previous</span> -->
                        Previous
                    </a>
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
                        :href="'?page=' + pageNo + '&limit=' +limit"
                        @click.prevent="pageClicked(pageNo,limit,keyword)"
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
                        @click.prevent="pageClicked(pageData.current_page + 1,limit,keyword)"
                        aria-label="Next"
                        v-if="pageData.current_page != pageData.last_page"
                    >
                        <!-- <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span> -->
                        Next
                    </a>
                    <a v-else>
                        <!-- <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span> -->
                        Next
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script type="text/javascript">
export default {
    props: ["pageData","totalRows","from","to","limit","keyword"],

    data() {
        return {

        };
    },


    methods: {
        range(start, count) {
            return Array.apply(0, Array(count)).map(function (element, index) {
                return index + start;
            });
        },

        pageClicked(page,limit,keyword) {
            //console.log(page);
            this.$store.dispatch("getDataList",[page,limit]);
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
    },
};
</script>
