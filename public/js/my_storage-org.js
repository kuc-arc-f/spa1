//
var STORAGE_KEY = 'user_strage_object'
var myStorage = {
  load: function () {
    var user = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]')
    console.log( 'user-len='+user.length )
    return user
  },
  save: function (user) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(user))
  },
  remove: function () {
    localStorage.removeItem( STORAGE_KEY );
  },
  test: function () {
    var obj= localStorage.getItem(STORAGE_KEY)
    console.log(obj)
  }

}
//
var userState = {
  check: function () {
    this.store=myStorage.load()
    console.log( this.store.length )
    if(this.store.length >0){
        this.user=this.store[0]
        console.log( 'id=' +this.store[0].id )
        return this.user
    }else{
        window.location.href='/users/login'
    }    
  },
  loadAjax() {
    axios.get('/api/user/check')
    .then(res =>  {
        if(res.data.count=='1' ){
  //                        console.log(res.data.user )
            this.user = res.data.user
            this.store.push({
                id: this.user.id
            })
            myStorage.save( this.store )
            return this.user;
        }else{
            window.location.href='/users/login'
        }
        console.log( 'ajax: '+ res.data.count )
    })
  },
  test: function () {
  }

}

//     localStorage.setItem(STORAGE_KEY, JSON.stringify(user))
//console.log('#load-myST')