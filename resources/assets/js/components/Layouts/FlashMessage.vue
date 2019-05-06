<template>
    <div>
        <div id="flash_message" v-if="message">
            <span class="badge badge-success">
                <h3 id="h3_msg" style="margin : 15px;">{{ message }}</h3>
            </span>
        </div>

    </div>
</template>

<script>
import {Mixin} from '../../mixin'

export default {
    mixins:[Mixin],
    created() {
        this.load_msg()
    },
    data() {
        return {
            message : '',
        }
    },
    methods: {
        load_msg() {
//            var dat = exStorage.load( sysConst.STORAGE_KEY_flash )
            var dat = this.get_exStorage( this.sysConst.STORAGE_KEY_flash )
            if(dat.length > 0){
                this.message =dat[0].message;
//                console.log( dat[0] )
            }
            this.remove_exStorage(this.sysConst.STORAGE_KEY_flash)
//            exStorage.remove( sysConst.STORAGE_KEY_flash )
        }            
    }
}
</script>

<style>
</style>

