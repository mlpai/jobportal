<template>
    <div class="">
        <div class="box box-warning direct-chat direct-chat-warning">

                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" >
                        <!-- Message. Default to the left -->
                        <div v-for="data in msgs" class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name float-right">Name</span>
                            <span class="direct-chat-timestamp float-left">{{data.created_at}}</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="http://job2.io/images/person_1.jpg" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{data.message}}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                        <!-- Message to the right -->
                                                        <!-- <div class="direct-chat-msg">
                                                            <div class="direct-chat-info clearfix ">
                                                            <span class="direct-chat-name float-left">Name Rec</span>
                                                            <span class="direct-chat-timestamp float-right ">23 Jan 2:05 pm</span>
                                                            </div>
                                                            <!-- /.direct-chat-info -->
                                                            <!-- <img class="direct-chat-img" src="http://job2.io/images/person_1.jpg" alt="message user image"> -->
                                                            <!-- /.direct-chat-img -->
                                                            <!-- <div class="direct-chat-text"> -->
                                                            <!-- You better believe it! -->
                                                            <!-- </div> -->
                                                            <!-- /.direct-chat-text -->
                                                        <!-- </div> -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                    <div class="input-group">
                        <input type="text" name="message" v-model="text" placeholder="Type Message ..." class="form-control @error('message') is-invalid @enderror">
                        <span class="input-group-btn">
                            <button type="button" @click="setmsg()" class="btn btn-warning btn-flat">Send</button>
                            </span>
                    </div>

                </div>
                <!-- /.box-footer-->
                </div>
        </div>
</template>

<script>
export default {
    props : ['jid','cid'],

    data : () => {
        return {
            msgs : null,
            text : '',
        }
    },

    methods: {
        setmsg(){
            axios.post('/msg',{message:this.text, jobseeker_id : this.jid, company_id : this.cid})
            .then(res => {
                console.log(res)
                this.getmsg();
            })
            .catch(err => {
                console.error(err);
            })
        },
        getmsg(){
            axios.get('/company/msg/'+this.jid+'/'+this.cid)
            .then(res => {
               this.msgs = res.data;
            })
            .catch(err => {
                console.error(err);
            })
        }
    },

    mounted() {
        this.getmsg();
    },
}
</script>
