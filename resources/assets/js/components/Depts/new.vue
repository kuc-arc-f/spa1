<template lang="html">
    <div class="container">
        <h1>Depts - new</h1>        
        <div class="form-group">
            <label for="lbl_name">Name</label>
            <input type="text" class="form-control" id="name" v-model="name">
        </div>
        <button v-on:click="postDept">投稿</button>
    </div>
</template>

<script>
export default {
    created() {
        userState.check()
    },
    data() {
        return {
            name:'',
        }
    },
    methods: {
        postDept(){
            var item = {
                'name': this.name,
            };
            axios.post('/api/depts/store' ,item).then(res => {
                console.log(res.data );
                var arr=[{message : '登録が完了しました。'}]
                exStorage.save( sysConst.STORAGE_KEY_flash, arr )
//                window.location.href='/depts'
            });
        }
    }
}
</script>
