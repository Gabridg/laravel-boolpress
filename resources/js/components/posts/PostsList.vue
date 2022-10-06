<template>
    <div class="posts-list">
        <div class="container">
            <h2>Posts</h2>
            <div v-if="posts.length">
                <PostCard v-for="post in posts" :key="post.id" :post="post" class="mb-3"></PostCard>
            </div>
            <h2 v-else>Nessun post</h2>
        </div>
    </div>
</template>

<script>
import PostCard from './PostCard.vue';
export default {
    name: "PostsList",
    components: { PostCard },
    data() {
        return {
            posts: [],
        };
    },
    methods: {
        fetchPosts() {
            axios.get("http://127.0.0.1:8000/api/posts")
                .then((res) => {
                    this.posts = res.data;
                }).catch((err) => {
                    console.error(err);
                }).then(() => {
                    console.info("chiamata terminata");
                });
        }
    },
    mounted() {
        this.fetchPosts();
    },
    components: { PostCard }
}
</script>

<style>

</style>