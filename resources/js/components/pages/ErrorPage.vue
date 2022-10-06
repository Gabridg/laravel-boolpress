<template>
    <div class="error-page">
        <h2 class="text-center">ERRORE | 404 | url <strong>NON</strong> valido</h2>
    </div>
</template>

<script>
export default {
    name: "ErrorPage",
};

</script>

<style scoped>
.error-page {
    height: calc(100vh - 60px);
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.2);
}

h2 {
    color: #f00;
    font-size: 40px;
}
</style>