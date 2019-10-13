<template>
    <div class="form-horizontal">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Tickets <small class="text-muted">Create Ticket</small></h4>
                    </div>
                </div>
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row"><label for="name" class="col-md-2 form-control-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" id="name" placeholder="Ticket Title"
                                    maxlength="255" required="required" autofocus="autofocus" class="form-control" v-model="name">
                                <inline-validation-error :errors="validationErrors.name"></inline-validation-error>
                            </div>
                        </div>
                        <div class="form-group row"><label for="description"
                                class="col-md-2 form-control-label">Description</label>
                            <div class="col-md-10"><textarea name="description" id="description"
                                    placeholder="Description" rows="9" required="required"
                                    class="form-control" v-model="description"></textarea>
                                    <inline-validation-error :errors="validationErrors.description"></inline-validation-error>
                                    </div>
                        </div>

                        <div class="form-group row">
                            <label for="queue" class="col-md-2 form-control-label">Queue</label>
                            <div class="col-md-10">
                                <!--<v-select @search="onSearch" :options="options" name="queue" required="required" label="name" v-model="queue"></v-select>-->
                                <queue-select-componenet :queueSearch="queueSearch" :currentQueue="queue" @currentQueue="q => queue = q"></queue-select-componenet>
                                <inline-validation-error :errors="validationErrors.queue"></inline-validation-error>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col text-right"><button
                            class="btn btn-success btn-sm pull-right" v-on:click="onSubmit">Create</button></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select'
    import InlineValidationError from './InlineValidationError'
    import QueueSelectComponenet from './QueueSelectComponent'
    export default {
        components: {
            vSelect,
            InlineValidationError,
            QueueSelectComponenet
        },
        props: ['action', 'queueSearch'],
        data() {
            return {
                name: '',
                description: '',
                options: [],
                queue: {},
                validationErrors: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
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
            onSubmit(){
                this.validationErrors = {}
                axios.post(this.action, {
                    name: this.name,
                    description: this.description,
                    queue: this.queue.id
                })
                .then((response) => {
                    console.log(response);
                    this.$toastr.s("Ticket #" + response.data.ticket.id + " has been added sucesfully");
                })
                .catch((response) => {
                    this.validationErrors = response.response.data.errors;
                    this.$toastr.e(response);
                })
            }
        }
    }

</script>
<style>
@import "~vue-select/dist/vue-select.css";
</style>
