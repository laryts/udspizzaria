<template>
    <section style="max-height:100vh">
        <header-component></header-component>
        <slide-component></slide-component>
		<content-component></content-component>
		<footer-component></footer-component>
    </section>
</template>
<script>
import HeaderComponent from "../components/HeaderComponent";
import SlideComponent from "../components/SlideComponent";
import ContentComponent from "../components/ContentComponent";
import FooterComponent from "../components/FooterComponent";
    export default {
        components: {
            HeaderComponent,
            SlideComponent,
            ContentComponent,
            FooterComponent
        }
    }
</script>