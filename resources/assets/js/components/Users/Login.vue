<template lang="html">
    <div class="container">
            <h1>User -Login</h1>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" v-model="email" >
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" v-model="password" >
            </div>
            <button v-on:click="postLogin">ログイン</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email:'',
                password:'',
                store:  [],
                user:   []
            }
        },
        mounted: function() {
        },
        methods: {
            postLogin(){
                var user = {
                    'email': this.email,
                    'password': this.password
                };
                axios.post('/api/users/auth/' ,user).then(res => {
                    console.log(res.data );
                    if(res.data.ret==1){
                        this.user = res.data.user
                        this.store.push({
                            id: this.user.id
                        })
                        myStorage.save( this.store )
                        window.location.href='/'
                    }else{
                        console.log('#-NG-auth');
                    }
                });
            }
        }
    }
</script>
