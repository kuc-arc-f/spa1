<template lang="html">
    <div>
        <h1>Depts - Show:</h1>
        <div class="card" v-if="item">
            <div v-if="updated" class="alert alert-primary" role="alert">
                更新しました
            </div>
            <div class="card-body">
                <div>
                    <p>ID: {{ item.id }}</p>
                    <h1 class="card-title">{{item.name}}</h1>
                </div>
                <hr />
                <h3>employees :</h3>
                <div v-for="employee in item.employees" v-bind:key="employee.id">
                    <p>employee : {{ employee.id }} : {{ employee.name }}</p>
                </div>
            </div>
            <hr />
            <!-- -->
            <button v-on:click="destroyTask">削除</button>

        </div>
    </div>
</template>

<script>
export default {
    created() {
//        userState.check()
    },
    data: function( ) {
        return {
            item: null,
            editFlg: false,
            updated: false,
        }
    },
    mounted: function() {
        this.getItem();
    },
    methods: {
        getItem: function() {
            axios.get('/api/depts/show/' + this.$route.params.id)
            .then( ( res ) => {
                this.item = res.data;
                console.log(this.item )
            });
        },
        destroyTask(){
            axios.get('/api/depts/destroy/'+ this.$route.params.id  ).then(res => {
                console.log(res.data );
                if(res.data.ret==1){
                    var arr=[{message : '削除が完了しました。'}]
                    exStorage.save( sysConst.STORAGE_KEY_flash, arr )
                    window.location.href='/depts'
                }
            });
        },        
    }
}
</script>


