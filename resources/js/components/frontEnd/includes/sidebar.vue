<template>
    <div class="sidebar">

        <!-- Info -->
        <div class="info">
            <div class="info_content d-flex flex-row align-items-center justify-content-start">

                <!-- Language -->
                <div class="info_languages has_children">
                    <div class="language_flag"><img src="images/flag_1.svg" alt="https://www.flaticon.com/authors/freepik"></div>
                    <!--<div><a href="/logout">Logout</a></div>-->
                    <div class="dropdown_arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>

                    <!-- Language Dropdown Menu -->
                </div>

                <!-- Currency -->
                <div class="info_currencies has_children">
                    <div class="dropdown_text">usd</div>
                    <div class="dropdown_arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>

                </div>

            </div>
        </div>

        <!-- Logo -->
        <div class="sidebar_logo">
            <a href="#"><div>a<span>star</span></div></a>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar_nav">
            <ul>
                <li><router-link to="/">home<i class="fa fa-angle-right" aria-hidden="true"></i></router-link></li>

                <li v-for="category in categories"><router-link :to="`/category/${category.id}`">{{category.cat_name}}<i class="fa fa-angle-right" aria-hidden="true"></i></router-link></li>

                <li><a href="#">contact<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
        </nav>

        <!-- Search -->
        <div class="search">
            <form action="#" class="search_form" id="sidebar_search_form">
                <input type="text" class="search_input" placeholder="Search" required="required">
                <button class="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>

        <!-- Cart -->
        <div class="cart d-flex flex-row align-items-center justify-content-start">
            <div class="cart_icon"><a href="cart.html">
                <img src="images/bag.png" alt="">
                <div class="cart_num">2</div>
            </a></div>
            <div class="cart_text">bag</div>
            <div class="cart_price">$39.99 (1)</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "sidebar",
        data(){
            return{
                categories:[]
            }
        },
        mounted(){
            axios.get('/categories')
                .then(response => {
                    this.categories = response.data.categories
                    //console.log(response.data.categories)
                })
        }
    }
</script>

<style scoped>

</style>