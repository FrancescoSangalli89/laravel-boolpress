import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import ContactPage from './pages/ContactPage.vue';
import AboutUsPage from './pages/AboutUsPage.vue';
import HomePage from './pages/HomePage.vue';
import NotFound from './pages/NotFound.vue';
import PostsPage from './pages/PostsPage.vue';
import PostPage from './pages/PostPage';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'homePage',
            component: HomePage
        },
        {
            path: '/contact',
            name: 'contact',
            component: ContactPage
        },
        {
            path: '/aboutUs',
            name: 'aboutUs',
            component: AboutUsPage
        },
        {
            path: '/postsPage',
            name: 'postsPage',
            component: PostsPage
        },
        {
            path: '/postsPage/:slug',
            name: 'postPage',
            component: PostPage
        },
        {
            path: '/*',
            name: 'notFound',
            component: NotFound
        }
    ]
});

export default router;