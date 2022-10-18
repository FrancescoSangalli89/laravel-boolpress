<template>
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ post.title }}</h4>
            <p class="card-text">Category: {{ post.category ? post.category.name : "-" }}</p>
            <p class="card-text">{{ getPreview(post.content, 90) }}</p>
            <router-link :to="{name: 'postPage', params: {slug: post.slug}}" class="btn btn-primary">Read More</router-link>
            <div>Tags:</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="(tag, index) in post.tags" :key="index">
                    {{ tag.name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'MyPost',
        props: {
            post: Object
        },
        methods: {
            getPreview(text, maxLength) {

                if (text.length < maxLength) {
                    return text;
                } else {
                    return text.substring(0, maxLength) + "...";
                }

            }
        }
    }
</script>

<style>

</style>