<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li v-for="link in links" :key="link.name" class="nav-item active">
                        <router-link class="nav-link" :to="{name: link.name }">{{link.label}}</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "MainHeader",
    data() {
        return {

            links: [
                { name: 'home', label: 'Home' },
                { name: 'about', label: 'About' },
                { name: 'contacts', label: 'Contacts' },
            ]
        }
    }
}
</script>

<style>
header {
    border-bottom: 5px solid #666;
}
</style>