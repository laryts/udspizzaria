<template>
	<section id="content">
		<transition name="slide-fade" mode="out-in">
			<router-view></router-view>
		</transition>
	</section>
</template>
<script>
export default {
    
}
</script>
<style>
#content{
    height: 100vh;
    overflow: hidden;
}
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>

