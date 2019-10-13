<template>
    <div v-if="errors != undefined">
        <em class="error invalid-feedback" v-for="error in errors">{{error}}</em>
    </div>
</template>
<script>
    export default {
        props: ['errors'],
        mounted() {
            console.log('Component mounted.')
        },
        methods:{

        }
    }

</script>
