<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
        <br />
        こんにちは {{ name }}.<br />
    </div>
</template>

<script>
    export default {
        data () {
            return {
                name: 'World 355B',
                message: 'msg, 123',
                counter: 0,
                list: ['Apple', 'Banana', 'Strawberry']
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
