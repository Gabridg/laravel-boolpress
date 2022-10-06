<template>
    <div class="container">
        <h2>I nostri contatti</h2>
        <ul>
            <li><i class="fa-solid fa-paper-plane"></i> E-mail: <a href="#">nonloso@boolean.it</a></li>
            <li><i class="fa-solid fa-phone"></i> Phone: 12345678919</li>
            <li><i class="fa-solid fa-location-dot"></i> Location: <a href="https://www.google.it/maps/preview">La
                    nostra sede</a></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ContactsPage",
};

</script>
<style scoped>
ul {
    list-style-type: none;
}

a {
    text-decoration: none;
}
</style>