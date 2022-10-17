<template>
    <main class="container py-5">
        <h1 class="mb-5">POSTS</h1>
        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else class="card mb-4" v-for="(post, index) in posts" :key="index">
            <div class="card-body">
                <h4 class="card-title">{{ post.title }}</h4>
                <p class="card-text">Category: {{ post.category ? post.category.name : "-" }}</p>
                <p class="card-text">{{ getPreview(post.content, 90) }}</p>
                <a href="#" class="btn btn-primary">Read More</a>
                <div>Tags:</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" v-for="(tag, index) in post.tags" :key="index">
                        {{ tag.name }}
                    </li>
                </ul>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a :class="(currentPage == 1)?'disabled':''" class="page-link" href="#" @click="getPost(currentPage - 1)">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">{{ currentPage }} / {{ lastPage }}</a></li>
                <li class="page-item"><a :class="(currentPage == lastPage)?'disabled':''" class="page-link" href="#" @click="getPost(currentPage + 1)">Next</a></li>
            </ul>
        </nav>
    </main>
</template>

<script>

import Axios from "axios";

export default {

    name: "MyMain",
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

        },
        getPreview(text, maxLength) {

            if (text.length < maxLength) {
                return text;
            } else {
                return text.substring(0, maxLength) + "...";
            }

        },
    },
    mounted() {

        this.getPost(1);

    },
};
</script>

<style>
</style>