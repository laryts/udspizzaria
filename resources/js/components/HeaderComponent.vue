<template>
	<nav class="navbar fixed-top navbar-dark bg-primary navbar-expand-lg">
		<router-link to="/home" class="navbar-brand"><img src="images/logo.png"></router-link>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Sobre</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Preços</a>
				</li>
				<li class="nav-item">
					<router-link to="/pedido" class="nav-link">Pedido</router-link>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<router-link to="/login" class="nav-link">Login</router-link>
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

