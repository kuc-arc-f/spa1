<template lang="html">
    <div class="container">
        <h1>Dept - edit</h1>
        <div class="form-group">
            <label for="lbl_name">name</label>
            <input type="text" class="form-control" id="name" v-model="name" >
        </div>
        <button v-on:click="postDept">更新</button><br />
        <br />
        <button v-on:click="destroyTask">削除</button>
        <hr />
        <h3>employees :</h3>
        <div v-for="employee in item.employees" v-bind:key="employee.id">
            <p>employee : {{ employee.id }} : {{ employee.name }}</p>
        </div>
        <hr />
        <h3>employees -add:</h3>
        <div class="form-group">
            <label for="lbl_name">name</label>
            <input type="text" class="form-control" id="employee_name" v-model="employee_name" >
        </div>
        <button v-on:click="postEmployee">employee - add</button><br />
        <br />
    </div>
</template>

<script>
export default {
    created() {
//        userState.check()
    },
    data() {
        return {
            name:'',
            item: [],
            employee_name: '',
        }
    },
    mounted: function() {
        this.getItem();
    },
    methods: {
        getItem: function() {
            axios.get('/api/depts/edit/' + this.$route.params.id)
            .then( ( res ) => {
                this.item = res.data;
                this.name   =this.item.name;
            });
        },
        postDept(){
            var item = {
                'name': this.name,
            };
            axios.post('/api/depts/update/'+ this.$route.params.id ,item).then(res => {
                console.log(res.data );
                var arr=[{message : '更新が完了しました。'}]
                exStorage.save( sysConst.STORAGE_KEY_flash, arr )
                window.location.href='/depts'
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
        postEmployee(){
            var item = {
                'name': this.employee_name,
                'dept_id': this.$route.params.id,
            };
            axios.post('/api/employees/store/' , item).then(res => {
                console.log(res.data );
                var arr=[{message : '更新が完了しました。'}]
                exStorage.save( sysConst.STORAGE_KEY_flash, arr )
                window.location.href='/depts'
            });
        },        
    }
}
</script>
