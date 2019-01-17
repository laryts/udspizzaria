<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Cadastro'"
                :cardImgTop="'images/pizza2.jpg'">
                <div>
                    <div class="alert alert-danger" v-if="error && !success">
                        <p>Ocorreu um erro, não foi possível completar o cadastro.</p>
                    </div>
                    <div class="alert alert-success" v-if="success">
                        <p>Cadastro realizado com sucesso. Você pode agora realizar o <router-link :to="{name:'login'}">login.</router-link></p>
                    </div>
                    <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                        <div class="form-group" v-bind:class="{ 'has-error': error && errors_.name }">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" v-model="name" required>
                            <span class="help-block" v-if="error && errors_.name">{{ errors_.name }}</span>
                        </div>
                        <div class="form-group" v-bind:class="{ 'has-error': error && errors_.email }">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                            <span class="help-block" v-if="error && errors_.email">{{ errors_.email }}</span>
                        </div>
                        <div class="form-group" v-bind:class="{ 'has-error': error && errors_.password }">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password" class="form-control" v-model="password" required>
                            <span class="help-block" v-if="error && errors_.password">{{ errors_.password }}</span>
                        </div>
                        <button type="submit" class="btn btn-danger">Cadastrar</button>
                    </form>
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
            name: '',
            email: '',
            password: '',
            error: false,
            errors_: {},
            success: false
        };
    },
    mounted () {
    },
    methods: {
        register(){
            var app = this
            this.$auth.register({
                data: {
                    name: app.name,
                    email: app.email,
                    password: app.password
                }, 
                success: function () {
                    app.success = true
                },
                error: function (resp) {
                    app.error = true;
                    app.errors_ = resp.response.data.errors;
                },
                redirect: null
            });                
        }
    }
}
</script>

