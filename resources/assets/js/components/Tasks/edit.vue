<template lang="html">
    <div class="container">
        <h1>Tasks - edit</h1>
        <hr />
        <div class="form-group">
            <label for="TopicTitle">タイトル</label>
            <input type="text" class="form-control" id="title" v-model="title" >
        </div>
        <div class="form-group">
            <label for="TopicContent">content</label>
            <textarea class="form-control" id="content" rows="3" v-model="content"></textarea>
        </div>
        <button v-on:click="postTask">投稿</button>
        <hr />
        <button v-on:click="destroyTask">削除</button>
    </div>
</template>

<script>
import {Mixin} from '../../mixin'

export default {
    mixins:[Mixin],
    created() {
        this.check_userState(this.sysConst.STORAGE_KEY_userData, this)
//        userState.check()
    },
    data() {
        return {
            title:'',
            content:''
        }
    },
    mounted: function() {
        this.getItem();
    },
    // メソッドの定義。ここでv-on:click=''で記述したpostArticle()メソッドを定義します
    methods: {
        getItem: function() {
            axios.get('/api/tasks/edit/' + this.$route.params.id)
            .then( ( res ) => {
                this.item = res.data;
                this.title   =this.item.title;
                this.content =this.item.content;
            });
        },
        postTask(){
            var task = {
                'title': this.title,
                'content': this.content
            };
            axios.post('/api/tasks/update/'+ this.$route.params.id ,task).then(res => {
                console.log(res.data.title);
                console.log(res.data.content);
                var arr=[{message : '更新が完了しました。'}]
                this.set_exStorage(this.sysConst.STORAGE_KEY_flash, arr)
//                exStorage.save( sysConst.STORAGE_KEY_flash, arr )
                window.location.href='/tasks'
            });
        },
        destroyTask(){
            axios.get('/api/tasks/destroy/'+ this.$route.params.id  ).then(res => {
                console.log(res.data );
                if(res.data.ret==1){
                    var arr=[{message : '削除が完了しました。'}]
                    this.set_exStorage(this.sysConst.STORAGE_KEY_flash, arr)
//                    exStorage.save( sysConst.STORAGE_KEY_flash, arr )
                    window.location.href='/tasks'
                }
            });
        }
    }
}
</script>
