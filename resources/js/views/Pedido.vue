<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Faça seu Pedido'"
                :cardImgTop="'images/pizza2.jpg'">
                <div class="row">
                    <div class="col-8">
                        <form>
                            <div v-if="step === 1">
                                <h4>Qual o tamanho da sua fome?</h4>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" type="button">Tamanho</button>
                                    </div>
                                    <select @change="onChangeTamanho()" v-model="pedido.tamanho" class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                        <option value="" selected>Escolha o tamanho da sua pizza...</option>
                                        <option :value="tam.idTamanhos" v-for="(tam, key) in tamanhos" :key="key">{{tam.tmDescricao}}</option>
                                    </select>
                                </div>
                    
                                <h4>Vamos ver se tem bom gosto... Escolha um sabor</h4>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" type="button">Sabor</button>
                                    </div>
                                    <select @change="onChangeSabor()" v-model="pedido.sabor" class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                        <option value="" selected>Escolha o sabor da sua pizza...</option>
                                        <option :value="sab.idSabores" v-for="(sab, key) in sabores" :key="key">{{sab.sbDescricao}}</option>
                                    </select>
                                </div>
                                
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-danger" @click.prevent="next()">Próximo <font-awesome-icon :icon="['fas', 'chevron-right']"/></button>
                                </div>
                            </div>
                            <div v-if="step === 2">
                                <h4>Vamos deixar a pizza com a sua cara?</h4>
                                <span>Escolha os adicionais</span>
                                <div class="input-group mb-3" v-for="(adi, key) in adicionais" :key="key">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" :name="adi.adDescricao">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" :value="adi.adDescricao" disabled>
                                    <!-- Extra Bacon -->
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-secondary" @click.prevent="prev()"><font-awesome-icon :icon="['fas', 'chevron-left']"/> Previous</button>
                                    <button class="btn btn-outline-danger" @click.prevent="submit()">Save <font-awesome-icon :icon="['fas', 'save']"/></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col center-block bg-danger rounded">
                        <div class="row h-100">
                            <div class="col-sm-12 my-auto">
                                <div class="p-2 text-center text-white">
                                    <div>
                                        <span>Valor</span>
                                        <span class="f20">R$</span><span class="f32">{{valorTotal}}</span>
                                    </div>
                                    <div>
                                        <span>Tempo</span>
                                        <span class="f32">{{tempoTotal}}</span><span class="f20">min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <br/><br/>Debug: {{pedido}} -->
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
            step:1,
            pedido:{
                tamanho:'',
                sabor:'',
                adicional:'',
            },
            tamanhos:null,
            sabores:null,
            adicionais:null,
            valorTotal:0,
            tempoTotal:0
        }
    },
    mounted () {
        axios.get('/api/tamanhos').then(response => (this.tamanhos = response.data))
        axios.get('/api/sabores').then(response => (this.sabores = response.data))
        axios.get('/api/adicionais').then(response => (this.adicionais = response.data))
    },
    methods:{
        prev() {
            this.step--;
        },
        next() {
            this.step++;
        },
        submit() {
            alert('Submit to blah and show blah and etc.');      
        },
        onChangeTamanho() {
            this.reset();
            for (let index = 0; index < this.tamanhos.length; index++) {
                const element = this.tamanhos[index];
                if(element.idTamanhos == this.pedido.tamanho){
                    this.valorTotal = element.tmValor
                    this.tempoTotal = element.tmTempo
                }
            }
        },
        onChangeSabor() {
            for (let index = 0; index < this.sabores.length; index++) {
                const element = this.sabores[index];
                if(element.idSabores == this.pedido.sabor){
                    this.valorTotal += element.sbValor
                    this.tempoTotal += element.sbTempo
                }
            }
        },
        reset(){
            this.valorTotal = 0;
            this.tempoTotal = 0;
        }
    }
}
</script>

