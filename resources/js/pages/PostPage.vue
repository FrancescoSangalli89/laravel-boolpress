<template>
    <div>
        <article v-if="post">
            <h1 class="mb-3">{{ post.title }}</h1>
            <p class="mb-3">{{ post.content }}</p>
            <div class="mb-3">Category: {{ post.category?post.category.name:'-' }}</div>
            <span v-for="tag in post.tags" :key="tag.id" class="badge rounded-pill text-bg-primary me-2">{{ tag.name }}</span>
            <div>
                <router-link :to="{name: 'postsPage'}" class="btn btn-primary mt-3">Back to posts</router-link>
            </div>
        </article>
        <div v-else class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

</template>

<script>
export default {
    name: 'PostPage',
    data() {
        return{
            post: null
        }
    },
    methods: {
        getPost() {
            const slug =this.$route.params.slug;
            axios.get('/api/posts/' + slug)
            .then((response) => {
                this.post = response.data.result;
            });
        }
    },
    mounted() {
        this.getPost();
    }
}
</script>

<style>

</style>