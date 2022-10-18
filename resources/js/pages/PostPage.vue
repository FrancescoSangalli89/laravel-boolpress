<template>
    <h1>Single post</h1>
</template>

<script>
export default {
    name: 'PostPage',
    methods: {
        getPost() {
            const slug =this.$route.params.slug;
            axios.get('/api/posts/' + slug)
            .then((response) => {

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