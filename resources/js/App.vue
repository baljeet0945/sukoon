<template>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        
        <header-layout/>
        <sidebar-layout/>

         <router-view> </router-view>


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer p-0">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
</template>
 
<script>
    import jQuery from 'jquery';
    import HeaderLayout from './views/Layouts/header.vue';    
    import SidebarLayout from './views/Layouts/sidebar.vue';  
    export default {
        components: {
            'header-layout': HeaderLayout,
            'sidebar-layout':SidebarLayout
        },
    }
   //jQuery('#preloader').fadeOut(500);
</script>
