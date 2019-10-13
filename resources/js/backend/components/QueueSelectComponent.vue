<template>
    <div>
        <v-select @search="onSearch" :options="options" name="queue" required="required" label="name" v-model="queue" @input="onSelect"></v-select>
    </div>
</template>
<script>
   import vSelect from 'vue-select'
    export default {
        components: {
            vSelect,
        },
        props: ['queueSearch', 'currentQueue'],
        data() {
            return {
                options: [],
                queue: this.currentQueue,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            onSelect(e){
                this.$emit('currentQueue', this.queue);
            },
            onSearch(search, loading){
                loading(true)
                this.fetchOptions(search,loading,this)
            },
            fetchOptions: _.debounce((search, loading, vm) => {
                loading(true);
                axios.get(vm.queueSearch, {
                    params: {
                        q: search
                    }
                }).then((response) => {
                    console.log(response)
                    vm.options = response.data
                    loading(false);
                })
            }, 500),
        }
    }
</script>
