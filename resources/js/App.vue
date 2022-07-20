<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Transactions</router-link>
                    <router-link to="/atm" class="nav-item nav-link">Atm Withdraw</router-link>
                    <router-link to="/transfer" class="nav-item nav-link">Transfer Funds</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>