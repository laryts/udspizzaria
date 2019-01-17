<template>
	<nav class="navbar fixed-top navbar-dark bg-primary navbar-expand-lg">
		<router-link to="/" class="navbar-brand"><img src="images/logo.png"></router-link>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<router-link :to="{ name: 'pedido' }" class="nav-link">Fazer Pedido</router-link>
				</li>
				<li class="nav-item">
					<router-link :to="{ name: 'meuspedidos' }" class="nav-link">Meus Pedidos</router-link>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li  v-if="!$auth.check()" class="nav-item">
					<router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>
				</li>
				<li v-if="!$auth.check()" class="nav-item">
					<router-link :to="{ name: 'register' }" class="nav-link">Cadastrar</router-link>
				</li>
				<li v-if="$auth.check()" class="nav-item">
					<span class="nav-link">Bem Vindo, {{ $auth.user().name }}</span>
				</li>
				<li v-if="$auth.check()" class="nav-item">
					<a class="nav-link" href="#" @click.prevent="$auth.logout()">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
</template>
<script>
export default {
    name: 'Header',
    components: {
    },
    data() {
        return {
            active: {
                0: false
            },
            toggleA: false
        };
    },
}
</script>
<style>

</style>

