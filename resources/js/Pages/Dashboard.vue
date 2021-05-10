<template>
    <h1>Olá!</h1>
    <blockquote>{{ title }}</blockquote>
</template>

<script>
export default {
    props: {
        title: String,
    },
};
</script>

<style lang="scss" scoped></style>
