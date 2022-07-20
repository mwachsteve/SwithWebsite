<template>
    <div class="container">
        <h3 class="text-center">Transfer Funds</h3>
        <div class="alert" role="alert">
        <strong> {{ msg }} </strong>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" v-model="product.amount">
                    </div>
                    <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" class="form-control" v-model="product.accountid">
                    </div>
                    <br />
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        props: ['message'],
        data() {
            return {
                product: {
                    amount:'',
                    token:this.message,
                    accountid:'',
                    },
                msg:''
            }
        },
        methods: {
            addProduct() {
                this.axios
                    .post('http://localhost/SwitchWebSite/switch-website/public/api/fundtransfer', this.product)
                    .then(response => (
                        this.msg = response.data,
                        this.$router.push({ name: 'dashboard' })
                    ))
                    .catch(err => console.log(err),
                    this.msg = err,
                    )
                    .finally(() => this.loading = false)
            }
        }
    }
</script>