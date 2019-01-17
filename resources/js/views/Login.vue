<template>
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <card-component 
                :titleHeader="'Login'"
                :cardImgTop="'images/pizza2.jpg'">
                    <div>
                        <div class="alert alert-danger" v-if="error">
                            <p>Houve um erro, não foi possível fazer login com essas credenciais.</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="login" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" name="password" id="password" class="form-control" v-model="password" required>
                            </div>
                            <button type="submit" class="btn btn-danger">Entrar</button>
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
            email: null,
            password: null,
            error: false,
            msg: ''
        }
    },
    mounted () {
    },
    methods:{
        login(){
            var app = this
            this.$auth.login({
                params: {
                    email: app.email,
                    password: app.password
                }, 
                success: function (res) {
                    console.log(res);
                },
                error: function (res) {
                    var status = res.response.data;
                    if(status.status == 'error'){
                        this.error = true;
                        this.msg = status.msg
                    }
                },
                rememberMe: true,
                redirect: '/home',
                fetchUser: true,
            });       
        },
    }
}
</script>

