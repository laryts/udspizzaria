<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Meus Pedidos'"
                :cardImgTop="'images/pizza2.jpg'"
                class="cardMeusPedidos">
                <table class="table">
                    <thead class="thead-darger">
                        <tr>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Sabor</th>
                        <th scope="col">Adicionais</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(ped, key) in pedidos" :key="key">
                            <td>{{ped.tamanho}}</td>
                            <td>{{ped.sabor}}</td>
                            <td><p v-for="(adicionais, index) in ped.adicionais" :key="index">{{adicionais}}</p></td>
                        </tr>
                    </tbody>
                </table>
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
    data(){
        return {
            pedidos:{},
            pedido:{
                idUser: this.$auth.user().id,
                idTamanho:0,
                idSabor:0,
                adicional:[],
                pdValor:0,
                pdTempo:0
            },
        }
    },
    mounted () {
        axios.get('/pedidoscomadicionais').then(response => {
            this.pedidos = response.data
        });
    },
    methods:{
    }
}
</script>
<style>
.cardMeusPedidos{
    /* width: 50vw; */
    max-height: 50vh;
    overflow-y: scroll;
}
</style>

