<template>
    <div class="card center-block" style="width: 50vw;">
        <div class="card-header bg-danger text-white text-center">{{titleHeader}}</div>
        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {
    props: ['cardImgTop', 'titleHeader']
}
</script>

<style>
.card {
    margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px; /* Added */
}
</style>

