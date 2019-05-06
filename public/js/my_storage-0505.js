//
var sysConst= {
  STORAGE_KEY       : 'user_strage_object',
  STORAGE_KEY_flash : 'strage_flash_key',
}

//
var exStorage = {
  load: function (key) {
    var dat = JSON.parse(localStorage.getItem(key ))
    if(dat !=null){
      console.log( 'dat-len='+ dat.length )
    }else{
      console.log( '#dat=null')
    }
    return dat
  },
  save: function (key, message) {
    localStorage.setItem( key, JSON.stringify(message))
  },
  remove: function (key) {
    localStorage.removeItem( key );
  },
}
//
var myStorage = {
  load: function () {
    var user = JSON.parse(localStorage.getItem(sysConst.STORAGE_KEY) || '[]')
    console.log( 'user-len='+user.length )
    return user
  },
  save: function (user) {
    localStorage.setItem(sysConst.STORAGE_KEY, JSON.stringify(user))
  },
  remove: function () {
    localStorage.removeItem( sysConst.STORAGE_KEY );
  },
  test: function () {
    var obj= localStorage.getItem(sysConst.STORAGE_KEY)
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
  test: function () {
  }
}
//console.log('#load-myST')