<template>
	<footer class="fixed-bottom">
		<div class="container-fluid bg-primary">
			<div class="container containerFooter text-center text-white p-4">
				<div class="row">
					<div class="col icons">
						<div class="row">
							<div class="col iconSocial">
								<a target="_blank" href="mailto:laryts@icloud.com">
									<font-awesome-icon :icon="['fas', 'envelope']"/>
								</a>
							</div>
							<div class="col iconSocial">
								<a target="_blank" href="https://api.whatsapp.com/send?1=pt_BR&phone=5518997348036">
									<font-awesome-icon :icon="['fab', 'whatsapp']"/>
								</a>
							</div>
							<div class="col iconSocial">
								<a target="_blank" href="https://linkedin.com/in/laryts">
									<font-awesome-icon :icon="['fab', 'linkedin']"/>
								</a>
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

