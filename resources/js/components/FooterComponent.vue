<template>
	<footer class="fixed-bottom">
		<div class="container-fluid bg-primary">
			<div class="container containerFooter text-center text-white p-4">
				<div class="row">
					<div class="col icons">
						<div class="row">
							<div class="col iconSocial">
								<router-link to="'mailto:laryts@icloud.com'">
									<font-awesome-icon :icon="['fas', 'envelope']"/>
								</router-link>
							</div>
							<div class="col iconSocial">
								<router-link to="'https://api.whatsapp.com/send?1=pt_BR&phone=5518997348036'">
									<font-awesome-icon :icon="['fab', 'whatsapp']"/>
								</router-link>
							</div>
							<div class="col iconSocial">
								<router-link to="'https://linkedin.com/in/laryts'">
									<font-awesome-icon :icon="['fab', 'linkedin']"/>
								</router-link>
							</div>
						</div>
					</div>
					<div class="col text-center">
						<div class="row">
							Desenvolvido por <br> Larissa Tavares Soares
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>
<script>
export default {
    name: 'Footer',
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
.iconSocial a{
	color:#fff;
	font-size: 1.5rem;
}
.containerFooter{
	max-width: 30%	
}
</style>

