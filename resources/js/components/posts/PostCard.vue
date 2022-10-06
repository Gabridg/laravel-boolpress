<template>
    <div class="card text-center">
        <div class="card-header d-flex justify-content-between align-items-center">
            {{post.slug}}
            <router-link class="btn btn-sm btn-outline-success" :to="{name: 'post-detail', params:{ id: post.id } }">
                Scopri
                di più</router-link>

        </div>
        <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text">{{post.content}}</p>
        </div>
        <div class="card-footer text-muted">
            <p class="btn btn-sm" :class="`btn-outline-${post.category.color} `">{{post.category.label}}</p>
            <p>{{post.author.name}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: {
        post: Object,
    }
}
</script>

<style>

</style>