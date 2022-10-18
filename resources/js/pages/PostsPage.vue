<template>
    <main class="container py-5">
        <h1 class="mb-5">POSTS</h1>
        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <MyPost v-for="(post, index) in posts" :key="index" :post='post'/>
        </div>
        <nav>
            <ul class="pagination">
                <li class="page-item"><a :class="(currentPage == 1)?'disabled':''" class="page-link" href="#" @click.prevent="getPost(currentPage - 1)">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">{{ currentPage }} / {{ lastPage }}</a></li>
                <li class="page-item"><a :class="(currentPage == lastPage)?'disabled':''" class="page-link" href="#" @click.prevent="getPost(currentPage + 1)">Next</a></li>
            </ul>
        </nav>
    </main>
</template>

<script>

import Axios from "axios";
import MyPost from '../components/MyPost.vue';

export default {

    name: "PostsPage",
    components: {
        MyPost
    },
    data() {
        return {
            posts: [],
            loading: true,
            currentPage: 1,
            lastPage: null
        };
    },
    methods: {
        getPost(page) {

            this.loading = true;

            Axios.get("/api/posts", {
                params: {
                    page: page
                }
            })
            .then((response) => {
                // console.log(response);
                this.posts = response.data.results.data;
                this.loading = false;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            });

        }
    },
    mounted() {

        this.getPost(1);

    },
};
</script>

<style>
</style>