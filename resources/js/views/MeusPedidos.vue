<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Meus Pedidos'"
                :cardImgTop="'images/pizza2.jpg'">
                <div  v-for="(ped, key) in pedidos" :key="key">
                    <ul>
                        <li></li>
                    </ul>
                    {{ped}}
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
    data(){
        return {
            pedidos:null,
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
        axios.get('/pedidos').then(response => {
            // this.pedidos = response
            var pedidos = [];
            var ped;
            var pedido = response.data;
            for (const key in pedido) {
                const element = pedido[key];
                // ped[element.idPedidos] = {
                //     'idPedido': element.idPedidos,
                // };
                // pedidos = ped;

                axios.get('/tamanho/'+element.idTamanhos).then(res => {
                    element.tamanho = res.data.tmDescricao
                })
                axios.get('/sabor/'+element.idSabores).then(res => {
                    element.sabor = res.data.sbDescricao
                })
                axios.get('/pedido_adicionais/'+element.idPedidos).then(res => {
                    element.adicionais = res.data
                    console.log(res.data)
                })
                console.log(element);

            }
        });
    },
    methods:{
    }
}
</script>

