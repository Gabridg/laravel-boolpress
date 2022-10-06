<template>
    <div class="home-content">
        <PostsList></PostsList>
    </div>
</template>

<script>
import PostsList from '../posts/PostsList.vue';
export default {
    name: "HomePage",
    components: {
        PostsList,
    }
}

</script>

<style>

</style>