<template>
    <div class="">
        <div class="box box-warning direct-chat direct-chat-warning">

                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" >
                        <!-- Message. Default to the left -->
                        <div v-for="data in msgs" class="direct-chat-msg" :class="[data.sentBy ? 'left' : 'right']" >
                            <div class="direct-chat-info clearfix">
                            <span v-if="data.sentBy == 1" class="direct-chat-name " :class="[data.sentBy ? 'float-left' : 'float-right']">{{users.name}}</span>
                            <span v-else class="direct-chat-name " :class="[data.sentBy ? 'float-left' : 'float-right']">{{cmp}}</span>
                            <span class="direct-chat-timestamp small " :class="[data.sentBy ? 'float-right' : 'flaot-left']" >{{data.created_at | formatDate}}</span>
                            </div>
                            <!-- /.direct-chat-info -->

                            <img  v-if="data.sentBy == 1" class="direct-chat-img" :src=" url+'/images/' + [photo ? 'profiles/'+users.photo : 'user.jpg'] " alt="message user image">

                            <img v-else class="direct-chat-img" :src=" url+'/images/' + [cphoto ? 'profiles/'+pic : 'user.jpg'] " alt="message user image">

                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{data.message}}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                    <div class="input-group">
                        <input type="text" name="message" v-model="text" placeholder="Type Message ..." class="form-control"  :class="[error ? 'is-invalid' : '']" >
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
            pos : false,
            error : false,
            photo : false,
            cphoto : false,
            users : null,
            pic : null,
            cmp : 'You',
            url : location.protocol + '//' + location.host,
        }
    },

    methods: {
        setmsg(){
            if(this.text == ''){this.error = true} else {
                axios.post('/msg',{message:this.text, jobseeker_id : this.jid, company_id : this.cid})
                .then(res => {
                    this.error = false;
                    this.getmsg();
                    this.text = '';
                })
                .catch(err => {
                    console.error(err);
                })
            }
        },
        getmsg(){
            axios.get('/j/company/msg/'+this.jid+'/'+this.cid)
            .then(res => {
                if(res.data.user.photo != null)
                {
                     this.photo = true;
                }
                if(res.data.cmp.photo != null)
                {
                     this.cphoto = true;
                     this.pic = res.data.cmp.photo;
                }
                this.msgs = res.data.chats;
                this.users = res.data.user;
            })
            .catch(err => {
                console.error(err);
            })
        }
    },

    mounted() {
        this.getmsg();
        let autometic = setInterval(this.getmsg,3000);
    },

    beforeDestroy() {
          clearInterval(autometic);
    },
}
</script>
