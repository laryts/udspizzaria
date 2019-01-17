<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Ops!'"
                :cardImgTop="'images/pizza2.jpg'">
                <div class="text-center">
                    <h1>Desculpe, página não encontrada!</h1>
                </div>
            </card-component>
        </div>
    </div>
</template>
<script>
import CardComponent from '../components/CardComponent'
export default {
    components: {
        CardComponent
    },
    data() {
        return {
        }
    },
    mounted () {
    },
    methods:{
    }
}
</script>

