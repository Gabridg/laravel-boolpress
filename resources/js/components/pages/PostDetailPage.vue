<template>
    <div id="post-detail">
        <div class="container">
            <div class="card text-center my-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{post.slug}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{post.content}}</p>
                </div>
                <div class="card-footer text-muted">
                    <p class="btn btn-sm" :class="`btn-outline-${post.category.color} `">
                        {{post.category.label}}</p>
                    <p>{{post.author.name}}</p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import { throwStatement } from '@babel/types';
import Axios from 'axios';

export default {
    name: "PostDetailPage",
    data() {
        return {
            post: null
        }
    },
    methods: {
        fetchPost() {
            Axios.get("http://127.0.0.1:8000/api/posts/" + this.$route.params.id).then(res => {
                this.post = res.data;
            }).then(() => {
                console.log("chiamata terminata!");
            })
        }
    },
    mounted() {
        this.fetchPost();
    }
}
</script>

<style>

</style>