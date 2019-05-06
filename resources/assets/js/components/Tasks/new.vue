<template lang="html">
    <div class="container">
            <div class="form-group">
                <label for="TopicTitle">タイトル</label>
                <input type="text" class="form-control" id="title" v-model="title">
            </div>
            <div class="form-group">
                <label for="TopicContent">content</label>
                <textarea class="form-control" id="content" rows="3" v-model="content"></textarea>
            </div>
            <button v-on:click="postArticle">投稿</button>
    </div>
</template>

<script>
export default {
    created() {
        userState.check()
    },
    data() {
        return {
            title:'',
            content:''
        }
    },
    methods: {
        postArticle(){
            var task = {
                'title': this.title,
                'content': this.content
            };
            axios.post('/api/tasks/add' ,task).then(res => {
                console.log(res.data.title);
                console.log(res.data.content);
//                var arr={message : '登録が完了しました。'}
                var arr=[{message : '登録が完了しました。'}]
                exStorage.save( sysConst.STORAGE_KEY_flash, arr )
                window.location.href='/tasks'
//                    exStorage.save( sysConst.STORAGE_KEY_flash, 'complete , add' )
            });
        }
    }
}
</script>
