<template>
    <div class="container">
        <h3 class="text-center">Atm Withdrawal</h3>
        <div class="alert" role="alert">
            <strong> {{ msg }} </strong>
        <!-- <strong>Success!</strong> {{ msg }} -->
    </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" v-model="product.Balance">
                        <!-- <input type="text" class="form-control" v-model="product.token"> -->
                    </div>
                    <br />
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">WithDraw</button>
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
                    Balance:'',
                    token:this.message,
                },
                msg:''
            }
        },
        methods: {
            addProduct() {
                // console.log(this.message)
                this.axios
                    .post('http://localhost/SwitchWebSite/switch-website/public/api/atm', this.product)
                    .then(response => (
                        // this.msg = 'success',
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