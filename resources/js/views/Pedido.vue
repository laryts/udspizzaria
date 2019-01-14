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
                                    <select v-model="pedido.tamanho" class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                        <option value="" selected>Escolha o tamanho da sua pizza...</option>
                                        <option value="p">Pequena</option>
                                        <option value="m">Médio</option>
                                        <option value="g">Grande</option>
                                    </select>
                                </div>
                    
                                <h4>Vamos ver se tem bom gosto... Escolha um sabor</h4>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-danger" type="button">Sabor</button>
                                    </div>
                                    <select v-model="pedido.sabor" class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                        <option value="" selected>Escolha o sabor da sua pizza...</option>
                                        <option value="calabresa">Calabresa</option>
                                        <option value="marquerita">Marquerita</option>
                                        <option value="portuguesa">Portuguesa</option>
                                    </select>
                                </div>
                                
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-danger" @click.prevent="next()">Próximo <font-awesome-icon :icon="['fas', 'chevron-right']"/></button>
                                </div>
                            </div>
                            <div v-if="step === 2">
                                <h4>Vamos deixar a pizza com a sua cara?</h4>
                                <span>Escolha os adicionais</span>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="Extra Bacon">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="Extra Bacon" disabled>
                                    <!-- Extra Bacon -->
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="Sem Cebola">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="Sem Cebola" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" aria-label="Checkbox for following text input" name="Barda Recheada">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="Borda Recheada" disabled>
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
                                        <span class="f20">R$</span><span class="f32">20</span>
                                    </div>
                                    <div>
                                        <span>Tempo</span>
                                        <span class="f32">15</span><span class="f20">min</span>
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
            }
        }
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
        }
    }
}
</script>

