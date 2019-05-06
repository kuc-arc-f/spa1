<template>
    <div>
        <h1>tasks- test:</h1>
        <hr />
        test : <p>{{ user.id }}</p>
    </div>
</template>

<script>
    export default {
        created() {
            this.userCount()
//                myStorage.remove()
        },
        data() {
            return {
                tasks: [],
                user : '',
                store:[]
            }
        },
        methods: {
            test1() {
                axios.get('/api/user/check')
                .then(res =>  {
                    if(res.data.count=='1' ){
//                        console.log(res.data.user )
                        this.user = res.data.user
                        this.store.push({
                            id: this.user.id
                        })
                        myStorage.save( this.store )
                    }else{
                        window.location.href='/users/login'
                    }
                    console.log(res.data.count )
                })
            },
            userCount(){
                this.store=myStorage.load()
                console.log( this.store.length )
                if(this.store.length >0){
                    this.user=this.store[0]
                    console.log( 'id=' +this.store[0].id )
                }else{
                    this.test1()
                }
            },
            fetchArticles() {
                console.log('#index-start')
                axios.get('/api/tasks')
                .then(res =>  {
                    this.tasks = res.data
                    console.log(res.data )
                })
            }            
        }
    }
</script>

