<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Faça seu Pedido'"
                :cardImgTop="'images/pizza2.jpg'">
                <div class="row">
                    <div class="col-8">
                        <form>
                            <!-- 1º Step - Choose Pizza's Size -->
                            <div v-if="step === 1">
                                <h4 class="text-center mb-4">Qual o tamanho da sua fome?</h4>
                                <span class="font-italic text-center">Selecione um tamanho para a sua pizza</span>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" type="button">Tamanho</button>
                                    </div>
                                    <select 
                                        @change="onChangeTamanho()" 
                                        v-model="pedido.idTamanho" 
                                        v-validate="'required'" 
                                        data-vv-as="Tamanho"
                                        class="custom-select" 
                                        id="inputGroupTamanho" 
                                        name="tamanho" 
                                        ref="tamanho">
                                        <option value="" selected></option>
                                        <option :value="tam.idTamanhos" v-for="(tam, key) in tamanhos" :key="key">{{tam.tmDescricao}}</option>
                                    </select>
                                </div> 
                                <span v-show="errors.has('tamanho')" class="help is-danger">{{ errors.first('tamanho') }}</span>
            
                                                    
                                <div class="d-flex justify-content-center mt-4">
                                    <button class="btn btn-outline-danger" @click.prevent="next()"  :disabled="errors.any()  || this.pedido.idTamanho == ''">Próximo <font-awesome-icon :icon="['fas', 'chevron-right']"/></button>
                                </div>
                            </div>
                            <!-- 2º Step - Choose Pizza's Flavor -->
                            <div v-if="step === 2">                    
                                <h4 class="text-center mb-4">Vamos ver se tem bom gosto... </h4>
                                <span class="font-italic text-center">Agora selecione um sabor para sua pizza</span>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" type="button">Sabor</button>
                                    </div>
                                    <select 
                                        @change="onChangeSabor()" 
                                        v-model="pedido.idSabor"  
                                        v-validate="'required'"
                                        data-vv-as="Sabor"
                                        class="custom-select" 
                                        id="inputGroupSabor" 
                                        name="sabor"
                                        ref="refSabor">
                                        <option value="" selected></option>
                                        <option :value="sab.idSabores" v-for="(sab, key) in sabores" :key="key">{{sab.sbDescricao}}</option>
                                    </select>
                                </div>
                                <span v-show="errors.has('sabor')" class="help is-danger">{{ errors.first('sabor') }}</span>
                                
                                <div class="d-flex justify-content-center mt-4">
                                    <button class="btn btn-outline-secondary" @click.prevent="prev()"><font-awesome-icon :icon="['fas', 'chevron-left']"/> Previous</button>
                                    <button class="btn btn-outline-danger" @click.prevent="next()"  :disabled="errors.any()  || this.pedido.idSabor == ''">Próximo <font-awesome-icon :icon="['fas', 'chevron-right']"/></button>
                                </div>
                            </div>
                            <div v-if="step === 3">
                                <h4 class="text-center mb-4">Para finalizar... Quer deixar a pizza com a sua cara?</h4>
                                <span class="font-italic text-center">Selecione os adicionais para a sua pizza</span>
                                <div class="input-group mb-3" v-for="(adi, key) in adicionais" :key="key">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input 
                                            type="checkbox" 
                                            :id="key" 
                                            :name="adi.adDescricao" 
                                            :value="adi.idAdicionais" 
                                            v-model="pedido.adicional"
                                            @change="onChangeAdicional($event)" >
                                        </div>
                                    </div>
                                    <div class="form-control" disabled>{{adi.adDescricao}}</div>
                                    <!-- Extra Bacon -->
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <button class="btn btn-outline-secondary" @click.prevent="prev()"><font-awesome-icon :icon="['fas', 'chevron-left']"/> Previous</button>
                                    <button class="btn btn-outline-danger" @click.prevent="submit()" :disabled="errors.any()">Save</button>
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
                idUser: this.$auth.user().id,
                idTamanho:0,
                idSabor:0,
                adicional:[],
                pdValor:0,
                pdTempo:0
            },
            tamanhos:null,
            sabores:null,
            adicionais:null,
            valorTamanho:0,
            tempoTamanho:0,
            valorSabor:0,
            tempoSabor:0,
            valorAdicional:0,
            tempoAdicional:0,
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
            this.axios.post('/api/pedido/create', this.pedido).then((response) => {
                this.$router.push({name: 'home'});
            });            
        },
        onChangeTamanho() {
            this.valorTamanho = this.tempoTamanho = 0;
            for (let index = 0; index < this.tamanhos.length; index++) {
                const element = this.tamanhos[index];
                if(element.idTamanhos == this.pedido.idTamanho){
                    this.valorTamanho = element.tmValor
                    this.tempoTamanho = element.tmTempo
                }
            }
            this.sumTotal();
        },
        onChangeSabor() {
            this.valorSabor = this.tempoSabor = 0;
            for (let index = 0; index < this.sabores.length; index++) {
                const element = this.sabores[index];
                if(element.idSabores == this.pedido.idSabor){
                    this.valorSabor += element.sbValor
                    this.tempoSabor += element.sbTempo
                }
            }
            this.sumTotal();
        },
        onChangeAdicional($event) {
            this.valorAdicional = this.tempoAdicional = 0;
            for (let index = 0; index < this.adicionais.length; index++) {
                const element = this.adicionais[index];
                var ads = this.pedido.adicional;
                var ad = ads.includes(element.idAdicionais);
                if(ad){
                    this.valorAdicional += element.adValor
                    this.tempoAdicional += element.adTempo
                }
            }
            this.sumTotal();
        },
        sumTotal(){
            this.valorTotal = this.valorTamanho + this.valorSabor + this.valorAdicional;
            this.tempoTotal = this.tempoTamanho + this.tempoSabor + this.tempoAdicional;
            this.pedido.pdValor = this.valorTotal;
            this.pedido.pdTempo = this.tempoTotal;
        }
    }
}
</script>

