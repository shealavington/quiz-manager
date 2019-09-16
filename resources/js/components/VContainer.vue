<template>
    <div class="container">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'v-container'
}
</script>

<style scoped>
.container {
    --container-xs: 98%;
    --container-sm: 92%;
    --container-md: 86%;
    --container-lg: 70%;
    --container-xl: 60%;
    --container-scale-factor: 1;
}

.container {
    margin: 0 auto;
    width: calc(var(--container-xs) * var(--container-scale-factor));
}

@media(min-width: 875px) {
    .container {
        width: calc(var(--container-md) * var(--container-scale-factor));
        max-width: 875px;
    }
}
@media(min-width: 1290px) {
    .container {
        width: calc(var(--container-lg) * var(--container-scale-factor));
        max-width: 1290px;
    }
}
@media(min-width: 2000px) {
    .container {
        width: calc(var(--container-xl) * var(--container-scale-factor));
        max-width: 2000px;
    }
}
</style>
