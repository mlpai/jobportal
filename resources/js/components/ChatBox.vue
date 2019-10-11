<template>
    <div class="">
        <div class="box box-warning direct-chat direct-chat-warning">

                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name float-left">Name</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="images/profiles/" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix ">
                        <span class="direct-chat-name float-right">Name Rec</span>
                        <span class="direct-chat-timestamp float-left ">23 Jan 2:05 pm</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="images/profiles/" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        You better believe it!
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                    <div class="input-group">
                        <input type="text" name="message" v-model="msgs" placeholder="Type Message ..." class="form-control @error('message') is-invalid @enderror">
                        <span class="input-group-btn">
                            <button type="button" v-on:click="msg()" class="btn btn-warning btn-flat">Send</button>
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
            'msgs' : '',
        }
    },

    methods: {
        msg(){
            axios.get('/company/msg/'+this.jid+'/'+this.cid




            )
            .then(res => {
                console.log(res)
            })
            .catch(err => {
                console.error(err);
            })
        }
    },
}
</script>
